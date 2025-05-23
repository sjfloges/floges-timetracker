<?php


// ttWeekViewHelper class groups together functions used in week view.
class ttWeekViewHelper {

  // getRecordsForInterval - returns time records for a user for a given interval of dates.
  static function getRecordsForInterval($start_date, $end_date, $includeFiles = false) {
    global $user;

    $user_id = $user->getUser();
    $group_id = $user->getGroup();
    $org_id = $user->org_id;

    $sql_time_format = "'%k:%i'"; //  24 hour format.
    if ('%I:%M %p' == $user->time_format)
      $sql_time_format = "'%h:%i %p'"; // 12 hour format for MySQL TIME_FORMAT function.

    $result = array();
    $mdb2 = getConnection();

    $fields = array(); // An array of fields for database query.
    array_push($fields, 'l.id as id');
    array_push($fields, 'l.date as date');
    array_push($fields, "TIME_FORMAT(l.start, $sql_time_format) as start");
    array_push($fields, "TIME_FORMAT(sec_to_time(time_to_sec(l.start) + time_to_sec(l.duration)), $sql_time_format) as finish");
    array_push($fields, "TIME_FORMAT(l.duration, '%k:%i') as duration");
    array_push($fields, "p.id as project_id");
    array_push($fields, "p.name as project");
    array_push($fields, "t.id as task_id");
    array_push($fields, "t.name as task");
    array_push($fields, "l.comment");
    array_push($fields, "l.billable");
    array_push($fields, "l.invoice_id");
    if ($user->isPluginEnabled('cl')) {
      array_push($fields, "c.id as client_id");
      array_push($fields, "c.name as client");
    }
    // Add time custom fields.
    global $custom_fields;
    if ($custom_fields && $custom_fields->timeFields) {
      foreach ($custom_fields->timeFields as $timeField) {
        $field_name = 'time_field_'.$timeField['id'];
        if ($timeField['type'] == CustomFields::TYPE_TEXT) {
          $cflTable = 'cfl'.$timeField['id'];
          array_push($fields, "$cflTable.value as $field_name");
        } elseif ($timeField['type'] == CustomFields::TYPE_DROPDOWN) {
          $cfoTable = 'cfo'.$timeField['id'];
          array_push($fields, "$cfoTable.id as $field_name".'_option_id');
          array_push($fields, "$cfoTable.value as $field_name");
        }
      }
    }
    if ($includeFiles) {
      array_push($fields, 'if(Sub1.entity_id is null, 0, 1) as has_files');
    }

    $left_joins = " left join tt_projects p on (l.project_id = p.id)".
      " left join tt_tasks t on (l.task_id = t.id)";
    if ($user->isPluginEnabled('cl'))
      $left_joins .= " left join tt_clients c on (l.client_id = c.id)";

    // Left joins for time custom fields.
    if ($custom_fields && $custom_fields->timeFields) {
      foreach ($custom_fields->timeFields as $timeField) {
        $field_name = 'time_field_'.$timeField['id'];
        $cflTable = 'cfl'.$timeField['id'];
        if ($timeField['type'] == CustomFields::TYPE_TEXT) {
          // Add one join for each text field.
          $left_joins .= " left join tt_custom_field_log $cflTable on ($cflTable.log_id = l.id and $cflTable.status = 1 and $cflTable.field_id = ".$timeField['id'].')';
        } elseif ($timeField['type'] == CustomFields::TYPE_DROPDOWN) {
          $cfoTable = 'cfo'.$timeField['id'];
          // Add two joins for each dropdown field.
          $left_joins .= " left join tt_custom_field_log $cflTable on ($cflTable.log_id = l.id and $cflTable.status = 1 and $cflTable.field_id = ".$timeField['id'].')';
          $left_joins .= " left join tt_custom_field_options $cfoTable on ($cfoTable.field_id = $cflTable.field_id and $cfoTable.id = $cflTable.option_id)";
        }
      }
    }
    if ($includeFiles) {
      $left_joins .=  " left join (select distinct entity_id from tt_files".
      " where entity_type = 'time' and group_id = $group_id and org_id = $org_id and status = 1) Sub1".
      " on (l.id = Sub1.entity_id)";
    }

    $sql = "select ".join(', ', $fields)." from tt_log l $left_joins".
      " where l.date >= '$start_date' and l.date <= '$end_date'".
      " and l.user_id = $user_id and l.group_id = $group_id and l.org_id = $org_id and l.status = 1".
      " order by l.date, p.name, t.name, l.start, l.id";
    $res = $mdb2->query($sql);
    if (!is_a($res, 'PEAR_Error')) {
      while ($val = $res->fetchRow()) {
        if($val['duration']=='0:00')
          $val['finish'] = '';
        $result[] = $val;
      }
    } else return false;

    return $result;
  }

