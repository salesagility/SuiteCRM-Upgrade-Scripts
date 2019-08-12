<?php

global $sugar_config, $db;
$sugar_config['default_max_tabs'] = 10;
$sugar_config['suitecrm_version'] = '7.11.7';
$sugar_config['email_enable_auto_send_opt_in'] = true;
$sugar_config['email_enable_confirm_opt_in'] = 'not-opt-in';
$sugar_config['search']['controller'] = 'UnifiedSearch';
$sugar_config['search']['defaultEngine'] = 'BasicSearchEngine';
$sugar_config['imap_test'] = false;

ksort($sugar_config);
write_array_to_file('sugar_config', $sugar_config, 'config.php');

