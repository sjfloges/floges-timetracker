<?php


// Note: escape apostrophes with THREE backslashes, like here:  choisir l\\\'option.
// Other characters (such as double-quotes in http links, etc.) do not have to be escaped.

// Note to translators: Use proper capitalization rules for your language.

$i18n_language = 'Hungarian (Magyar)';
$i18n_months = array('Január', 'Február', 'Március', 'Április', 'Május', 'Június', 'Július', 'Augusztus', 'Szeptember', 'Október', 'November', 'December');
$i18n_weekdays = array('Vasárnap', 'Hétfő', 'Kedd', 'Szerda', 'Csütörtök', 'Péntek', 'Szombat');
$i18n_weekdays_short = array('V', 'H', 'K', 'Sz', 'Cs', 'P', 'Sz');

$i18n_key_words = array(

// Menus - short selection strings that are displayed on top of application web pages.
// Example: https://timetracker.anuko.com (black menu on top).
'menu.login' => 'Bejelentkezés',
'menu.logout' => 'Kijelentkezés',
'menu.forum' => 'Fórum',
'menu.help' => 'Segítség',
// TODO: translate the following.
// 'menu.register' => 'Register',
'menu.profile' => 'Profil',
'menu.group' => 'Csoport',
// TODO: translate the following.
// 'menu.plugins' => 'Plugins',
'menu.time' => 'Munkaidő',
// TODO: translate the following.
// 'menu.puncher' => 'Punch',
// 'menu.week' => 'Week',
// 'menu.expenses' => 'Expenses',
'menu.reports' => 'Riportok',
// TODO: translate the following.
// 'menu.timesheets' => 'Timesheets',
// 'menu.charts' => 'Charts',
'menu.projects' => 'Projektek',
// 'menu.tasks' => 'Tasks',
// TODO: translate the following.
// 'menu.users' => 'Users',
'menu.groups' => 'Csoportok',
// TODO: translate the following.
// 'menu.export' => 'Export',
'menu.clients' => 'Ügyfelek',
'menu.options' => 'Opciók',

// Footer - strings on the bottom of most pages.
// TODO: translate the following.
// 'footer.contribute_msg' => 'You can contribute to Time Tracker in different ways.',
// 'footer.credits' => 'Credits',
// 'footer.license' => 'License',
// 'footer.improve' => 'Contribute', // Translators: this could mean "Improve", if it makes better sense in your language.
                                     // This is a link to a webpage that describes how to contribute to the project.

// Error messages.
// TODO: translate the following.
// 'error.access_denied' => 'Access denied.',
// 'error.sys' => 'System error.',
'error.db' => 'Adatbázis hiba.',
// TODO: translate the following.
// 'error.registered_recently' => 'Registered recently.',
// 'error.feature_disabled' => 'Feature is disabled.',
'error.field' => 'Hibás "{0}" mező tartalma.',
'error.empty' => 'A "{0}" mező üres.',
'error.not_equal' => 'A "{0}" mező tartalma nem egyezik meg a "{1}" mező tartalmával.',
// TODO: translate the following.
// 'error.interval' => 'Field "{0}" must be greater than "{1}".',
'error.project' => 'Válassz projektet.',
// TODO: translate the following.
// 'error.task' => 'Select task.',
'error.client' => 'Válassz ügyfelet.',
// TODO: translate the following.
// 'error.report' => 'Select report.',
// 'error.record' => 'Select record.',
// 'error.auth' => 'Incorrect login or password.',
// 'error.2fa_code' => 'Invalid 2FA code.',
// 'error.weak_password' => 'Weak password.',
// 'error.user_exists' => 'User with this login already exists.',
// 'error.object_exists' => 'Object with this name already exists.',
// 'error.invoice_exists' => 'Invoice with this number already exists.',
// 'error.role_exists' => 'Role with this rank already exists.',
// 'error.no_invoiceable_items' => 'There are no invoiceable items.',
// TODO: translate the following.
// 'error.no_records' => 'There are no records.',
// 'error.no_login' => 'No user with this login.',
// 'error.no_groups' => 'Your database is empty. Login as admin and create a new group.',
'error.upload' => 'File feltöltési hiba.',
// TODO: translate the following.
// 'error.range_locked' => 'Date range is locked.',
// 'error.mail_send' => 'Error sending mail. Use MAIL_SMTP_DEBUG for diagnostics.',
// 'error.no_email' => 'No email associated with this login.',
// 'error.uncompleted_exists' => 'Uncompleted entry already exists. Close or delete it.',
// 'error.goto_uncompleted' => 'Go to uncompleted entry.',
// 'error.overlap' => 'Time interval overlaps with existing records.',
// 'error.future_date' => 'Date is in future.',
// 'error.xml' => 'Error in XML file at line %d: %s.',
// 'error.cannot_import' => 'Cannot import: %s.',
// 'error.format' => 'Invalid file format.',
// 'error.user_count' => 'Limit on user count.',
// 'error.expired' => 'Expiration date reached.',
// 'error.file_storage' => 'File storage server error.', // See comment in English file.

// Warning messages.
// TODO: translate the following.
// 'warn.sure' => 'Are you sure?',
// 'warn.confirm_save' => 'Date has changed. Confirm saving, not copying this item.',

// Success messages.
// TODO: translate the following.
// 'msg.success' => 'Operation completed successfully.',

// Labels for buttons.
'button.login' => 'Bejelentkezés',
'button.now' => 'Most',
'button.save' => 'Mentés',
// TODO: translate the following.
// 'button.copy' => 'Copy',
'button.cancel' => 'Vissza',
'button.submit' => 'Mentés',
'button.add' => 'Hozzáadás',
'button.delete' => 'Törlés',
'button.generate' => 'Generálás',
// TODO: translate the following.
// 'button.reset_password' => 'Reset password',
'button.send' => 'Küld',
'button.send_by_email' => 'Küldés e-mail-ben',
'button.create_group' => 'Csoport létrehozása',
'button.export' => 'Csoport exportálása',
'button.import' => 'Csoport importálása',
// TODO: translate the following.
// 'button.close' => 'Close',
// 'button.start' => 'Start',
// 'button.stop' => 'Stop',
// 'button.approve' => 'Approve',
// 'button.disapprove' => 'Disapprove',
// 'button.sync' => 'Sync', // Used in Android app. The meaning is to synchronize offline time records with server.

// Labels for controls on forms. Labels in this section are used on multiple forms.
// TODO: translate the following.
// 'label.menu' => 'Menu',
// 'label.group_name' => 'Group name',
// 'label.address' => 'Address',
'label.currency' => 'Pénznem',
// TODO: translate the following.
// 'label.manager_name' => 'Manager name',
// 'label.manager_login' => 'Manager login',
'label.person_name' => 'Név',
'label.thing_name' => 'Név',
// TODO: translate the following.
// 'label.login' => 'Login',
'label.password' => 'Jelszó',
'label.confirm_password' => 'Jelszó megerősítése',
'label.thing_name' => 'Név',
// TODO: translate the following.
// 'label.email' => 'Email',
'label.cc' => 'Másolatot kap',
// TODO: translate the following.
// 'label.bcc' => 'Bcc',
'label.subject' => 'Tárgy',
'label.date' => 'Dátum',
'label.start_date' => 'Kezdő időpont',
'label.end_date' => 'Vég időpont',
// TODO: translate the following.
// 'label.user' => 'User',
// 'label.users' => 'Users',
// 'label.group' => 'Group',
// 'label.subgroups' => 'Subgroups',
// 'label.roles' => 'Roles',
'label.client' => 'Ügyfél',
'label.clients' => 'Ügyfelek',
'label.option' => 'Opció',
'label.invoice' => 'Számla',
'label.project' => 'Projekt',
'label.projects' => 'Projektek',
// TODO: translate the following.
// 'label.task' => 'Task',
// 'label.tasks' => 'Tasks',
// 'label.description' => 'Description',
'label.start' => 'Kezdete',
'label.finish' => 'Vége',
'label.duration' => 'Időtartam',
'label.note' => 'Megjegyzés',
'label.notes' => 'Megjegyzések',
// TODO: translate the following.
// 'label.item' => 'Item',
// 'label.cost' => 'Cost',
// 'label.ip' => 'IP',
// 'label.day_total' => 'Day total',
// 'label.week_total' => 'Week total',
// 'label.month_total' => 'Month total',
'label.today' => 'Ma',
// TODO: translate the following.
// 'label.view' => 'View',
'label.edit' => 'Szerkesztés',
'label.delete' => 'Törlés',
// TODO: translate the following.
// 'label.configure' => 'Configure',
// TODO: translate the following.
'label.select_all' => 'Mindenkit kijelöl',
'label.select_none' => 'Senkit nem jelöl ki',
// 'label.day_view' => 'Day view',
// 'label.week_view' => 'Week view',
// 'label.puncher' => 'Puncher',
'label.id' => 'Azonosító',
// TODO: translate the following.
// 'label.language' => 'Language',
// 'label.decimal_mark' => 'Decimal mark',
// 'label.date_format' => 'Date format',
// 'label.time_format' => 'Time format',
// 'label.week_start' => 'First day of week',
'label.comment' => 'Megjegyzés',
'label.status' => 'Státusz',
'label.tax' => 'Adó',
'label.subtotal' => 'Részösszeg',
'label.total' => 'Összesen',
// TODO: translate the following.
// 'label.client_name' => 'Client name',
// 'label.client_address' => 'Client address',
'label.or' => 'vagy',
// TODO: translate the following.
// 'label.error' => 'Error',
// 'label.ldap_hint' => 'Type your <b>Windows login</b> and <b>password</b> in the fields below.',
'label.required_fields' => '* kötelezően kitöltendő mezők',
'label.on_behalf' => 'helyett',
// TODO: translate the following.
// 'label.page' => 'Page',
// 'label.condition' => 'Condition',
// 'label.yes' => 'yes',
// 'label.no' => 'no',
// 'label.sort' => 'Sort',
// Labels for plugins (extensions to Time Tracker that provide additional features).
// TODO: translate the following.
// 'label.custom_fields' => 'Custom fields',
// 'label.monthly_quotas' => 'Monthly quotas',
// 'label.entity' => 'Entity',
// 'label.type' => 'Type',
// 'label.type_dropdown' => 'dropdown',
// 'label.type_text' => 'text',
// 'label.required' => 'Required',
'label.fav_report' => 'Előre definiált riport formátum',
// TODO: translate the following.
// 'label.schedule' => 'Schedule',
// 'label.what_is_it' => 'What is it?',
// 'label.expense' => 'Expense',
// 'label.quantity' => 'Quantity',
// 'label.paid_status' => 'Paid status',
// 'label.paid' => 'Paid',
// 'label.mark_paid' => 'Mark paid',
// 'label.week_note' => 'Week note',
// 'label.week_list' => 'Week list',
// 'label.weekends' => 'Weekends',
// 'label.work_units' => 'Work units',
// 'label.work_units_short' => 'Units',
// 'label.totals_only' => 'Totals only',
// 'label.quota' => 'Quota',
// 'label.timesheet' => 'Timesheet',
// 'label.submitted' => 'Submitted',
// 'label.approved' => 'Approved',
// 'label.approval' => 'Report approval',
// 'label.mark_approved' => 'Mark approved',
// 'label.template' => 'Template',
// 'label.bind_templates_with_projects' => 'Bind templates with projects',
// 'label.prepopulate_note' => 'Prepopulate Note field',
// 'label.attachments' => 'Attachments',
// 'label.files' => 'Files',
// 'label.file' => 'File',
// 'label.active_users' => 'Active Users',
// 'label.inactive_users' => 'Inactive Users',

// Entity names. We use lower case (in English) because they are used in dropdowns, too.
// They are used to associate a custom field with an entity type.
// TODO: translate the following.
// 'entity.time' => 'time',
// 'entity.user' => 'user',
// 'entity.project' => 'project',

// Form titles.
// TODO: Translate the following.
// 'title.error' => 'Error',
// 'title.success' => 'Success',
'title.login' => 'Bejelentkezés',
// TODO: translate the follolwing.
// 'title.2fa' => 'Two Factor Authentication',
'title.groups' => 'Csoportok',
// TODO: translate the following.
// 'title.add_group' => 'Adding Group',
// 'title.edit_group' => 'Editing Group',
'title.delete_group' => 'Csoport törlése',
// TODO: translate the following.
// 'title.reset_password' => 'Resetting Password',
// 'title.change_password' => 'Changing Password',
// 'title.time' => 'Time',
// 'title.edit_time_record' => 'Editing Time Record',
// 'title.delete_time_record' => 'Deleting Time Record',
// 'title.time_files' => 'Time Record Files',
// 'title.puncher' => 'Puncher',
// 'title.expenses' => 'Expenses',
// 'title.edit_expense' => 'Editing Expense Item',
// 'title.delete_expense' => 'Deleting Expense Item',
// 'title.expense_files' => 'Expense Item Files',
// 'title.predefined_expenses' => 'Predefined Expenses',
// 'title.add_predefined_expense' => 'Adding Predefined Expense',
// 'title.edit_predefined_expense' => 'Editing Predefined Expense',
// 'title.delete_predefined_expense' => 'Deleting Predefined Expense',
'title.reports' => 'Riportok',
// TODO: translate the following.
// 'title.report' => 'Report',
// 'title.send_report' => 'Sending Report',
// 'title.timesheets' => 'Timesheets',
// 'title.timesheet' => 'Timesheet',
// 'title.timesheet_files' => 'Timesheet Files',
'title.invoice' => 'Számla',
// TODO: translate the following.
// 'title.send_invoice' => 'Sending Invoice',
// 'title.charts' => 'Charts',
'title.projects' => 'Projektek',
// TODO: translate the following.
// 'title.project_files' => 'Project Files',
'title.add_project' => 'Projekt hozzáadása',
'title.edit_project' => 'Projekt szerkesztése',
'title.delete_project' => 'Projekt törlése',
// TODO: translate the following.
// 'title.tasks' => 'Tasks',
// 'title.add_task' => 'Adding Task',
// 'title.edit_task' => 'Editing Task',
// 'title.delete_task' => 'Deleting Task',
// 'title.users' => 'Users',
// 'title.add_user' => 'Adding User',
// 'title.edit_user' => 'Editing User',
// 'title.delete_user' => 'Deleting User',
// 'title.roles' => 'Roles',
// 'title.add_role' => 'Adding Role',
// 'title.edit_role' => 'Editing Role',
// 'title.delete_role' => 'Deleting Role',
'title.clients' => 'Ügyfelek',
'title.add_client' => 'Ügyfél hozzáadása',
'title.edit_client' => 'Ügyfél szerkesztése',
'title.delete_client' => 'Ügyfél törlése',
'title.invoices' => 'Számlák',
// TODO: translate the following.
// 'title.add_invoice' => 'Adding Invoice',
// 'title.view_invoice' => 'Viewing Invoice',
// 'title.delete_invoice' => 'Deleting Invoice',
// 'title.notifications' => 'Notifications',
// 'title.add_notification' => 'Adding Notification',
// 'title.edit_notification' => 'Editing Notification',
// 'title.delete_notification' => 'Deleting Notification',
// 'title.add_timesheet' => 'Adding Timesheet',
// 'title.edit_timesheet' => 'Editing Timesheet',
// 'title.delete_timesheet' => 'Deleting Timesheet',
// 'title.monthly_quotas' => 'Monthly Quotas',
// 'title.export' => 'Exporting Group Data',
// 'title.import' => 'Importing Group Data',
'title.options' => 'Opciók',
// TODO: translate the following.
// 'title.display_options' => 'Display Options',
'title.profile' => 'Profil',
// TODO: translate the following.
// 'title.plugins' => 'Plugins',
// 'title.cf_custom_fields' => 'Custom Fields',
// 'title.cf_add_custom_field' => 'Adding Custom Field',
// 'title.cf_edit_custom_field' => 'Editing Custom Field',
// 'title.cf_delete_custom_field' => 'Deleting Custom Field',
// 'title.cf_dropdown_options' => 'Dropdown Options',
// 'title.cf_add_dropdown_option' => 'Adding Option',
// 'title.cf_edit_dropdown_option' => 'Editing Option',
// 'title.cf_delete_dropdown_option' => 'Deleting Option',
// NOTE TO TRANSLATORS: Locking is a feature to lock records from modifications (ex: weekly on Mondays we lock all previous weeks).
// It is also a name for the Locking plugin on the group settings page.
// 'title.locking' => 'Locking',
// 'title.week_view' => 'Week View',
// 'title.swap_roles' => 'Swapping Roles',
// 'title.work_units' => 'Work Units',
// 'title.templates' => 'Templates',
// 'title.add_template' => 'Adding Template',
// 'title.edit_template' => 'Editing Template',
// 'title.delete_template' => 'Deleting Template',
// 'title.edit_file' => 'Editing File',
// 'title.delete_file' => 'Deleting File',
// 'title.download_file' => 'Downloading File',

// Section for common strings inside combo boxes on forms. Strings shared between forms shall be placed here.
// Strings that are used in a single form must go to the specific form section.
'dropdown.all' => '--- összes ---',
'dropdown.no' => '--- nincs ---',
// TODO: translate the following.
// 'dropdown.current_day' => 'today',
// 'dropdown.previous_day' => 'yesterday',
// 'dropdown.selected_day' => 'day',
'dropdown.current_week' => 'ezen a héten',
'dropdown.previous_week' => 'múlt héten',
// TODO: translate the following.
// 'dropdown.selected_week' => 'week',
'dropdown.current_month' => 'ebben a hónapban',
'dropdown.previous_month' => 'múlt hónapban',
// TODO: translate the following.
// 'dropdown.selected_month' => 'month',
// 'dropdown.current_year' => 'this year',
// 'dropdown.previous_year' => 'previous year',
// 'dropdown.selected_year' => 'year',
// 'dropdown.all_time' => 'all time',
'dropdown.projects' => 'projektek',
// TODO: translate the following.
// 'dropdown.tasks' => 'tasks',
'dropdown.clients' => 'ügyfelek',
// TODO: translate the following.
// 'dropdown.select' => '--- select ---',
// 'dropdown.select_invoice' => '--- select invoice ---',
// 'dropdown.select_timesheet' => '--- select timesheet ---',
'dropdown.status_active' => 'aktív',
// TODO: translate the following.
// 'dropdown.status_inactive' => 'inactive',
// 'dropdown.delete' => 'delete',
// 'dropdown.do_not_delete' => 'do not delete',
// 'dropdown.approved' => 'approved',
// 'dropdown.not_approved' => 'not approved',
// 'dropdown.paid' => 'paid',
// 'dropdown.not_paid' => 'not paid',
// 'dropdown.ascending' => 'ascending',
// 'dropdown.descending' => 'descending',

// Login form. See example at https://timetracker.anuko.com/login.php.
'form.login.forgot_password' => 'Elfelejtetted a jelszót?',
// TODO: translate the following.
// 'form.login.about' => '',

// Email subject and body for two-factor authentication.
// TODO: translate the following.
// 'email.2fa_code.subject' => 'Anuko Time Tracker two-factor authentication code',
// 'email.2fa_code.body' => "Dear User,\n\nYour two-factor authentication code is:\n\n%s\n\n",

// Two-factor authentication form. See example at https://timetracker.anuko.com/2fa.php.
// TODO: translate the following.
// 'form.2fa.hint' => 'Check your email for 2FA code and enter it here.',
// 'form.2fa.2fa_code' => '2FA code',

// Resetting Password form. See example at https://timetracker.anuko.com/password_reset.php.
// TODO: translate the following.
// 'form.reset_password.message' => 'Password reset request sent by email.',
// 'form.reset_password.email_subject' => 'Anuko Time Tracker password reset request',
// 'form.reset_password.email_body' => "Dear User,\n\nSomeone from IP %s requested your Anuko Time Tracker password reset. Please visit this link if you want to reset your password.\n\n%s\n\nAnuko Time Tracker is an open source time tracking system. Visit https://www.anuko.com for more information.\n\n",

// Changing Password form. See example at https://timetracker.anuko.com/password_change.php?ref=1.
// TODO: translate the following.
// 'form.change_password.tip' => 'Type new password and click on Save.',

// Time form. See example at https://timetracker.anuko.com/time.php.
// TODO: translate the following.
'form.time.duration_format' => '(óó:pp vagy 0.0h)',
// TODO: translate the following.
// 'form.time.billable' => 'Billable',
// 'form.time.uncompleted' => 'Uncompleted',
// 'form.time.remaining_quota' => 'Remaining quota',
// 'form.time.over_quota' => 'Over quota',
// 'form.time.remaining_balance' => 'Remaining balance',
// 'form.time.over_balance' => 'Over balance',

// Editing Time Record form. See example at https://timetracker.anuko.com/time_edit.php (get there by editing an uncompleted time record).
// TODO: translate the following.
// 'form.time_edit.uncompleted' => 'This record was saved with only start time. It is not an error.',

// Week view form. See example at https://timetracker.anuko.com/week.php.
// TODO: translate the following.
// 'form.week.new_entry' => 'New entry',

// Reports form. See example at https://timetracker.anuko.com/reports.php
'form.reports.save_as_favorite' => 'Mentsük el ezt a riport formátumot',
// TODO: translate the following.
// 'form.reports.confirm_delete' => 'Are you sure you want to delete this favorite report?',
// 'form.reports.include_billable' => 'billable',
// 'form.reports.include_not_billable' => 'not billable',
// 'form.reports.include_invoiced' => 'invoiced',
// 'form.reports.include_not_invoiced' => 'not invoiced',
// 'form.reports.include_assigned' => 'assigned',
// 'form.reports.include_not_assigned' => 'not assigned',
// 'form.reports.include_pending' => 'pending',
'form.reports.select_period' => 'Jelölj meg egy időszakot',
'form.reports.set_period' => 'vagy állíts be konkrét dátumot',
// TODO: translate the following.
// 'form.reports.note_containing' => 'Note containing',
// 'form.reports.show_fields' => 'Show fields',
// 'form.reports.time_fields' => 'Time fields',
// 'form.reports.user_fields' => 'User fields',
// 'form.reports.project_fields' => 'Project fields',
'form.reports.group_by' => 'Csoportosítva',
'form.reports.group_by_no' => '--- csoportosítás nélkül ---',
'form.reports.group_by_date' => 'dátum',
// TODO: translate the following.
// 'form.reports.group_by_user' => 'user',
'form.reports.group_by_client' => 'ügyfél',
'form.reports.group_by_project' => 'projekt',
// TODO: translate the following.
// 'form.reports.group_by_task' => 'task',

// Report form. See example at https://timetracker.anuko.com/report.php
// (after generating a report at https://timetracker.anuko.com/reports.php).
'form.report.export' => 'Exportálása', // TODO: is this correct?
// TODO: translate the following.
// 'form.report.per_hour' => 'Per hour',
// 'form.report.assign_to_invoice' => 'Assign to invoice',
// 'form.report.assign_to_timesheet' => 'Assign to timesheet',

// Timesheets form. See example at https://timetracker.anuko.com/timesheets.php
// TODO: translate the following.
// 'form.timesheets.active_timesheets' => 'Active Timesheets',
// 'form.timesheets.inactive_timesheets' => 'Inactive Timesheets',

// Templates form. See example at https://timetracker.anuko.com/templates.php
// TODO: translate the following.
// 'form.templates.active_templates' => 'Active Templates',
// 'form.templates.inactive_templates' => 'Inactive Templates',

// Invoice form. See example at https://timetracker.anuko.com/invoice_view.php
// (you can get to this form after generating an invoice).
'form.invoice.number' => 'Számla azonosító száma',
'form.invoice.person' => 'Személy',

// Deleting Invoice form. See example at https://timetracker.anuko.com/invoice_delete.php
// 'form.invoice.invoice_to_delete' => 'Invoice to delete',
// 'form.invoice.invoice_entries' => 'Invoice entries',
// 'form.invoice.confirm_deleting_entries' => 'Please confirm deleting invoice entries from Time Tracker.',

// Charts form. See example at https://timetracker.anuko.com/charts.php
// TODO: translate the following.
// 'form.charts.interval' => 'Interval',
// 'form.charts.chart' => 'Chart',

// Projects form. See example at https://timetracker.anuko.com/projects.php
// TODO: translate the following.
// 'form.projects.active_projects' => 'Active Projects',
// 'form.projects.inactive_projects' => 'Inactive Projects',

// Tasks form. See example at https://timetracker.anuko.com/tasks.php
// TODO: translate the following.
// 'form.tasks.active_tasks' => 'Active Tasks',
// 'form.tasks.inactive_tasks' => 'Inactive Tasks',

// Users form. See example at https://timetracker.anuko.com/users.php
// TODO: translate the following.
// 'form.users.uncompleted_entry_today' => 'User has an uncompleted time entry today',
// 'form.users.uncompleted_entry' => 'User has an uncompleted time entry',
'form.users.role' => 'Szerepkör',
'form.users.manager' => 'Vezető',
'form.users.comanager' => 'Helyettes',
'form.users.rate' => 'Tarifa',
'form.users.default_rate' => 'Általános óradíj',

// Editing User form. See example at https://timetracker.anuko.com/user_edit.php
// TODO: translate the following.
// 'form.user_edit.swap_roles' => 'Swap roles',

// Roles form. See example at https://timetracker.anuko.com/roles.php
// TODO: translate the following.
// 'form.roles.active_roles' => 'Active Roles',
// 'form.roles.inactive_roles' => 'Inactive Roles',
// 'form.roles.rank' => 'Rank',
// 'form.roles.rights' => 'Rights',
// 'form.roles.assigned' => 'Assigned',
// 'form.roles.not_assigned' => 'Not assigned',

// Clients form. See example at https://timetracker.anuko.com/clients.php
// TODO: translate the following.
// 'form.clients.active_clients' => 'Active Clients',
// 'form.clients.inactive_clients' => 'Inactive Clients',

// Deleting Client form. See example at https://timetracker.anuko.com/client_delete.php
// TODO: translate the following.
// 'form.client.client_to_delete' => 'Client to delete',
// 'form.client.client_entries' => 'Client entries',

// Exporting Group Data form. See example at https://timetracker.anuko.com/export.php
// TODO: improve or check form.export.hint as the translation seems incorrect if we trust translate.google.com.
// Export does a single group export (all data in ONE group).
'form.export.hint' => 'Kimentheted az összes felvitt csoport adatait egy XML file-ba, ami megkönnyíti a TimeTracker szerverek közötti adatátvitelt.',
'form.export.compression' => 'Tömörítés',
// TODO: translate the following.
// 'form.export.compression_none' => 'none',
// 'form.export.compression_bzip' => 'bzip',

// Importing Group Data form. See example at https://timetracker.anuko.com/import.php (login as admin first).
'form.import.hint' => 'Csoport adatok importja XML file-ból.',
'form.import.file' => 'Válassz file',
'form.import.success' => 'Az importálás sikeresen véget ért.',

// Groups form. See example at https://timetracker.anuko.com/admin_groups.php (login as admin first).
// TODO: fix form.groups.hint by translating it properly from the English string. Note that the ending is not translated at all.
'form.groups.hint' => 'Új csoport létrehozása egy csoport-vezetői jogosultsággal.<br>A csoport adatokat importálhatjuk XML-ből (no login collisions are allowed).',

// Group Settings form. See example at https://timetracker.anuko.com/group_edit.php.
// TODO: translate the following.
// 'form.group_edit.12_hours' => '12 hours',
// 'form.group_edit.24_hours' => '24 hours',
// 'form.group_edit.display_options' => 'Display options',
// 'form.group_edit.holidays' => 'Holidays',
// 'form.group_edit.tracking_mode' => 'Tracking mode',
// 'form.group_edit.mode_time' => 'time',
// 'form.group_edit.mode_projects' => 'projects',
// 'form.group_edit.mode_projects_and_tasks' => 'projects and tasks',
// 'form.group_edit.record_type' => 'Record type',
// 'form.group_edit.type_all' => 'all',
// 'form.group_edit.type_start_finish' => 'start and finish',
// 'form.group_edit.type_duration' => 'duration',
// 'form.group_edit.punch_mode' => 'Punch mode',
// 'form.group_edit.one_uncompleted' => 'One uncompleted',
// 'form.group_edit.allow_overlap' => 'Allow overlap',
// 'form.group_edit.future_entries' => 'Future entries',
// 'form.group_edit.uncompleted_indicators' => 'Uncompleted indicators',
// 'form.group_edit.confirm_save' => 'Confirm saving',
// 'form.group_edit.advanced_settings' => 'Advanced settings',

// Advanced Group Settings form. See example at https://timetracker.anuko.com/group_advanced_edit.php.
// TODO: Translate the following.
// 'form.group_advanced_edit.allow_ip' => 'Allow IP',
// 'form.group_advanced_edit.password_complexity' => 'Password complexity',
// 'form.group_advanced_edit.2fa' => 'Two factor authentication',

// Deleting Group form. See example at https://timetracker.anuko.com/delete_group.php
// TODO: translate the following.
// 'form.group_delete.hint' => 'Are you sure you want to delete the entire group?',

// Mail form. See example at https://timetracker.anuko.com/report_send.php when emailing a report.
'form.mail.to' => 'Címzett',
// TODO: translate the following.
// 'form.mail.report_subject' => 'Time Tracker Report',
// 'form.mail.footer' => 'Anuko Time Tracker is an open source<br>time tracking system. Visit <a href="https://www.anuko.com">www.anuko.com</a> for more information.',
// 'form.mail.report_sent' => 'Report sent.',
'form.mail.invoice_sent' => 'A számla elküldve.',

// Quotas configuration form. See example at https://timetracker.anuko.com/quotas.php after enabling Monthly quotas plugin.
// TODO: translate the following.
// 'form.quota.year' => 'Year',
// 'form.quota.month' => 'Month',
// 'form.quota.workday_hours' => 'Hours in work day',
// 'form.quota.hint' => 'If values are empty, quotas are calculated automatically based on workday hours and holidays.',

// Swap roles form. See example at https://timetracker.anuko.com/swap_roles.php.
// TODO: translate the following.
// 'form.swap.hint' => 'Demote yourself to a lower role by swapping roles with someone else. This cannot be undone.',
// 'form.swap.swap_with' => 'Swap roles with',

// Work Units configuration form. See example at https://timetracker.anuko.com/work_units.php after enabling Work units plugin.
// TODO: translate the following.
// 'form.work_units.minutes_in_unit' => 'Minutes in unit',
// 'form.work_units.1st_unit_threshold' => '1st unit threshold',

// Roles and rights. These strings are used in multiple places. Grouped here to provide consistent translations.
// TODO: translate the following.
// 'role.user.label' => 'User',
// 'role.user.low_case_label' => 'user',
// 'role.user.description' => 'A regular member without management rights.',
// 'role.client.label' => 'Client',
// 'role.client.low_case_label' => 'client',
// 'role.client.description' => 'A client can view its own data.',
// 'role.supervisor.label' => 'Supervisor',
// 'role.supervisor.low_case_label' => 'supervisor',
// 'role.supervisor.description' => 'A person with a small set of management rights.',
// 'role.comanager.label' => 'Co-manager',
// 'role.comanager.low_case_label' => 'co-manager',
// 'role.comanager.description' => 'A person with a big set of management functions.',
// 'role.manager.label' => 'Manager',
// 'role.manager.low_case_label' => 'manager',
// 'role.manager.description' => 'Group manager. Can do most of things for a group.',
// 'role.top_manager.label' => 'Top manager',
// 'role.top_manager.low_case_label' => 'top manager',
// 'role.top_manager.description' => 'Top group manager. Can do everything in a tree of groups.',
// 'role.admin.label' => 'Administrator',
// 'role.admin.low_case_label' => 'administrator',
// 'role.admin.description' => 'Site adminsitrator.',

// Timesheet View form. See example at https://timetracker.anuko.com/timesheet_view.php.
// TODO: translate the following.
// 'form.timesheet_view.submit_subject' => 'Timesheet approval request',
// 'form.timesheet_view.submit_body' => "A new timesheet requires approval.<p>User: %s.",
// 'form.timesheet_view.approve_subject' => 'Timesheet approved',
// 'form.timesheet_view.approve_body' => "Your timesheet %s was approved.<p>%s",
// 'form.timesheet_view.disapprove_subject' => 'Timesheet not approved',
// 'form.timesheet_view.disapprove_body' => "Your timesheet %s was not approved.<p>%s",

// Display Options form. See example at https://timetracker.anuko.com/display_options.php.
// TODO: translate the following.
// 'form.display_options.note_on_separate_row' => 'Note on separate row',
// 'form.display_options.not_complete_days' => 'Not complete days',
// 'form.display_options.inactive_projects' => 'Inactive projects',
// 'form.display_options.cost_per_hour' => 'Cost per hour',
// 'form.display_options.custom_css' => 'Custom CSS',
);