  // getDataForWeekView - builds an array to render a table of durations and comments for a week view.
  // In a week view we want one row representing the same attributes to have 7 values for each day of week.
  // We identify similar records by a combination of client, billable, project, task, and custom field values.
  //
  // "cl:546,bl:1,pr:23456,ts:27464,time_field_856:BASE64ENCODEDtext,time_field_857:2345"
  // The above means client 546, billable, project 23456, task 27464, custom time_field_856 is base64 encoded,
  // custom time_field_857 option id is 2345".
  //
  // We use base64 encoding for text fields to make parsing of such things possible when text contains commas, etc.
  //
  // Daily comments are implemented as alternate rows following week durations (when enabled).
  // For example: row_0 - new entry durations, row_1 - new entry daily comments,
  //              row_2 - existing entry durations, row_3 - existing entry comments, etc.
  //
  // Description of $dataArray format that the function returns.
  // $dataArray = array(
  //   array( // Row 0. This is a special, one-off row for a new week entry with empty values.
  //     'row_id' => null, // Row identifier. Null for a new entry.
  //     'label' => 'New entry:', // Human readable label for the row describing what this time entry is for.
  //     'day_0' => array('control_id' => '0_day_0', 'tt_log_id' => null, 'duration' => null), // control_id is row_id plus day header for column.
  //     'day_1' => array('control_id' => '0_day_1', 'tt_log_id' => null, 'duration' => null),
  //     'day_2' => array('control_id' => '0_day_2', 'tt_log_id' => null, 'duration' => null),
  //     'day_3' => array('control_id' => '0_day_3', 'tt_log_id' => null, 'duration' => null),
  //     'day_4' => array('control_id' => '0_day_4', 'tt_log_id' => null, 'duration' => null),
  //     'day_5' => array('control_id' => '0_day_5', 'tt_log_id' => null, 'duration' => null),
  //     'day_6' => array('control_id' => '0_day_6', 'tt_log_id' => null, 'duration' => null)
  //   ),
  //
  //   array( // Row 1. This row represents daily comments for a new entry in row above (row 0).
  //     'row_id' => null,
  //     'label' => 'Notes:',
  //     'day_0' => array('control_id' => '1_day_0', 'tt_log_id' => null, 'note' => null),
  //     'day_1' => array('control_id' => '1_day_1', 'tt_log_id' => null, 'note' => null),
  //     'day_2' => array('control_id' => '1_day_2', 'tt_log_id' => null, 'note' => null),
  //     'day_3' => array('control_id' => '1_day_3', 'tt_log_id' => null, 'note' => null),
  //     'day_4' => array('control_id' => '1_day_4', 'tt_log_id' => null, 'note' => null),
  //     'day_5' => array('control_id' => '1_day_5', 'tt_log_id' => null, 'note' => null),
  //     'day_6' => array('control_id' => '1_day_6', 'tt_log_id' => null, 'note' => null)
  //   ),
  //
  //   array( // Row 2.
  //     'row_id' => 'cl:546,bl:1,pr:23456,ts:27464,time_field_857:7623_0',
  //     'label' => 'Anuko - Time Tracker - Coding - Option 2',
  //     'day_0' => array('control_id' => '2_day_0', 'tt_log_id' => 12345, 'duration' => '00:00'),
  //     'day_1' => array('control_id' => '2_day_1', 'tt_log_id' => 12346, 'duration' => '01:00'),
  //     'day_2' => array('control_id' => '2_day_2', 'tt_log_id' => 12347, 'duration' => '02:00'),
  //     'day_3' => array('control_id' => '2_day_3', 'tt_log_id' => null, 'duration' => null),
  //     'day_4' => array('control_id' => '2_day_4', 'tt_log_id' => 12348, 'duration' => '04:00'),
  //     'day_5' => array('control_id' => '2_day_5', 'tt_log_id' => 12349, 'duration' => '04:00'),
  //     'day_6' => array('control_id' => '2_day_6', 'tt_log_id' => null, 'duration' => null)
  //   ),
  //   array( // Row 3.
  //     'row_id' => 'cl:546,bl:1,pr:23456,ts:27464,time_field_857:7623_0_notes',
  //     'label' => 'Notes:',
  //     'day_0' => array('control_id' => '3_day_0', 'tt_log_id' => 12345, 'note' => 'Comment one'),
  //     'day_1' => array('control_id' => '3_day_1', 'tt_log_id' => 12346, 'note' => 'Comment two'),
  //     'day_2' => array('control_id' => '3_day_2', 'tt_log_id' => 12347, 'note' => 'Comment three'),
  //     'day_3' => array('control_id' => '3_day_3', 'tt_log_id' => null, 'note' => null),
  //     'day_4' => array('control_id' => '3_day_4', 'tt_log_id' => 12348, 'note' => 'Comment four'),
  //     'day_5' => array('control_id' => '3_day_5', 'tt_log_id' => 12349, 'note' => 'Comment five'),
  //     'day_6' => array('control_id' => '3_day_6', 'tt_log_id' => null, 'note' => null)
  //   )
  // );
  static function getDataForWeekView($records, $dayHeaders) {
    global $user;
    global $i18n;

    $dataArray = array();
    $includeWeekends = $user->isOptionEnabled('weekends');
    $includeNotes = $user->isOptionEnabled('week_notes');

    // Construct the first row for a brand new entry.
    $dataArray[] = array('row_id' => null,'label' => $i18n->get('form.week.new_entry').':'); // Insert row.
    // Insert empty cells with proper control ids.
    if ($includeWeekends) {
      for ($i = 0; $i < 7; $i++) {
        $control_id = '0_'. $dayHeaders[$i];
        $dataArray[0][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'duration' => null);
      }
    } else {
      for ($i = 1; $i < 6; $i++) {
        $control_id = '0_'. $dayHeaders[$i];
        $dataArray[0][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'duration' => null);
      }
    }
    if ($includeNotes) {
      // Construct the second row for daily comments for a brand new entry.
      $dataArray[] = array('row_id' => null,'label' => $i18n->get('label.notes').':'); // Insert row.
      // Insert empty cells with proper control ids.
      if ($includeWeekends) {
        for ($i = 0; $i < 7; $i++) {
          $control_id = '1_'. $dayHeaders[$i];
          $dataArray[1][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'note' => null);
        }
      } else {
        for ($i = 1; $i < 6; $i++) {
          $control_id = '1_'. $dayHeaders[$i];
          $dataArray[1][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'note' => null);
        }
      }
    }

    // Iterate through records and build $dataArray cell by cell.
    foreach ($records as $record) {
      // Create row id without suffix.
      $row_id_no_suffix = ttWeekViewHelper::makeRowIdentifier($record);
      // Handle potential multiple records with the same attributes by using a numerical suffix.
      $suffix = 0;
      $row_id = $row_id_no_suffix.'_'.$suffix;
      $day_header = substr($record['date'], 8); // Day number in month.
      while (ttWeekViewHelper::cellExists($row_id, $day_header, $dataArray)) {
        $suffix++;
        $row_id = $row_id_no_suffix.'_'.$suffix;
      }
      // Find row.
      $pos = ttWeekViewHelper::findRow($row_id, $dataArray);
      if ($pos < 0) {
        // Insert row for durations.
        $dataArray[] = array('row_id' => $row_id,'label' => ttWeekViewHelper::makeRowLabel($record));
        $pos = ttWeekViewHelper::findRow($row_id, $dataArray);
        // Insert empty cells with proper control ids.
        if ($includeWeekends) {
          for ($i = 0; $i < 7; $i++) {
            $control_id = $pos.'_'. $dayHeaders[$i];
            $dataArray[$pos][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'duration' => null);
          }
        } else {
          for ($i = 1; $i < 6; $i++) {
            $control_id = $pos.'_'. $dayHeaders[$i];
            $dataArray[$pos][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'duration' => null);
          }
        }
        // Insert row for comments.
        if ($includeNotes) {
          $dataArray[] = array('row_id' => $row_id.'_notes','label' => $i18n->get('label.notes').':');
          $pos++;
          // Insert empty cells with proper control ids.
          if ($includeWeekends) {
            for ($i = 0; $i < 7; $i++) {
              $control_id = $pos.'_'. $dayHeaders[$i];
              $dataArray[$pos][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'note' => null);
            }
          } else {
            for ($i = 1; $i < 6; $i++) {
              $control_id = $pos.'_'. $dayHeaders[$i];
              $dataArray[$pos][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'note' => null);
            }
          }
          $pos--;
        }
      }
      // Insert actual cell data from $record (one cell only).
      $dataArray[$pos][$day_header] = array('control_id' => $pos.'_'. $day_header, 'tt_log_id' => $record['id'],'duration' => $record['duration']);
      // Insert existing comment from $record into the comment cell.
      if ($includeNotes) {
        $pos++;
        $dataArray[$pos][$day_header] = array('control_id' => $pos.'_'. $day_header, 'tt_log_id' => $record['id'],'note' => $record['comment']);
      }
    }
    return $dataArray;
  }

