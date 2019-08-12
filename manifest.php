<?php
$manifest = array (
  'acceptable_sugar_flavors' => 
  array (
    0 => 'CE',
  ),
  'acceptable_sugar_versions' => 
  array (
    'exact_matches' => 
    array (
      0 => '6.5.20',
      1 => '6.5.21',	
      2 => '6.5.22',
      3 => '6.5.23',
      4 => '6.5.24',
	5 => '6.5.25',
	6 => '6.5.26',
    ),
    'regex_matches' => 
    array (
    ),
  ),

    'acceptable_php_versions' =>
        array (
            'exact_matches' =>
                array (
		    /* php version exact */
		/* /php version exact */
                ),
            'regex_matches' =>
                array (
		    /* php version regex */
			'^5\.[5-9](.*)', '^7\.(.*)'
		/* /php version regex */
                ),
        ),
    'acceptable_suitecrm_versions' =>
        array (
            'exact_matches' =>
                array (
		    /* suitecrm version exact */
			'7.11-beta', '7.11'
		/* /suitecrm version exact */
                ),
            'regex_matches' =>
                array (
		    /* suitecrm version regex */
			'^7\.11(.*)'
		/* /suitecrm version regex */
                ),
        ),       
  'author' => 'SalesAgility',
  'copy_files' => 
  array (
    'from_dir' => 'SuiteCRM-Upgrade-7.11.x-to-7.11.7',
    'to_dir' => '',
    'force_copy' => 
    array (
    ),
  ),
  'description' => '',
  'icon' => '',
  'is_uninstallable' => false,
  'offline_client_applicable' => true,
  'name' => 'SuiteCRM',
  'published_date' => '2019-07-31 17:00:00',
  'type' => 'patch',
  'version' => '7.11.7',
);
?>
