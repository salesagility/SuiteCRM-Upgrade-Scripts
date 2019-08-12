<?php
global $sugar_version;
if(!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');

}
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/


require_once('include/database/DBManagerFactory.php');
///////////////////////////////////////////////////////////////////////////////
////	UPGRADE UTILS
/**
 * upgrade wizard logging
 */
function _logThis($entry) {
	if(function_exists('logThis')) {
		logThis($entry);
	} else {

		$log = clean_path(getcwd().'/upgradeWizard.log');
		// create if not exists
		if(!file_exists($log)) {
			$fp = fopen($log, 'w+'); // attempts to create file
			if(!is_resource($fp)) {
				$GLOBALS['log']->fatal('UpgradeWizard could not create the upgradeWizard.log file');
			}
		} else {
			$fp = fopen($log, 'a+'); // write pointer at end of file
			if(!is_resource($fp)) {
				$GLOBALS['log']->fatal('UpgradeWizard could not open/lock upgradeWizard.log file');
			}
		}

		$line = date('r').' [UpgradeWizard] - '.$entry."\n";

		if(fwrite($fp, $line) === false) {
			$GLOBALS['log']->fatal('UpgradeWizard could not write to upgradeWizard.log: '.$entry);
		}

		fclose($fp);
	}
}

/**
 * This is specific for MSSQL. Before doing an alter table statement for MSSQL, this funciton will drop all the constraint
 * for that column
 */
 function dropColumnConstraintForMSSQL($tableName, $columnName) {
	global $sugar_config;
	if($sugar_config['dbconfig']['db_type'] == 'mssql') {
    	$db = DBManagerFactory::getInstance();
    	$query = "declare @name nvarchar(32), @sql nvarchar(1000)";

		$query = $query . " select @name = sys.objects.name from sys.objects where type_desc like '%CONSTRAINT' and (OBJECT_NAME(parent_object_id) like '%{$tableName}%') and sys.objects.object_id in (select default_object_id from sys.columns where name like '{$columnName}')";

		$query = $query . " begin
		    select @sql = 'ALTER TABLE {$tableName} DROP CONSTRAINT [' + @name + ']'
		    execute sp_executesql @sql
		end";

		$db->query($query);
	} // if
 } // fn

/**
 * gets Upgrade version
 */
function getUpgradeVersion() {
	$version = '';

	if(isset($_SESSION['sugar_version_file']) && !empty($_SESSION['sugar_version_file']) && is_file($_SESSION['sugar_version_file'])) {
		// do an include because the variables will load locally, and it will only popuplate in here.
		include($_SESSION['sugar_version_file']);
		return $sugar_db_version;
	}

	return $version;
}

// moving rebuild js to upgrade utils

function rebuild_js_lang(){
	require_once('include/utils/file_utils.php');
    global $sugar_config;

    $jsFiles = array();
    getFiles($jsFiles, $sugar_config['cache_dir'] . 'jsLanguage');
    foreach($jsFiles as $file) {
        unlink($file);
    }

    if(empty($sugar_config['js_lang_version']))
    	$sugar_config['js_lang_version'] = 1;
    else
    	$sugar_config['js_lang_version'] += 1;

    write_array_to_file( "sugar_config", $sugar_config, "config.php");

    //remove lanugage cache files
    require_once('include/SugarObjects/LanguageManager.php');
    LanguageManager::clearLanguageCache();
}

function clear_SugarLogic_cache(){
    require_once('include/utils/file_utils.php');
    global $sugar_config;

    $files = array();
    getFiles($files, $sugar_config['cache_dir'] . 'Expressions');
    foreach($files as $file) {
        unlink($file);
    }
}


/**
 * update DB version and sugar_version.php
 */