  // prePopulateFromPastWeeks - is a complementary function to getDataForWeekView.
  // It builds an "empty" $dataArray with only labels present. Labels are taken from
  // the most recent active past week, up to 5 weeks back from now.
  // This is a data entry acceleration feature to help users quickly populate their
  // regular entry list for a new week, even after a long vacation.
  static function prePopulateFromPastWeeks($startDate, $dayHeaders) {
    global $user;
    global $i18n;

    // First, determine past week start and end dates.
    $objDate = new ttDate($startDate);
    $objDate->decrementDay(7);
    $pastWeekStartDate = $objDate->toString();
    $objDate->incrementDay(6);
    $pastWeekEndDate = $objDate->toString();
    unset($objDate);

    // Obtain past week(s) records.
    $records = ttWeekViewHelper::getRecordsForInterval($pastWeekStartDate, $pastWeekEndDate);
    // Handle a potential situation of no records by re-trying for up to 4 more previous weeks (after a long vacation, etc.).
    if (!$records) {
      for ($i = 0; $i < 4; $i++) {
        $objDate = new ttDate($pastWeekStartDate);
        $objDate->decrementDay(7);
        $pastWeekStartDate = $objDate->toString();
        $objDate->incrementDay(6);
        $pastWeekEndDate = $objDate->toString();
        unset($objDate);

        $records = ttWeekViewHelper::getRecordsForInterval($pastWeekStartDate, $pastWeekEndDate);
        // Break out of the loop if we found something.
        if ($records) break;
      }
    }

    // We will need this for iterations below.
    $includeWeekends = $user->isOptionEnabled('weekends');

    // Construct the first row for a brand new entry.
    $dataArray[] = array('row_id' => null,'label' => $i18n->get('form.week.new_entry').':'); // Insert row.
    // Insert empty cells with proper control ids.
    if ($includeWeekends) {
      for ($i = 0; $i < 7; $i++) {
        $control_id = '0_'. $dayHeaders[$i];
        $dataArray[0][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'duration' => null);
      }
    } else {
      for ($i = 1; $i < 6; $i++) {
        $control_id = '0_'. $dayHeaders[$i];
        $dataArray[0][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'duration' => null);
      }
    }
    $includeNotes = $user->isOptionEnabled('week_notes');
    if ($includeNotes) {
      // Construct the second row for daily comments for a brand new entry.
      $dataArray[] = array('row_id' => null,'label' => $i18n->get('label.notes').':'); // Insert row.
      // Insert empty cells with proper control ids.
      if ($includeWeekends) {
        for ($i = 0; $i < 7; $i++) {
          $control_id = '1_'. $dayHeaders[$i];
          $dataArray[1][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'note' => null);
        }
      } else {
        for ($i = 1; $i < 6; $i++) {
          $control_id = '1_'. $dayHeaders[$i];
          $dataArray[1][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'note' => null);
        }
      }
    }

    // Iterate through records and build an "empty" $dataArray.
    foreach ($records as $record) {
      // Create row id with 0 suffix. In prepopulated view, we only need one row for similar records.
      $row_id = ttWeekViewHelper::makeRowIdentifier($record).'_0';
      // Find row.
      $pos = ttWeekViewHelper::findRow($row_id, $dataArray);
      if ($pos < 0) {
        // Insert row for durations.
        $dataArray[] = array('row_id' => $row_id,'label' => ttWeekViewHelper::makeRowLabel($record));
        $pos = ttWeekViewHelper::findRow($row_id, $dataArray);
        // Insert empty cells with proper control ids.
        if ($includeWeekends) {
          for ($i = 0; $i < 7; $i++) {
            $control_id = $pos.'_'. $dayHeaders[$i];
            $dataArray[$pos][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'duration' => null);
          }
        } else {
          for ($i = 1; $i < 6; $i++) {
            $control_id = $pos.'_'. $dayHeaders[$i];
            $dataArray[$pos][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'duration' => null);
          }
        }
        // Insert row for comments.
        if ($includeNotes) {
          $dataArray[] = array('row_id' => $row_id.'_notes','label' => $i18n->get('label.notes').':');
          $pos++;
          // Insert empty cells with proper control ids.
          if ($includeWeekends) {
            for ($i = 0; $i < 7; $i++) {
              $control_id = $pos.'_'. $dayHeaders[$i];
              $dataArray[$pos][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'note' => null);
            }
          } else {
            for ($i = 1; $i < 6; $i++) {
              $control_id = $pos.'_'. $dayHeaders[$i];
              $dataArray[$pos][$dayHeaders[$i]] = array('control_id' => $control_id, 'tt_log_id' => null,'note' => null);
            }
          }
          $pos--;
        }
      }
    }

    return $dataArray;
  }

