<?php


// Note: escape apostrophes with THREE backslashes, like here:  choisir l\\\'option.
// Other characters (such as double-quotes in http links, etc.) do not have to be escaped.

$i18n_language = 'Danish (Dansk)';
$i18n_months = array('Januar', 'Februar', 'Marts', 'April', 'Maj', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'December');
$i18n_weekdays = array('Søndag', 'Mandag', 'Tirsdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lørdag');
$i18n_weekdays_short = array('Sø', 'Ma', 'Ti', 'On', 'To', 'Fr', 'Lø');

$i18n_key_words = array(

// Menus - short selection strings that are displayed on top of application web pages.
// Example: https://timetracker.anuko.com (black menu on top).
'menu.login' => 'Log ind',
'menu.logout' => 'Log ud',
'menu.forum' => 'Forum',
'menu.help' => 'Hjælp',
// TODO: translate the following.
// 'menu.register' => 'Register',
'menu.profile' => 'Profil',
// TODO: translate the following.
// 'menu.group' => 'Group',
'menu.plugins' => 'Plugins',
'menu.time' => 'Tid',
// TODO: translate the following.
// 'menu.puncher' => 'Punch',
// 'menu.week' => 'Week',
'menu.expenses' => 'Udgifter',
'menu.reports' => 'Rapporter',
// TODO: translate the following.
// 'menu.timesheets' => 'Timesheets',
'menu.charts' => 'Diagrammer',
'menu.projects' => 'Projekter',
'menu.tasks' => 'Opgaver',
'menu.users' => 'Brugere',
// TODO: translate the following.
// 'menu.groups' => 'Groups',
'menu.export' => 'Eksport',
'menu.clients' => 'Kunder',
'menu.options' => 'Indstillinger',

// Footer - strings on the bottom of most pages.
'footer.contribute_msg' => 'Du kan bidrage til Time Tracker på mange forskellige måder.',
'footer.credits' => 'Medvirkende',
'footer.license' => 'Licens',
'footer.improve' => 'Bidrag',

// Error messages.
'error.access_denied' => 'Adgang nægtet.',
'error.sys' => 'System fejl.',
'error.db' => 'Database fejl.',
// TODO: translate the following.
// 'error.registered_recently' => 'Registered recently.',
// 'error.feature_disabled' => 'Feature is disabled.',
'error.field' => 'Forkert "{0}" data.',
'error.empty' => 'Felt "{0}" er tom.',
'error.not_equal' => 'Felt "{0}" er ikke lig med "{1}".',
'error.interval' => 'Felt "{0}" skal være større end "{1}".',
'error.project' => 'Vælg projekt.',
'error.task' => 'Vælg opgave.',
'error.client' => 'Vælg klient.',
'error.report' => 'Vælg rapport.',
// TODO: translate the following.
// 'error.record' => 'Select record.',
'error.auth' => 'Forkert brugernavn eller adgangskode.',
// TODO: translate the following.
// 'error.2fa_code' => 'Invalid 2FA code.',
// 'error.weak_password' => 'Weak password.',
'error.user_exists' => 'Brugernavn eksistere allerede.',
// TODO: translate the following.
// 'error.object_exists' => 'Object with this name already exists.',
'error.invoice_exists' => 'Fakturanummer eksistere allerede.',
// TODO: translate the following.
// 'error.role_exists' => 'Role with this rank already exists.',
'error.no_invoiceable_items' => 'Der er ingen fakturerbar emner.',
// TODO: translate the following.
// 'error.no_records' => 'There are no records.',
'error.no_login' => 'Der finde ingen bruger med dette brugernavn.',
'error.no_groups' => 'Din database er tom, log ind som administrator og lav et nyt team.', // TODO: replace "team" with "group".
'error.upload' => 'Fil upload problem.',
'error.range_locked' => 'Dato interval er spærret.',
'error.mail_send' => 'Fejl under sending af mail.',
// TODO: improve the translation above by adding MAIL_SMTP_DEBUG part.
// 'error.mail_send' => 'Error sending mail. Use MAIL_SMTP_DEBUG for diagnostics.',
'error.no_email' => 'Der er ingen email tilknyttet dette brugernavn.',
'error.uncompleted_exists' => 'Uafsluttet registrering eksistere allerede. Luk eller slet det.',
'error.goto_uncompleted' => 'Gå til uafsluttet registrering.',
'error.overlap' => 'Tidsinterval overlapper eksisterende poster.',
'error.future_date' => 'Datoen er ud i fremtiden.',
// TODO: translate the following.
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
'button.login' => 'Log ind',
'button.now' => 'Nu',
'button.save' => 'Gem',
'button.copy' => 'Kopiér',
'button.cancel' => 'Fortryd',
'button.submit' => 'Gem',
'button.add' => 'Tilføj',
'button.delete' => 'Slet',
'button.generate' => 'Generer',
'button.reset_password' => 'Nulstil adgangskode',
'button.send' => 'Send',
'button.send_by_email' => 'Send som e-mail',
'button.create_group' => 'Lav et team', // TODO: replace "team" with "group".
'button.export' => 'Eksporter team', // TODO: replace "team" with "group".
'button.import' => 'Importer team', // TODO: replace "team" with "group".
'button.close' => 'Luk',
// TODO: translate the following.
// 'button.start' => 'Start',
'button.stop' => 'Stop',
// TODO: translate the following.
// 'button.approve' => 'Approve',
// 'button.disapprove' => 'Disapprove',
// 'button.sync' => 'Sync', // Used in Android app. The meaning is to synchronize offline time records with server.

// Labels for controls on forms. Labels in this section are used on multiple forms.
// TODO: translate the following.
// 'label.menu' => 'Menu',
'label.group_name' => 'Team navn', // TODO: replace "team" with "group".
'label.address' => 'Adresse',
'label.currency' => 'Valuta',
'label.manager_name' => 'Manager navn',
'label.manager_login' => 'Manager brugernavn',
'label.person_name' => 'Navn',
'label.thing_name' => 'Navn',
'label.login' => 'Login',
'label.password' => 'Adgangskode',
'label.confirm_password' => 'Gentag adgangskode',
'label.email' => 'E-mail',
'label.cc' => 'Cc',
// TODO: translate the following.
// 'label.bcc' => 'Bcc',
'label.subject' => 'Emne',
'label.date' => 'Dato',
'label.start_date' => 'Start dato',
'label.end_date' => 'Slut dato',
'label.user' => 'Bruger',
'label.users' => 'Brugere',
// TODO: translate the following.
// 'label.group' => 'Group',
// 'label.subgroups' => 'Subgroups',
// 'label.roles' => 'Roles',
'label.client' => 'Klient',
'label.clients' => 'Klienter',
'label.option' => 'Mulighed',
'label.invoice' => 'Faktura',
'label.project' => 'Projekt',
'label.projects' => 'Projekter',
'label.task' => 'Opgave',
'label.tasks' => 'Opgaver',
'label.description' => 'Beskrivelse',
'label.start' => 'Start',
'label.finish' => 'Slut',
'label.duration' => 'Varighed',
'label.note' => 'Notat',
// TODO: translate the following.
// 'label.notes' => 'Notes',
'label.item' => 'Emne',
'label.cost' => 'Pris',
// TODO: translate the following.
// 'label.ip' => 'IP',
'label.day_total' => 'Dagens total',
'label.week_total' => 'Ugens total',
'label.month_total' => 'Måneds total',
'label.today' => 'Idag',
'label.view' => 'Udseende',
'label.edit' => 'Rediger',
'label.delete' => 'Slet',
'label.configure' => 'Konfigurer',
'label.select_all' => 'Vælg alle',
'label.select_none' => 'Frevælg alle',
// TODO: translate the following.
// 'label.day_view' => 'Day view',
// 'label.week_view' => 'Week view',
// 'label.puncher' => 'Puncher',
'label.id' => 'ID',
'label.language' => 'Sprog',
'label.decimal_mark' => 'Decimal tegn',
'label.date_format' => 'Dato format',
'label.time_format' => 'Tids format',
'label.week_start' => 'Første dag i ugen',
'label.comment' => 'Kommentar',
'label.status' => 'Status',
'label.tax' => 'Moms',
'label.subtotal' => 'Subtotal',
'label.total' => 'Total',
'label.client_name' => 'Klient name',
'label.client_address' => 'Klient adresse',
'label.or' => 'eller',
'label.error' => 'Fejl',
'label.ldap_hint' => 'Skriv dit <b>Windows brugernavn</b> eller <b>adgangskode</b> i felterne her under.',
'label.required_fields' => '* - obligatorisk felt',
'label.on_behalf' => 'på vegne af',
'label.page' => 'Side',
'label.condition' => 'Betingelse',
// TODO: translate the following.
// 'label.yes' => 'yes',
// 'label.no' => 'no',
// 'label.sort' => 'Sort',
// Labels for plugins (extensions to Time Tracker that provide additional features).
'label.custom_fields' => 'Brugerdefineret felt',
'label.monthly_quotas' => 'Månedlig kvota',
// TODO: translate the following.
// 'label.entity' => 'Entity',
'label.type' => 'Type',
'label.type_dropdown' => 'Dropdown',
'label.type_text' => 'Tekst',
'label.required' => 'Required',
'label.fav_report' => 'Favorit rapport',
'label.schedule' => 'Tidsplan',
'label.what_is_it' => 'Hvad er det?',
'label.expense' => 'Udgift',
'label.quantity' => 'Mængde',
// TODO: translate the following.
// 'label.paid_status' => 'Paid status',
// 'label.paid' => 'Paid',
// 'label.mark_paid' => 'Mark paid',
// 'label.week_note' => 'Week note',
// 'label.week_list' => 'Week list',
// 'label.weekends' => 'Weekends',
// 'label.work_units' => 'Work units',
// 'label.work_units_short' => 'Units',
'label.totals_only' => 'Kun Total',
'label.quota' => 'Kvota',
// TODO: translate the following.
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
'label.active_users' => 'Aktive Brugere',
'label.inactive_users' => 'Inaktive Brugere',

// Entity names. We use lower case (in English) because they are used in dropdowns, too.
// They are used to associate a custom field with an entity type.
// TODO: translate the following.
// 'entity.time' => 'time',
// 'entity.user' => 'user',
// 'entity.project' => 'project',

// Form titles.
'title.error' => 'Fejl',
// TODO: Translate the following.
// 'title.success' => 'Success',
'title.login' => 'Login',
// TODO: translate the follolwing.
// 'title.2fa' => 'Two Factor Authentication',
'title.groups' => 'Teams', // TODO: change "teams" to "groups".
// TODO: translate the following.
// 'title.add_group' => 'Adding Group',
'title.edit_group' => 'Redigér Team', // TODO: change "team" to "group".
'title.delete_group' => 'Slet Team', // TODO: change "team" to "group".
'title.reset_password' => 'Nulstilling af Adgangskode',
'title.change_password' => 'Skift af Adgangskode',
'title.time' => 'Tid',
'title.edit_time_record' => 'Redigér Tidsregistrering',
'title.delete_time_record' => 'Slet Tidsregistrering',
// TODO: Translate the following.
// 'title.time_files' => 'Time Record Files',
// 'title.puncher' => 'Puncher',
'title.expenses' => 'Udgifter',
'title.edit_expense' => 'Redigér Udgift',
'title.delete_expense' => 'Slet Udgift',
// TODO: translate the following.
// 'title.expense_files' => 'Expense Item Files',
'title.predefined_expenses' => 'Predefinerede Udgifter',
'title.add_predefined_expense' => 'Tilføj Predefinerede Udgifter',
'title.edit_predefined_expense' => 'Redigér Predefinerede Udgifter',
'title.delete_predefined_expense' => 'Slet Predefinerede Udgifter',
'title.reports' => 'Rapporter',
'title.report' => 'Rapport',
'title.send_report' => 'Sender Rapport',
// TODO: Translate the following.
// 'title.timesheets' => 'Timesheets',
// 'title.timesheet' => 'Timesheet',
// 'title.timesheet_files' => 'Timesheet Files',
'title.invoice' => 'Faktura',
'title.send_invoice' => 'Sender Faktura',
'title.charts' => 'Diagrammer',
'title.projects' => 'Projekter',
// TODO: translate the following.
// 'title.project_files' => 'Project Files',
'title.add_project' => 'Tilføj Projekt',
'title.edit_project' => 'Redigér Projekt',
'title.delete_project' => 'Slet Projekt',
'title.tasks' => 'Opgaver',
'title.add_task' => 'Tilføj Opgave',
'title.edit_task' => 'Redigér Opgave',
'title.delete_task' => 'Slet Opgave',
'title.users' => 'Brugere',
'title.add_user' => 'Tilføj Bruger',
'title.edit_user' => 'Redigér Bruger',
'title.delete_user' => 'Slet Bruger',
// TODO: translate the following.
// 'title.roles' => 'Roles',
// 'title.add_role' => 'Adding Role',
// 'title.edit_role' => 'Editing Role',
// 'title.delete_role' => 'Deleting Role',
'title.clients' => 'Klienter',
'title.add_client' => 'Tilføj Klient',
'title.edit_client' => 'Redigér Klient',
'title.delete_client' => 'Slet Klient',
'title.invoices' => 'Faktura',
'title.add_invoice' => 'Tilføj Faktura',
'title.view_invoice' => 'Vis Faktura',
'title.delete_invoice' => 'Slet Faktura',
'title.notifications' => 'Meddelelser',
'title.add_notification' => 'Tilføj Meddelelse',
'title.edit_notification' => 'Redigér Meddelelse',
'title.delete_notification' => 'Slet Meddelelse',
// TODO: translate the following.
// 'title.add_timesheet' => 'Adding Timesheet',
// 'title.edit_timesheet' => 'Editing Timesheet',
// 'title.delete_timesheet' => 'Deleting Timesheet',
'title.monthly_quotas' => 'Månedlig Kvota',
'title.export' => 'Eksporter Team Data', // TODO: replace "team" with "group".
'title.import' => 'Importer Team Data', // TODO: replace "team" with "group".
'title.options' => 'Indstillinger',
// TODO: translate the following.
// 'title.display_options' => 'Display Options',
'title.profile' => 'Profil',
'title.plugins' => 'Plugins',
'title.cf_custom_fields' => 'Brugerdefineret Felt',
'title.cf_add_custom_field' => 'Tilføj Brugerdefineret Felt',
'title.cf_edit_custom_field' => 'Redigér Brugerdefineret Felt',
'title.cf_delete_custom_field' => 'Slet Brugerdefineret Felt',
'title.cf_dropdown_options' => 'Dropdown Muligheder',
'title.cf_add_dropdown_option' => 'Tilføj Mulighed',
'title.cf_edit_dropdown_option' => 'Redigér Mulighed',
'title.cf_delete_dropdown_option' => 'Slet Mulighed',
'title.locking' => 'Lås Registring',
// TODO: translate the following.
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
'dropdown.all' => '--- Alle ---',
'dropdown.no' => '--- Ingen ---',
// TODO: translate the following.
// 'dropdown.current_day' => 'today',
// 'dropdown.previous_day' => 'yesterday',
'dropdown.selected_day' => 'dag',
'dropdown.current_week' => 'Denne uge',
'dropdown.previous_week' => 'Sidste uge',
'dropdown.selected_week' => 'uge',
'dropdown.current_month' => 'Denne måned',
'dropdown.previous_month' => 'Sidste måned',
'dropdown.selected_month' => 'måned',
'dropdown.current_year' => 'Dette år',
// TODO: translate the following.
// 'dropdown.previous_year' => 'previous year',
'dropdown.selected_year' => 'år',
'dropdown.all_time' => 'Alt',
'dropdown.projects' => 'Projekter',
'dropdown.tasks' => 'Opgaver',
'dropdown.clients' => 'Klienter',
'dropdown.select' => '--- Vælg ---',
'dropdown.select_invoice' => '--- Vælg faktura ---',
// TODO: translate the following.
// 'dropdown.select_timesheet' => '--- select timesheet ---',
'dropdown.status_active' => 'Aktive',
'dropdown.status_inactive' => 'Inaktive',
'dropdown.delete' => 'Slet',
'dropdown.do_not_delete' => 'Slet ikke',
// TODO: translate the following.
// 'dropdown.approved' => 'approved',
// 'dropdown.not_approved' => 'not approved',
// 'dropdown.paid' => 'paid',
// 'dropdown.not_paid' => 'not paid',
// 'dropdown.ascending' => 'ascending',
// 'dropdown.descending' => 'descending',

// Login form. See example at https://timetracker.anuko.com/login.php.
'form.login.forgot_password' => 'Har du glemt din adgangskode?',
'form.login.about' => 'Anuko <a href="https://www.anuko.com/lp/tt_2.htm" target="_blank">Time Tracker</a> er et open source tidsregistrerings system.',

// Email subject and body for two-factor authentication.
// TODO: translate the following.
// 'email.2fa_code.subject' => 'Anuko Time Tracker two-factor authentication code',
// 'email.2fa_code.body' => "Dear User,\n\nYour two-factor authentication code is:\n\n%s\n\n",

// Two-factor authentication form. See example at https://timetracker.anuko.com/2fa.php.
// TODO: translate the following.
// 'form.2fa.hint' => 'Check your email for 2FA code and enter it here.',
// 'form.2fa.2fa_code' => '2FA code',

// Resetting Password form. See example at https://timetracker.anuko.com/password_reset.php.
'form.reset_password.message' => 'Nulstilling af adgangskode er sendt på email.',
'form.reset_password.email_subject' => 'Anuko Time Tracker - Anmodning om nulstilling af adgangskode',
// TODO: English string has changed. Re-translate the beginning.
// 'form.reset_password.email_body' => "Dear User,\n\nSomeone from IP %s requested your Anuko Time Tracker password reset. Please visit this link if you want to reset your password.\n\n%s\n\nAnuko Time Tracker is an open source time tracking system. Visit https://www.anuko.com for more information.\n\n",
// "IP %s" probably sounds awkward.
'form.reset_password.email_body' => "Hej\n\nNogen, IP %s, har bedt om at få nulstillet din adgangskode. Tryk på linket hvis du vil have nulstillet din adgangskode.\n\n%s\n\nAnuko Time Tracker er et open source tidsregistrerings system. Besøg https://www.anuko.com for mere information.\n\n",

// Changing Password form. See example at https://timetracker.anuko.com/password_change.php?ref=1.
'form.change_password.tip' => 'Skriv en ny adgangskode og tryk Gem.',

// Time form. See example at https://timetracker.anuko.com/time.php.
'form.time.duration_format' => '(tt:mm or 0.0)',
'form.time.billable' => 'Fakturerbar',
'form.time.uncompleted' => 'Uafsluttet',
'form.time.remaining_quota' => 'Resterende kvota',
'form.time.over_quota' => 'Over kvota',
// TODO: translate the following.
// 'form.time.remaining_balance' => 'Remaining balance',
// 'form.time.over_balance' => 'Over balance',

// Editing Time Record form. See example at https://timetracker.anuko.com/time_edit.php (get there by editing an uncompleted time record).
'form.time_edit.uncompleted' => 'Denne post blev kun gemt med starttidspunkt. Det er ikke en fejl.',

// Week view form. See example at https://timetracker.anuko.com/week.php.
// TODO: translate the following.
// 'form.week.new_entry' => 'New entry',

// Reports form. See example at https://timetracker.anuko.com/reports.php
'form.reports.save_as_favorite' => 'Gem som favorit',
'form.reports.confirm_delete' => 'Er du sikker på at du vil slette denne favorit rapport?',
'form.reports.include_billable' => 'Fakturerbar',
'form.reports.include_not_billable' => 'Ikke fakturerbar',
'form.reports.include_invoiced' => 'Faktureret',
'form.reports.include_not_invoiced' => 'Ikke faktureret',
// TODO: translate the following.
// 'form.reports.include_assigned' => 'assigned',
// 'form.reports.include_not_assigned' => 'not assigned',
// 'form.reports.include_pending' => 'pending',
'form.reports.select_period' => 'Vælg en periode',
'form.reports.set_period' => 'eller sæt datoer',
// TODO: translate the following.
// 'form.reports.note_containing' => 'Note containing',
'form.reports.show_fields' => 'Vis felter',
// TODO: translate the following.
// 'form.reports.time_fields' => 'Time fields',
// 'form.reports.user_fields' => 'User fields',
// 'form.reports.project_fields' => 'Project fields',
'form.reports.group_by' => 'Gruppér ved',
'form.reports.group_by_no' => '--- Ingen gruppereing ---',
'form.reports.group_by_date' => 'Dato',
'form.reports.group_by_user' => 'Bruger',
'form.reports.group_by_client' => 'Klient',
'form.reports.group_by_project' => 'Projekt',
'form.reports.group_by_task' => 'Opgave',

// Report form. See example at https://timetracker.anuko.com/report.php
// (after generating a report at https://timetracker.anuko.com/reports.php).
'form.report.export' => 'Eksport',
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
'form.invoice.number' => 'Fakturanummer',
'form.invoice.person' => 'Person',

// Deleting Invoice form. See example at https://timetracker.anuko.com/invoice_delete.php
'form.invoice.invoice_to_delete' => 'Faktura der skal slettes',
'form.invoice.invoice_entries' => 'Faktura emner',
// TODO: translate the following.
// 'form.invoice.confirm_deleting_entries' => 'Please confirm deleting invoice entries from Time Tracker.',

// Charts form. See example at https://timetracker.anuko.com/charts.php
'form.charts.interval' => 'Interval',
'form.charts.chart' => 'Diagram',

// Projects form. See example at https://timetracker.anuko.com/projects.php
'form.projects.active_projects' => 'Aktive Projecter',
'form.projects.inactive_projects' => 'Inaktive Projekter',

// Tasks form. See example at https://timetracker.anuko.com/tasks.php
'form.tasks.active_tasks' => 'Aktive Opgaver',
'form.tasks.inactive_tasks' => 'Inaktive Opgaver',

// Users form. See example at https://timetracker.anuko.com/users.php
// TODO: translate the following.
// 'form.users.uncompleted_entry_today' => 'User has an uncompleted time entry today',
'form.users.uncompleted_entry' => 'Bruger har en uafsluttet tidsregistrering',
'form.users.role' => 'Rolle',
'form.users.manager' => 'Manager',
'form.users.comanager' => 'Co-Manager',
'form.users.rate' => 'Sats',
'form.users.default_rate' => 'Standard Time Sats',

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
'form.clients.active_clients' => 'Aktive Klienter',
'form.clients.inactive_clients' => 'Inaktive Klienter',

// Deleting Client form. See example at https://timetracker.anuko.com/client_delete.php
'form.client.client_to_delete' => 'Klient der skal slettes',
'form.client.client_entries' => 'Klient indlæg',

// Exporting Group Data form. See example at https://timetracker.anuko.com/export.php
// TODO: replace "team" with "group" in the string below.
'form.export.hint' => 'Du kan eksportere alle Teamdata til en xml-fil. Det kan være nyttigt, hvis du migrerer data til din egen server.',
'form.export.compression' => 'Komprimering',
'form.export.compression_none' => 'Ingen',
'form.export.compression_bzip' => 'bzip',

// Importing Group Data form. See example at https://timetracker.anuko.com/import.php (login as admin first).
'form.import.hint' => 'Importer teamdata fra en xml-fil.', // TODO: replace "team" with "group".
'form.import.file' => 'Vælg fil',
'form.import.success' => 'Import sluttede med succes.',

// Groups form. See example at https://timetracker.anuko.com/admin_groups.php (login as admin first).
// TODO: replace "team" with "group" in the string below.
'form.groups.hint' => 'Opret et nyt team ved at oprette en ny teamadministrator konto. <br> Du kan også importere teamdata fra en xml-fil fra en anden Anuko Time Tracker-server (eksisterende brugernavne er ikke tilladt).',

// Group Settings form. See example at https://timetracker.anuko.com/group_edit.php.
'form.group_edit.12_hours' => '12 timers',
'form.group_edit.24_hours' => '24 timers',
// TODO: translate the following.
// 'form.group_edit.display_options' => 'Display options',
// 'form.group_edit.holidays' => 'Holidays',
'form.group_edit.tracking_mode' => 'Registrerings tilstand',
'form.group_edit.mode_time' => 'Tid',
'form.group_edit.mode_projects' => 'Projekter',
'form.group_edit.mode_projects_and_tasks' => 'Projekter og opgaver',
'form.group_edit.record_type' => 'Registrerings type',
'form.group_edit.type_all' => 'Alle',
'form.group_edit.type_start_finish' => 'Start og slut',
'form.group_edit.type_duration' => 'Varighed',
// TODO: translate the following.
// 'form.group_edit.punch_mode' => 'Punch mode',
// 'form.group_edit.one_uncompleted' => 'One uncompleted',
// 'form.group_edit.allow_overlap' => 'Allow overlap',
// 'form.group_edit.future_entries' => 'Future entries',
'form.group_edit.uncompleted_indicators' => 'Uafsluttede indikatore',
// TODO: translate the following.
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
'form.mail.to' => 'Til',
'form.mail.report_subject' => 'Tidsregistrerings Rapport',
'form.mail.footer' => 'Anuko Time Tracker er et open source<br>tidsregistrerings system. Besøg <a href="https://www.anuko.com">www.anuko.com</a> for mere information.',
'form.mail.report_sent' => 'Rapport sendt.',
'form.mail.invoice_sent' => 'Faktura sendt.',

// Quotas configuration form. See example at https://timetracker.anuko.com/quotas.php after enabling Monthly quotas plugin.
'form.quota.year' => 'År',
'form.quota.month' => 'Måned',
'form.quota.workday_hours' => 'Timer på en arbejdsdag',
'form.quota.hint' => 'Hvis værdierne er tomme, beregnes kvoter automatisk baseret på arbejdsdage og helligdage.',

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