function upgradeDbAndFileVersion($version) {
	global $instancePath;
	if(!isset($instancePath) && isset($_SESSION['instancePath'])){
		 $instancePath = $_SESSION['instancePath'];
	}
	if(!function_exists('updateVersions')) {
		if(file_exists('modules/UpgradeWizard/uw_utils.php')){
			require_once('modules/UpgradeWizard/uw_utils.php');
		}
		elseif(file_exists($instancePath.'/modules/UpgradeWizard/uw_utils.php')){
			require_once($instancePath.'/modules/UpgradeWizard/uw_utils.php');
		}
	}
	updateVersions($version);
}
////	END UPGRADE UTILS
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
////	SCHEMA CHANGE PRIVATE METHODS
function _run_sql_file($filename) {
	global $path;

    if(!is_file($filename)) {
    	_logThis("*** ERROR: Could not find file: {$filename}", $path);
        return(false);
    }

    $fh         = fopen($filename,'r');
    $contents   = fread($fh, filesize($filename));
    fclose($fh);

    $lastsemi   = strrpos($contents, ';') ;
    $contents   = substr($contents, 0, $lastsemi);
    $queries    = explode(';', $contents);
    $db         = DBManagerFactory::getInstance();

	foreach($queries as $query){
		if(!empty($query)){
			_logThis("Sending query: ".$query, $path);
			if($db->dbType == 'oci8') {
			} else {
				$query_result = $db->query($query.';', true, "An error has occured while performing db query.  See log file for details.<br>");
			}
		}
	}

	return(true);
}



class CleanUpCustom
{

	// file contents multiton

	static $fileContents = array();

	static function resetFileContents() {
		self::$fileContents = array();
	}

	static function getRealFilename($filename) {
		$pathinfo = pathinfo($filename);
		$path = realpath($pathinfo['dirname']);
		if(!$path) {
			$path = $pathinfo['dirname'];
		}
		$realfile = $path . DIRECTORY_SEPARATOR . $pathinfo['basename'];
		return $realfile;
	}

	static function loadFileContents($filename, $relPath = null)
	{
		if(is_null($relPath)) {
			$relPath =  getcwd();
		}
		$filename = $relPath .  ($filename[0] != '/' ? (DIRECTORY_SEPARATOR .  $filename) : $filename);
		$filename = self::getRealFilename($filename);
		//self::log('load file contents: ' . $filename);
		if (!isset(self::$fileContents[$filename])) {
			if(!file_exists($filename)) {
				$msg = 'file not found: ' . $filename . ' - current working dir: ' . $relPath;
				self::log($msg);
				return false;
			}
			self::$fileContents[$filename] = file_get_contents($filename);

			// todo: make a backup temporary... (remove these lines...)
			//self::log('backup for ' . $filename);
			//file_put_contents($filename . '.backup.php', self::$fileContents[$filename]);
		}
		return self::$fileContents[$filename];
	}

	static function changeFileContents($filename, $contents)
	{
		$filename = self::getRealFilename($filename);
		if($contents) {
			//self::log('change contents of ' . $filename);
			self::$fileContents[$filename] = $contents;
			return true;
		}
		else {
			self::log('error: empty contents for ' . $filename);
			return false;
		}
	}

	static function saveFileContents()
	{
		foreach (self::$fileContents as $filename => $contents) {
			//self::log('save ' . $filename);
			if(!file_exists($filename)) {
				//self::log('file not found: ' . $filename . ', getcwd..');
				$filename = getcwd() . $filename;
				//self::log('try with: ' . $filename);
			}
//			if(!unlink($filename)) {
//				self::log('!!!! -- unlink failure:' . $filename);
//			}
			if(!file_put_contents($filename, $contents)) {
				$msg = 'write error: ' . $filename;
				self::log($msg, 'fatal');
				//throw new Exception($msg);
			}
		}
	}

	// update logic hook files

	private static $filesShouldCheckingOnCustomEntryPoint = array(
		'custom/modules/Calls/Reschedule.php',
		'custom/include/social/get_data.php',
		'custom/include/social/get_feed_data.php',
		'custom/modules/Home/AddDashboardPages.php',
		'custom/include/MySugar/retrieve_dash_page.php',
		'custom/modules/Home/RemoveDashboardPages.php',
		'custom/modules/Home/RenameDashboardPages.php',
	);