  // cellExists is a helper function for getDataForWeekView() to see if a cell with a given label
  // and a day header already exists.
  static function cellExists($row_id, $day_header, $dataArray) {
    foreach($dataArray as $row) {
      if ($row['row_id'] == $row_id && !empty($row[$day_header]['duration']))
        return true;
    }
    return false;
  }

  // findRow returns an existing row position in $dataArray, -1 otherwise.
  static function findRow($row_id, $dataArray) {
    $pos = 0; // Row position in array.
    foreach($dataArray as $row) {
      if ($row['row_id'] == $row_id)
        return $pos;
      $pos++; // Increment for search.
    }
    return -1; // Row not found.
  }

  // getDayTotals calculates total durations for each day from the existing data in $dataArray.
  static function getDayTotals($dataArray, $dayHeaders) {
    $dayTotals = array();

    // Insert label.
    global $i18n;
    $dayTotals['label'] = $i18n->get('label.day_total').':';
    foreach($dayHeaders as $dayHeader) {
      $dayTotals[$dayHeader] = 0;
    }
    foreach ($dataArray as $row) {
      foreach($dayHeaders as $dayHeader) {
        if (array_key_exists($dayHeader, $row)) {
          $minutes = ttTimeHelper::toMinutes(@$row[$dayHeader]['duration']);
          $dayTotals[$dayHeader] += $minutes;
        }
      }
    }
    // Convert minutes to hh:mm for display.
    foreach($dayHeaders as $dayHeader) {
      $dayTotals[$dayHeader] = ttTimeHelper::minutesToDuration($dayTotals[$dayHeader]);
    }
    return $dayTotals;
  }

