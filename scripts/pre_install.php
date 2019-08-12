<?php
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

require_once(clean_path($unzip_dir.'/scripts/upgrade_utils.php'));

function upgrade_config_pwd(){
    require_once('modules/Administration/Administration.php');
    $focus = new Administration();
    $focus->retrieveSettings(false, true);
    if(isset($focus->settings['ldap_admin_password']))
    {
        $pwd = $focus->encrpyt_before_save($focus->settings['ldap_admin_password']);
        $focus->saveSetting('ldap', 'admin_password', $pwd);
    }
    if(isset($focus->settings['proxy_password']))
    {
        $pwd = $focus->encrpyt_before_save($focus->settings['proxy_password']);
        $focus->saveSetting('proxy', 'password', $pwd);
    }
}


/**
 * @param string $minVersion
 * @param string $operator
 * @throws Exception
 */
function checkPHP($minVersion = '5.5.0', $operator = '<=') {

    if (version_compare(PHP_VERSION, $minVersion, $operator)) {
        $errMessage = 'Invalid PHP version, acceptable PHP version is ' . $minVersion . '+. ';
        echo $errMessage . '<br>
            <form method="post" action="">

                <input type="hidden" name="module" value="UpgradeWizard">
                <input type="hidden" name="action" value="index">
                <input type="hidden" name="step" value="-1">
                <input type="submit" class="button" value="Cancel">
            </form>';
        throw new Exception($errMessage);
        //exit;
    }

}

function pre_install() {
    //checkPHP();
    if(!file_exists('public')) {
        sugar_mkdir('public', 777);
    }
    include_once('suitecrm_version.php');
    $_SESSION['suitecrm_version_before_upgrade'] = $suitecrm_version;
    return true;
}