	static function updateLogicHookAndEntryPointRegistry($filename, $cleanUpModule = null)
	{
		self::log('update logic hook and entry point registry in ' . $filename . ' for module: [' . ($cleanUpModule ? $cleanUpModule : 'module is not set') . ']');
		if($cleanUpModule) {
			$logicHookFilename = "/custom/modules/$cleanUpModule/logic_hooks.php";
		}
		else {
			// if module name doesn't set
			$logicHookFilename = "/custom/modules/logic_hooks.php";
		}

		$customCleanedFilename = self::cleanUpCustomFilepath($filename);
		//self::log('custom cleaned filename: ' . $filename . ' => ' . $customCleanedFilename);

		// validate for custom filename is ok?
		if ($customCleanedFilename == $filename) {
			self::log('it isn\'t custom file: ' . $filename, 'fatal');
		}
		else
		{
			// clean up logic hook
			//self::log('load logic hook file: ' . $logicHookFilename);
			self::cleanUpCustomReferecnces($logicHookFilename, $filename, $customCleanedFilename);

			self::cleanUpEntryPointRegistry($filename, $customCleanedFilename);

		}
	}

	private static function cleanUpEntryPointRegistry($filename, $customCleanedFilename) {
		if(self::isCustomFilepath($filename) && in_array($filename, self::$filesShouldCheckingOnCustomEntryPoint)) {

			// get all entry point registry files
			$entryPointRegistryFilenames = array();
			//			$path = '/custom/Extension/application/Ext/EntryPointRegistry/';
			//			$files = glob($path . '*.php');
			//			foreach($files as $file) {
			//				$entryPointRegistryFilenames[] = $file;
			//			}
			//$entryPointRegistryFilenames[] = '/custom/application/Ext/EntryPointRegistry/entry_point_registry.ext.php';
			$entryPointRegistryFilenames[] = 'custom/include/MVC/Controller/entry_point_registry.php';
			//$entryPointRegistryFilenames[] = '/custom/include/MVC/Controller/entry_point_registry.php';
			//			if($cleanUpModule) {
			//				// clean up module specified entry point registry
			//				$entryPointRegistryFilenames[] =  "/modules/$cleanUpModule/entry_point_registry.php";
			//			}

			// clean up entry point registry
			foreach ($entryPointRegistryFilenames as $entryPointRegistryFilename) {
				//self::log('load entry point registry file (custom): ' . $entryPointRegistryFilename);
				self::cleanUpCustomReferecnces($entryPointRegistryFilename, $filename, $customCleanedFilename);
			}
		}
	}

	private static function cleanUpCustomReferecnces($refererFilename, $filename, $customCleanedFilename) {
		if($refererContents = self::loadFileContents($refererFilename)) {
			$regex = '/([\'"]?)' . addcslashes($filename, '/\\') . '([\'"]?)/';
			$customCleanedRefererContents = preg_replace($regex, '$1' . $customCleanedFilename . '$2', $refererContents);
			if ($customCleanedRefererContents == $refererContents) {
				self::log($refererFilename . ' file does not contains "' . $filename . '"');
			}
			self::changeFileContents($refererFilename, $customCleanedRefererContents);
		}
		else {
			self::log($refererFilename . ' file not found or doesn\'t have contents. Current working dir: ' . getcwd());
		}
	}

	private static $filesInSchedulersInV7_4 = array(
		'custom/Extension/modules/Schedulers/Ext/ScheduledTasks/AODScheduler.php',
		'custom/Extension/modules/Schedulers/Ext/ScheduledTasks/AOPScheduler.php',
		'custom/Extension/modules/Schedulers/Ext/ScheduledTasks/AORScheduler.php',
		'custom/Extension/modules/Schedulers/Ext/ScheduledTasks/aow_workflow.php',
	);