  // getDayHeadersForWeek - obtains day column headers for week view, which are simply day numbers in month.
  static function getDayHeadersForWeek($start_date) {
    $dayHeaders = array();
    $objDate = new ttDate($start_date);
    for ($i = 0; $i < 7; $i++) {
      $dayHeaders[] = $objDate->getDay();
      $objDate->incrementDay();
    }
    return $dayHeaders;
  }

  // getLockedDaysForWeek - builds an array of locked days in week.
  static function getLockedDaysForWeek($start_date) {
    global $user;
    $lockedDays = array();
    $objDate = new ttDate($start_date);
    for ($i = 0; $i < 7; $i++) {
      $lockedDays[] = $user->isDateLocked($objDate);
      $objDate->incrementDay();
    }
    unset($objDate);
    return $lockedDays;
  }

  // makeRowIdentifier - builds a string identifying a row for a week view from a single record properties.
  //                     Note that the return value is without a suffix.
  // For example:
  // "cl:546,bl:0,pr:23456,ts:27464,time_field_856:example text,time_field_857:7623"
  static function makeRowIdentifier($record) {
    global $user;
    // Start with client.
    $row_identifier = '';
    if ($user->isPluginEnabled('cl'))
      $row_identifier .= $record['client_id'] ? 'cl:'.$record['client_id'] : '';
    // Add billable flag.
    if (!empty($row_identifier)) $row_identifier .= ',';
    $row_identifier .= 'bl:'.$record['billable'];
    // Add project.
    $row_identifier .= $record['project_id'] ? ',pr:'.$record['project_id'] : '';
    // Add task.
    $row_identifier .= $record['task_id'] ? ',ts:'.$record['task_id'] : '';
    // Add custom field parts.
    global $custom_fields;
    if (isset($custom_fields) && $custom_fields->timeFields) {
      foreach ($custom_fields->timeFields as $timeField) {
        $field_name = 'time_field_'.$timeField['id'];
        if ($timeField['type'] == CustomFields::TYPE_TEXT)
           $field_value = base64_encode($record[$field_name]);
        else if ($timeField['type'] == CustomFields::TYPE_DROPDOWN)
           $field_value =  $record[$field_name.'_option_id'];
        $row_identifier .= ",$field_name:$field_value";
      }
    }
    return $row_identifier;
  }

  // makeRowLabel - builds a human readable label for a row in week view,
  // which is a combination ot record properties.
  // Client - Project - Task - Custom field 1.
  // Note that billable property is not part of the label. Instead,
  // we identify such records with a different color in week view.
  static function makeRowLabel($record) {
    global $user;
    // Start with client.
    $label = '';
    if ($user->isPluginEnabled('cl'))
      $label .= $record['client'];

    // Add project.
    if (!empty($label) && !empty($record['project'])) $label .= ' - ';
    $label .= $record['project'];

    // Add task.
    if (!empty($label) && !empty($record['task'])) $label .= ' - ';
    $label .= $record['task'];

    // Add custom field parts.
    global $custom_fields;
    if (isset($custom_fields) && $custom_fields->timeFields) {
      foreach ($custom_fields->timeFields as $timeField) {
        $field_name = 'time_field_'.$timeField['id'];
        $field_value = $record[$field_name];
        if (!empty($label) && !empty($field_value)) $label .= ' - ';
        $label .= $field_value;
      }
    }

    return $label;
  }

  // parseFromWeekViewRow - obtains field value encoded in row identifier.
  // For example, for a row id like "cl:546,bl:0,pr:23456,ts:27464,time_field_856:example text,time_field_857:2345"
  // requesting a client "cl" should return 546.
  static function parseFromWeekViewRow($row_id, $field_label, $base64decode = false) {
    // Find beginning of label.
    $pos = strpos($row_id, $field_label);
    if ($pos === false) return null; // Not found.

    // Strip suffix from row id.
    $suffixPos = strrpos($row_id, '_');
    if ($suffixPos)
      $remainder = substr($row_id, 0, $suffixPos);

    // Find beginning of value.
    $posBegin = 1 + strpos($remainder, ':', $pos);
    // Find end of value.
    $posEnd = strpos($remainder, ',', $posBegin);
    if ($posEnd === false) $posEnd = strlen($remainder);

    $result = substr($remainder, $posBegin, $posEnd - $posBegin);
    if ($base64decode)
        $result = base64_decode($result);

    return $result;
  }