	static function cleanFiles($include) {

		if(is_string($include)) {
			$files = array();
			include($include);
		}
		else if(is_array($include)) {
			$files = $include;
		}
		else {
			self::log('Illegal format of includes', 'fatal');
		}

		$removeFiles = array();

		self::resetFileContents();

		foreach($files as $file) {

			$remove = false;

			$filename = $file[0];

			$cleanUpModule = $file[2];

			if(!file_exists($filename)) {
				//self::log('file not found for clean: ' . $filename);

				self::updateLogicHookAndEntryPointRegistry($filename, $cleanUpModule);

			}
			else {

				//self::log('next file: ' . $filename);
				$md5_values = $file[1];
				//$cleanUpModule = $file[2];
				$md5_file = md5_file($filename);

				foreach ($md5_values as $md5_value) {

					if ($md5_value == $md5_file) {
						$remove = true;
						break;
					}

				}

				//if ($remove && $cleanUpModule) {
					//self::log('update logic hook and entry point registry: ' . $filename . ' - clean up module: ' . $cleanUpModule);
					//self::updateLogicHookAndEntryPointRegistry($filename, $cleanUpModule);
				//}
				if ($remove) {
					self::log('file will remove: ' . $filename);
					$removeFiles[] = $filename;
					self::updateLogicHookAndEntryPointRegistry($filename, $cleanUpModule);
				}
				else {
					self::log('file exists and is not removed: ' . $filename);
				}
			}

		}

		// We need to remove any file that exist in custom/Extension/modules/Schedulers/Ext/ScheduledTasks in 7.4,
		// regardless if it has been changed or not
		foreach (self::$filesInSchedulersInV7_4 as $file) {
			self::log('file will remove (7.4 scheduler): ' . $filename);
			$removeFiles[] = $file;
		}

		self::log('save files...');
		self::saveFileContents();


		if($removeFiles) {
			self::log('Remove files...');
			foreach($removeFiles as $file) {
				self::log("upgrade removal will remove: $file");
			}
			include_once('modules/UpgradeWizard/UpgradeRemoval.php');
			$upgradeRemoval = new UpgradeRemoval();
			$info = $upgradeRemoval->processFilesToRemove($removeFiles);
			foreach((array) $info as $msg) {
			    self::log($msg);
			}
		}


	}

	private static function cleanUpCustomFilepath($filepath) {
		$filepath = preg_replace('/^custom\//', '', $filepath);
		return $filepath;
	}

	private static function isCustomFilepath($filepath) {
		$isCustomPath = preg_match('/^custom\//', $filepath);
		return $isCustomPath;
	}

	private static function getSuiteCRMVersion() {
		$suitecrm_version = null;
		// get current suitecrm version
		require_once('suitecrm_version.php');
		return $suitecrm_version;
	}

	// logging

	static function log($msg, $level = 'debug') {
		//echo $msg . '<br>' . PHP_EOL;
		//trigger_error('custom clean up log: '. $msg, E_USER_NOTICE);

//		openlog('upgrade', LOG_CONS | LOG_NDELAY | LOG_PID, LOG_USER);
//		syslog(LOG_DEBUG, 'custom clean up log: ' . $msg);
//		closelog();

		//var_dump($GLOBALS['log']);

//		if(isset($GLOBALS['log'])) {
//			$log = $GLOBALS['log'];
//			$log->$level('custom clean up log: ' . $msg);
//		}

		_logThis("upgrade custom cleanup: $level: $msg");

	}

}


function cleanUpCustom($include) {

	CleanUpCustom::cleanFiles($include);

}
////	END SCHEMA CHANGE METHODS
///////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////
////	FIX THINGS IN UPGRADE FUNCTIONS
////	END FIX THINGS IN UPGRADE FUNCTIONS
///////////////////////////////////////////////////////////////////////////////
?>