  // dateFromDayHeader calculates date from start date and day header in week view.
  static function dateFromDayHeader($start_date, $day_header) {
    $objDate = new ttDate($start_date);
    $currentDayHeader = $objDate->getDay();
    for ($i = 0; $i < 7; $i++) {
      if ($currentDayHeader == $day_header)
        break;
      $objDate->incrementDay();
      $currentDayHeader = $objDate->getDay();
    }
    return $objDate->toString();
  }

  // insertDurationFromWeekView - inserts a new record in log tables from a week view post.
  static function insertDurationFromWeekView($fields, $custom_fields, $err) {
    global $i18n;
    global $user;

    // Determine date for a new entry.
    $entry_date = ttWeekViewHelper::dateFromDayHeader($fields['start_date'], $fields['day_header']);
    $objEntryDate = new ttDate($entry_date);

    // Prohibit creating entries in future.
    if (!$user->isOptionEnabled('future_entries') && $fields['browser_today']) {
      $objBrowserToday = new ttDate($fields['browser_today']);
      $server_tomorrow = new ttDate();
      $server_tomorrow->incrementDay();
      if ($objEntryDate->after($objBrowserToday) || $objEntryDate->after($server_tomorrow)) {
        $err->add($i18n->get('error.future_date'));
        return false;
      }
    }

    // Prepare an array of fields for regular insert function.
    $fields4insert = array();
    $fields4insert['date'] = $entry_date;
    $fields4insert['duration'] = $fields['duration'];
    $fields4insert['client'] = ttWeekViewHelper::parseFromWeekViewRow($fields['row_id'], 'cl');
    $fields4insert['billable'] = ttWeekViewHelper::parseFromWeekViewRow($fields['row_id'], 'bl');
    $fields4insert['project'] = ttWeekViewHelper::parseFromWeekViewRow($fields['row_id'], 'pr');
    $fields4insert['task'] = ttWeekViewHelper::parseFromWeekViewRow($fields['row_id'], 'ts');
    $fields4insert['note'] = isset($fields['note']) ? $fields['note'] : null;

    // Try to insert a record.
    $id = ttTimeHelper::insert($fields4insert);
    if (!$id) return false; // Something failed.

    // Insert time custom fields if we have them.
    $result = true;
    if ($id && $custom_fields && $custom_fields->timeFields) {
      if ($fields['row_id']) {
        foreach ($custom_fields->timeFields as $timeField) {
          $base64decode = $timeField['type'] == CustomFields::TYPE_TEXT; // Decode all text fields back to clear text.
          $timeCustomFields[$timeField['id']] = array('field_id' => $timeField['id'],
            'type' => $timeField['type'],
            'value' => ttWeekViewHelper::parseFromWeekViewRow($fields['row_id'], 'time_field_'.$timeField['id'], $base64decode));
        }
      }
      $result = $custom_fields->insertTimeFields($id, $timeCustomFields); // TODO: fix this.
    }

    return $result;
  }

  // modifyDurationFromWeekView - modifies a duration of an existing record from a week view post.
  static function modifyDurationFromWeekView($fields, $err) {
    global $i18n;
    global $user;

    // Possible errors: 1) Overlap if the existing record has start time. 2) Going beyond 24 hour boundary.
    if (!ttWeekViewHelper::canModify($fields['tt_log_id'], $fields['duration'], $err))
      return false;

    $mdb2 = getConnection();
    $duration = $fields['duration'];
    $tt_log_id = $fields['tt_log_id'];
    $user_id = $user->getUser();
    $sql = "update tt_log set duration = '$duration' where id = $tt_log_id and user_id = $user_id";
    $affected = $mdb2->exec($sql);
    if (is_a($affected, 'PEAR_Error'))
      return false;

    return true;
  }

  // canModify - determines if an  already existing tt_log record
  // can be modified with a new user-provided duration.
  static function canModify($tt_log_id, $new_duration, $err) {
    global $i18n;
    $mdb2 = getConnection();

    // Determine if we have start time in record, as further checking does not makes sense otherwise.
    $sql = "select user_id, date, start, duration from tt_log  where id = $tt_log_id";
    $res = $mdb2->query($sql);
    if (!is_a($res, 'PEAR_Error')) {
      if (!$res->numRows()) {
        $err->add($i18n->get('error.db')); // This is not expected.
        return false;
      }
      $val = $res->fetchRow();
      $oldDuration = $val['duration'];
      if (!$val['start'])
        return true; // There is no start time in the record, therefore safe to modify.
    }

    // We do have start time.
    $newMinutes = ttTimeHelper::toMinutes($new_duration);
    if ($newMinutes < 0) {
      // Negative durations are not supported when start time is defined.
      $err->add($i18n->get('error.field'), $i18n->get('label.duration'));
      return false;
    }

    // Quick test if new duration is less than already existing.
    $oldMinutes = ttTimeHelper::toMinutes($oldDuration);
    if ($newMinutes < $oldMinutes)
      return true; // Safe to modify.

    // Does the new duration put the record beyond 24:00 boundary?
    $startMinutes = ttTimeHelper::toMinutes($val['start']);
    $newEndMinutes = $startMinutes + $newMinutes;
    if ($newEndMinutes > 1440) {
      // Invalid duration, as new duration puts the record beyond current day.
      $err->add($i18n->get('error.field'), $i18n->get('label.duration'));
      return false;
    }

    // Does the new duration causes the record to overlap with others?
    $user_id = $val['user_id'];
    $date = $val['date'];
    $startMinutes = ttTimeHelper::toMinutes($val['start']);
    $start = ttTimeHelper::toAbsDuration($startMinutes);
    $finish = ttTimeHelper::toAbsDuration($newEndMinutes);
    if (ttTimeHelper::overlaps($user_id, $date, $start, $finish, $tt_log_id)) {
      $err->add($i18n->get('error.overlap'));
      return false;
    }

    return true; // There are no conflicts, safe to modify.
  }

  // modifyCommentFromWeekView - modifies a comment in an existing record from a week view post.
  static function modifyCommentFromWeekView($fields) {
    global $user;

    $mdb2 = getConnection();
    $tt_log_id = $fields['tt_log_id'];
    $comment = $fields['comment'];
    $user_id = $user->getUser();
    $sql = "update tt_log set comment = ".$mdb2->quote($fields['comment'])." where id = $tt_log_id and user_id = $user_id";
    $affected = $mdb2->exec($sql);
    if (is_a($affected, 'PEAR_Error'))
      return false;

    return true;
  }
}
