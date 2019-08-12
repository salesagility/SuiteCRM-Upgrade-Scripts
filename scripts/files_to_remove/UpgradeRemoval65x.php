<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2017 SalesAgility Ltd.
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
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

require_once 'modules/UpgradeWizard/UpgradeRemoval.php';

/**
 * Class UpgradeRemoval65x
 */
class UpgradeRemoval65x extends UpgradeRemoval
{
    /**
     * @var string minimal version for removal
     */
    public $version = '6.5.0';

    /**
     * getFilesToRemove
     * Return an array of files/directories to remove for 65x upgrades
     *
     * @param string $version
     *
     * @return array|mixed
     */
    public function getFilesToRemove($version)
    {
        $files = array();

	// SuiteCRM 7.9.0
	$files[] = 'modules/Activities/Popup_picker.html';
	$files[] = 'modules/Emails/include/ListView/ListView.js';
	
	// SuiteCRM 7.9.1

	$files[] = 'modules/jjwg_Maps/views/view.donate.php';

	// Security Fix 15/06/2017

	$files[] = 'testinstall.php';

	// SuiteCRM 7.9.2
	
	$files[] = 'modules/Activities/OpenListView.php';
	$files[] = 'modules/Studio/language/en_us.Portal.html';

	// SuiteCRM 7.9.3
	
	$files[] = 'modules/Calendar/Dashlets/CalendarDashlet/CalendarDashlet.ru_ru.lang.php';
	$files[] = 'modules/Calendar/Dashlets/CalendarDashlet/CalendarDashlet.es_es.lang.php';

        // SuiteCRM 7.9.5
        
        $files[] = 'include/javascript/tiny_mce/classes/AddOnManager.js';
        $files[] = 'include/javascript/tiny_mce/classes/ControlManager.js';
        $files[] = 'include/javascript/tiny_mce/classes/Editor.Events.js';
        $files[] = 'include/javascript/tiny_mce/classes/Editor.js';
        $files[] = 'include/javascript/tiny_mce/classes/EditorCommands.js';
        $files[] = 'include/javascript/tiny_mce/classes/EditorManager.js';
        $files[] = 'include/javascript/tiny_mce/classes/EnterKey.js';
        $files[] = 'include/javascript/tiny_mce/classes/ForceBlocks.js';
        $files[] = 'include/javascript/tiny_mce/classes/Formatter.js';
        $files[] = 'include/javascript/tiny_mce/classes/LegacyInput.js';
        $files[] = 'include/javascript/tiny_mce/classes/Popup.js';
        $files[] = 'include/javascript/tiny_mce/classes/UndoManager.js';
        $files[] = 'include/javascript/tiny_mce/classes/WindowManager.js';
        $files[] = 'include/javascript/tiny_mce/classes/adapter/jquery/adapter.js';
        $files[] = 'include/javascript/tiny_mce/classes/adapter/jquery/jquery.tinymce.js';
        $files[] = 'include/javascript/tiny_mce/classes/adapter/prototype/adapter.js';
        $files[] = 'include/javascript/tiny_mce/classes/dom/DOMUtils.js';
        $files[] = 'include/javascript/tiny_mce/classes/dom/Element.js';
        $files[] = 'include/javascript/tiny_mce/classes/dom/EventUtils.js';
        $files[] = 'include/javascript/tiny_mce/classes/dom/Range.js';
        $files[] = 'include/javascript/tiny_mce/classes/dom/RangeUtils.js';
        $files[] = 'include/javascript/tiny_mce/classes/dom/ScriptLoader.js';
        $files[] = 'include/javascript/tiny_mce/classes/dom/Selection.js';
        $files[] = 'include/javascript/tiny_mce/classes/dom/Serializer.js';
        $files[] = 'include/javascript/tiny_mce/classes/dom/Sizzle.js';
        $files[] = 'include/javascript/tiny_mce/classes/dom/TreeWalker.js';
        $files[] = 'include/javascript/tiny_mce/classes/dom/TridentSelection.js';
        $files[] = 'include/javascript/tiny_mce/classes/firebug/FIREBUG.LICENSE';
        $files[] = 'include/javascript/tiny_mce/classes/firebug/firebug-lite.js';
        $files[] = 'include/javascript/tiny_mce/classes/html/DomParser.js';
        $files[] = 'include/javascript/tiny_mce/classes/html/Entities.js';
        $files[] = 'include/javascript/tiny_mce/classes/html/Node.js';
        $files[] = 'include/javascript/tiny_mce/classes/html/SaxParser.js';
        $files[] = 'include/javascript/tiny_mce/classes/html/Schema.js';
        $files[] = 'include/javascript/tiny_mce/classes/html/Serializer.js';
        $files[] = 'include/javascript/tiny_mce/classes/html/Styles.js';
        $files[] = 'include/javascript/tiny_mce/classes/html/Writer.js';
        $files[] = 'include/javascript/tiny_mce/classes/tinymce.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/Button.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/ColorSplitButton.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/Container.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/Control.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/DropMenu.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/KeyboardNavigation.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/ListBox.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/Menu.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/MenuButton.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/MenuItem.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/NativeListBox.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/Separator.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/SplitButton.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/Toolbar.js';
        $files[] = 'include/javascript/tiny_mce/classes/ui/ToolbarGroup.js';
        $files[] = 'include/javascript/tiny_mce/classes/util/Cookie.js';
        $files[] = 'include/javascript/tiny_mce/classes/util/Dispatcher.js';
        $files[] = 'include/javascript/tiny_mce/classes/util/JSON.js';
        $files[] = 'include/javascript/tiny_mce/classes/util/JSONP.js';
        $files[] = 'include/javascript/tiny_mce/classes/util/JSONRequest.js';
        $files[] = 'include/javascript/tiny_mce/classes/util/Quirks.js';
        $files[] = 'include/javascript/tiny_mce/classes/util/URI.js';
        $files[] = 'include/javascript/tiny_mce/classes/util/VK.js';
        $files[] = 'include/javascript/tiny_mce/classes/util/XHR.js';
        $files[] = 'include/javascript/tiny_mce/jquery.tinymce.js';
        $files[] = 'include/javascript/tiny_mce/tiny_mce_dev.js';
        $files[] = 'include/javascript/tiny_mce/tiny_mce_jquery.js';
        $files[] = 'include/javascript/tiny_mce/tiny_mce_jquery_src.js';
        $files[] = 'include/javascript/tiny_mce/tiny_mce_prototype.js';
        $files[] = 'include/javascript/tiny_mce/tiny_mce_prototype_src.js';
        $files[] = 'include/javascript/yui/build/yuiloader/yuiloader.js';
        $files[] = 'include/javascript/yui/ext/yui-ext.js';

	// SuiteCRM-7.10.0-beta

	$files[] = 'testinstall.php';
	$files[] = 'tests/phpunit.xml.dist';

	// 7.9.x -> SuiteCRM-7.10.0-beta

	$files[] = 'install/confirmSettings.php';
	$files[] = 'install/download_patches.php';
	$files[] = 'install/systemOptions.php';
	$files[] = 'lib/SuiteCRM/Utility/CurrentLanguage.php';
	$files[] = 'themes/SuiteP/css/style.css';
	$files[] = 'themes/SuiteP/css/style.scss';
	$files[] = 'themes/SuiteP/css/suitepicon.scss';
	$files[] = 'themes/SuiteP/css/variables.scss';

	// 7.9.x -> SuiteCRM-7.10-RC

	$files[] = 'Zend/Crypt.php';
	$files[] = 'Zend/Crypt/DiffieHellman.php';
	$files[] = 'Zend/Crypt/DiffieHellman/Exception.php';
	$files[] = 'Zend/Crypt/Exception.php';
	$files[] = 'Zend/Crypt/Hmac.php';
	$files[] = 'Zend/Crypt/Hmac/Exception.php';
	$files[] = 'Zend/Crypt/Math.php';
	$files[] = 'Zend/Crypt/Math/BigInteger.php';
	$files[] = 'Zend/Crypt/Math/BigInteger/Bcmath.php';
	$files[] = 'Zend/Crypt/Math/BigInteger/Exception.php';
	$files[] = 'Zend/Crypt/Math/BigInteger/Gmp.php';
	$files[] = 'Zend/Crypt/Math/BigInteger/Interface.php';
	$files[] = 'Zend/Crypt/Math/Exception.php';
	$files[] = 'Zend/Crypt/Rsa.php';
	$files[] = 'Zend/Crypt/Rsa/Key.php';
	$files[] = 'Zend/Crypt/Rsa/Key/Private.php';
	$files[] = 'Zend/Crypt/Rsa/Key/Public.php';
	$files[] = 'testinstall.php';
	$files[] = 'themes/SuiteP/css/admin.scss';
	$files[] = 'themes/SuiteP/css/calendar.scss';
	$files[] = 'themes/SuiteP/css/campaigns.scss';
	$files[] = 'themes/SuiteP/css/cases.scss';
	$files[] = 'themes/SuiteP/css/dashboard.scss';
	$files[] = 'themes/SuiteP/css/detailview.scss';
	$files[] = 'themes/SuiteP/css/editview.scss';
	$files[] = 'themes/SuiteP/css/email.scss';
	$files[] = 'themes/SuiteP/css/forms.scss';
	$files[] = 'themes/SuiteP/css/jstree.scss';
	$files[] = 'themes/SuiteP/css/listview.scss';
	$files[] = 'themes/SuiteP/css/login.scss';
	$files[] = 'themes/SuiteP/css/main.scss';
	$files[] = 'themes/SuiteP/css/mixins.scss';
	$files[] = 'themes/SuiteP/css/modal.scss';
	$files[] = 'themes/SuiteP/css/navbar.scss';
	$files[] = 'themes/SuiteP/css/panels.scss';
	$files[] = 'themes/SuiteP/css/popup.scss';
	$files[] = 'themes/SuiteP/css/projects.scss';
	$files[] = 'themes/SuiteP/css/sidebar.scss';
	$files[] = 'themes/SuiteP/css/studio.scss';
	$files[] = 'themes/SuiteP/css/style.css';
	$files[] = 'themes/SuiteP/css/style.scss';
	$files[] = 'themes/SuiteP/css/suitepicon-glyphs.scss';
	$files[] = 'themes/SuiteP/css/suitepicon.eot';
	$files[] = 'themes/SuiteP/css/suitepicon.html';
	$files[] = 'themes/SuiteP/css/suitepicon.json';
	$files[] = 'themes/SuiteP/css/suitepicon.scss';
	$files[] = 'themes/SuiteP/css/suitepicon.svg';
	$files[] = 'themes/SuiteP/css/suitepicon.ttf';
	$files[] = 'themes/SuiteP/css/suitepicon.woff';
	$files[] = 'themes/SuiteP/css/tabs.scss';
	$files[] = 'themes/SuiteP/css/variables.scss';
	$files[] = 'themes/SuiteP/css/yui.scss';
        $files[] = 'lib/SuiteCRM/API/OAuth2/README.md';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Middleware/AuthorizationServer.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Middleware/ResourceServer.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/.htaccess';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Repositories/AccessTokenRepository.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Repositories/ScopeRepository.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Repositories/RefreshTokenRepository.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Repositories/ClientRepository.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Repositories/UserRepository.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Repositories/AuthCodeRepository.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Entities/ClientEntity.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Entities/RefreshTokenEntity.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Entities/ScopeEntity.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Entities/UserEntity.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Entities/AuthCodeEntity.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Entities/AccessTokenEntity.php';
        $files[] = 'lib/SuiteCRM/API/OAuth2/Keys.php';
        $files[] = 'lib/SuiteCRM/API/core/app.php';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/Interfaces/JsonApiResourceIdentifier.php';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/Interfaces/JsonApiResponseInterface.php';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/Links.php';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/Enumerator/SugarBeanRelationshipType.php';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/Enumerator/ResourceEnum.php';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/Enumerator/LinksMessage.php';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/Enumerator/RelationshipType.php';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/schema.json';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/Resource/Resource.php';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/Resource/ResourceIdentifier.php';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/Resource/Relationship.php';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/Resource/SuiteBeanResource.php';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/JsonApi.php';
        $files[] = 'lib/SuiteCRM/API/JsonApi/v1/Repositories/RelationshipRepository.php';
        $files[] = 'lib/SuiteCRM/API/public/index.php';
        $files[] = 'lib/SuiteCRM/API/v8/callable/README.md';
        $files[] = 'lib/SuiteCRM/API/v8/callable/oauth2.php';
        $files[] = 'lib/SuiteCRM/API/v8/Controller/OAuth2Controller.php';
        $files[] = 'lib/SuiteCRM/API/v8/Controller/ModuleController.php';
        $files[] = 'lib/SuiteCRM/API/v8/Controller/SchemaController.php';
        $files[] = 'lib/SuiteCRM/API/v8/Controller/ApiController.php';
        $files[] = 'lib/SuiteCRM/API/v8/swagger.json';
        $files[] = 'lib/SuiteCRM/API/v8/container/ModuleLanguage.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/Links.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/ServerRequestInterface.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/OAuth2Controller.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/CurrentLanguage.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/ConfigurationManager.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/AuthorizationServer.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/RelationshipRepository.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/DateTimeConverter.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/ResourceServer.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/Resource.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/ResourceIdentifier.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/AuthenticationController.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/ModuleController.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/JsonApi.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/ResponseInterface.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/cookie.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/ModulesLib.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/SchemaController.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/LoggerInterface.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/Relationship.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/SuiteBeanResource.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/ApiController.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/DatabaseManager.php';
        $files[] = 'lib/SuiteCRM/API/v8/container/current_user.php';
        $files[] = 'lib/SuiteCRM/API/v8/Library/UtilityLib.php';
        $files[] = 'lib/SuiteCRM/API/v8/Library/ModulesLib.php';
        $files[] = 'lib/SuiteCRM/API/v8/route/moduleRoutes.php';
        $files[] = 'lib/SuiteCRM/API/v8/route/schemaRoutes.php';
        $files[] = 'lib/SuiteCRM/API/v8/route/oauth2Routes.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/UnsupportedMediaType.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/InvalidJsonApiRequest.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/NotAllowed.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/Conflict.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/InvalidJsonApiResponse.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/ApiException.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/NotFound.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/EmptyBody.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/ModuleNotFound.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/Forbidden.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/BadRequest.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/NotAcceptable.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/ReservedKeywordNotAllowed.php';
        $files[] = 'lib/SuiteCRM/API/v8/Exception/NotImplementedException.php';
        $files[] = 'lib/SuiteCRM/Utility/SuiteLogger.php';
        $files[] = 'lib/SuiteCRM/Utility/ModuleLanguage.php';
        $files[] = 'lib/SuiteCRM/Enumerator/ExceptionCode.php';
        $files[] = 'lib/SuiteCRM/Exception/Exception.php';

	// 7.9.x -> 7.10-RC-2

	$files[] = 'testinstall.php';
	$files[] = 'tests/bootstrap.php';
	$files[] = 'tests/phpunit.xml.dist';
	$files[] = 'tests/runtests.sh';
	$files[] = 'tests/tests/configTest.php';
	$files[] = 'tests/tests/include/MVC/Controller/ControllerFactoryTest.php';
	$files[] = 'tests/tests/include/MVC/Controller/SugarControllerTest.php';
	$files[] = 'tests/tests/include/MVC/SugarApplicationTest.php';
	$files[] = 'tests/tests/include/MVC/SugarModuleTest.php';
	$files[] = 'tests/tests/include/MVC/View/SugarViewTest.php';
	$files[] = 'tests/tests/include/MVC/View/ViewFactoryTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.ajaxTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.ajaxuiTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.classicTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.detailTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.editTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.favoritesTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.htmlTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.importvcardTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.importvcardsaveTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.jsonTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.listTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.metadataTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.modulelistmenuTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.multieditTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.noaccessTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.popupTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.quickTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.quickcreateTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.quickeditTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.serializedTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.sugarpdfTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.vcardTest.php';
	$files[] = 'tests/tests/include/MVC/View/views/view.xmlTest.php';
	$files[] = 'tests/tests/include/utils/LogicHookTest.php';
	$files[] = 'tests/tests/include/utils/activityUtilsTest.php';
	$files[] = 'tests/tests/include/utils/arrayUtilsTest.php';
	$files[] = 'tests/tests/include/utils/autoloaderTest.php';
	$files[] = 'tests/tests/include/utils/dbUtilsTest.php';
	$files[] = 'tests/tests/include/utils/encryptionUtilsTest.php';
	$files[] = 'tests/tests/include/utils/fileUtilsTest.php';
	$files[] = 'tests/tests/include/utils/layoutUtilsTest.php';
	$files[] = 'tests/tests/include/utils/logicUtilsTest.php';
	$files[] = 'tests/tests/include/utils/mvcUtilsTest.php';
	$files[] = 'tests/tests/include/utils/phpZipUtilsTest.php';
	$files[] = 'tests/tests/include/utils/progressBarUtilsTest.php';
	$files[] = 'tests/tests/include/utils/securityUtilsTest.php';
	$files[] = 'tests/tests/include/utils/sugarFileUtilsTest.php';
	$files[] = 'tests/tests/include/utils/zipUtilsTest.php';
	$files[] = 'tests/tests/modules/ACLActions/ACLActionTest.php';
	$files[] = 'tests/tests/modules/ACLRoles/ACLRoleTest.php';
	$files[] = 'tests/tests/modules/AM_ProjectTemplates/AM_ProjectTemplatesTest.php';
	$files[] = 'tests/tests/modules/AM_TaskTemplates/AM_TaskTemplatesTest.php';
	$files[] = 'tests/tests/modules/AOD_Index/AOD_IndexTest.php';
	$files[] = 'tests/tests/modules/AOD_IndexEvent/AOD_IndexEventTest.php';
	$files[] = 'tests/tests/modules/AOK_KnowledgeBase/AOK_KnowledgeBaseTest.php';
	$files[] = 'tests/tests/modules/AOK_Knowledge_Base_Categories/AOK_Knowledge_Base_CategoriesTest.php';
	$files[] = 'tests/tests/modules/AOP_Case_Events/AOP_Case_EventsTest.php';
	$files[] = 'tests/tests/modules/AOP_Case_Updates/AOP_Case_UpdatesTest.php';
	$files[] = 'tests/tests/modules/AOR_Charts/AOR_ChartTest.php';
	$files[] = 'tests/tests/modules/AOR_Conditions/AOR_ConditionTest.php';
	$files[] = 'tests/tests/modules/AOR_Fields/AOR_FieldTest.php';
	$files[] = 'tests/tests/modules/AOR_Reports/AOR_ReportTest.php';
	$files[] = 'tests/tests/modules/AOR_Scheduled_Reports/AOR_Scheduled_ReportsTest.php';
	$files[] = 'tests/tests/modules/AOS_Contracts/AOS_ContractsTest.php';
	$files[] = 'tests/tests/modules/AOS_Invoices/AOS_InvoicesTest.php';
	$files[] = 'tests/tests/modules/AOS_Line_Item_Groups/AOS_Line_Item_GroupsTest.php';
	$files[] = 'tests/tests/modules/AOS_PDF_Templates/AOS_PDF_TemplatesTest.php';
	$files[] = 'tests/tests/modules/AOS_Product_Categories/AOS_Product_CategoriesTest.php';
	$files[] = 'tests/tests/modules/AOS_Products/AOS_ProductsTest.php';
	$files[] = 'tests/tests/modules/AOS_Products_Quotes/AOS_Products_QuotesTest.php';
	$files[] = 'tests/tests/modules/AOS_Quotes/AOS_QuotesTest.php';
	$files[] = 'tests/tests/modules/AOW_Actions/AOW_ActionTest.php';
	$files[] = 'tests/tests/modules/AOW_Conditions/AOW_ConditionTest.php';
	$files[] = 'tests/tests/modules/AOW_Processed/AOW_ProcessedTest.php';
	$files[] = 'tests/tests/modules/AOW_WorkFlow/AOW_WorkFlowTest.php';
	$files[] = 'tests/tests/modules/Accounts/AccountTest.php';
	$files[] = 'tests/tests/modules/Administration/AdministrationTest.php';
	$files[] = 'tests/tests/modules/Alerts/AlertTest.php';
	$files[] = 'tests/tests/modules/Audit/AuditTest.php';
	$files[] = 'tests/tests/modules/Bugs/BugTest.php';
	$files[] = 'tests/tests/modules/Calls/CallTest.php';
	$files[] = 'tests/tests/modules/Calls_Reschedule/Calls_RescheduleTest.php';
	$files[] = 'tests/tests/modules/CampaignLog/CampaignLogTest.php';
	$files[] = 'tests/tests/modules/CampaignTrackers/CampaignTrackerTest.php';
	$files[] = 'tests/tests/modules/Campaigns/CampaignTest.php';
	$files[] = 'tests/tests/modules/Cases/CaseTest.php';
	$files[] = 'tests/tests/modules/Contacts/ContactTest.php';
	$files[] = 'tests/tests/modules/Currencies/CurrencyTest.php';
	$files[] = 'tests/tests/modules/DocumentRevisions/DocumentRevisionTest.php';
	$files[] = 'tests/tests/modules/Documents/DocumentTest.php';
	$files[] = 'tests/tests/modules/EAPM/EAPMTest.php';
	$files[] = 'tests/tests/modules/EmailAddresses/EmailAddressTest.php';
	$files[] = 'tests/tests/modules/EmailMan/EmailManTest.php';
	$files[] = 'tests/tests/modules/EmailMarketing/EmailMarketingTest.php';
	$files[] = 'tests/tests/modules/EmailTemplates/EmailTemplateTest.php';
	$files[] = 'tests/tests/modules/EmailText/EmailTextTest.php';
	$files[] = 'tests/tests/modules/Emails/EmailTest.php';
	$files[] = 'tests/tests/modules/Employees/EmployeeTest.php';
	$files[] = 'tests/tests/modules/FP_Event_Locations/FP_Event_LocationsTest.php';
	$files[] = 'tests/tests/modules/FP_events/FP_eventsTest.php';
	$files[] = 'tests/tests/modules/Favorites/FavoritesTest.php';
	$files[] = 'tests/tests/modules/Groups/GroupTest.php';
	$files[] = 'tests/tests/modules/InboundEmail/InboundEmailTest.php';
	$files[] = 'tests/tests/modules/Leads/LeadTest.php';
	$files[] = 'tests/tests/modules/Meetings/MeetingTest.php';
	$files[] = 'tests/tests/modules/MergeRecords/MergeRecordTest.php';
	$files[] = 'tests/tests/modules/Notes/NoteTest.php';
	$files[] = 'tests/tests/modules/OAuthKeys/OAuthKeyTest.php';
	$files[] = 'tests/tests/modules/OAuthTokens/OAuthTokenTest.php';
	$files[] = 'tests/tests/modules/Opportunities/OpportunityTest.php';
	$files[] = 'tests/tests/modules/Project/ProjectTest.php';
	$files[] = 'tests/tests/modules/ProjectTask/ProjectTaskTest.php';
	$files[] = 'tests/tests/modules/ProspectLists/ProspectListTest.php';
	$files[] = 'tests/tests/modules/Prospects/ProspectTest.php';
	$files[] = 'tests/tests/modules/Relationships/RelationshipTest.php';
	$files[] = 'tests/tests/modules/Releases/ReleaseTest.php';
	$files[] = 'tests/tests/modules/Roles/RoleTest.php';
	$files[] = 'tests/tests/modules/SavedSearch/SavedSearchTest.php';
	$files[] = 'tests/tests/modules/Schedulers/SchedulerTest.php';
	$files[] = 'tests/tests/modules/SchedulersJobs/SchedulersJobTest.php';
	$files[] = 'tests/tests/modules/SecurityGroups/SecurityGroupTest.php';
	$files[] = 'tests/tests/modules/SugarFeed/SugarFeedTest.php';
	$files[] = 'tests/tests/modules/Tasks/TaskTest.php';
	$files[] = 'tests/tests/modules/Trackers/TrackerTest.php';
	$files[] = 'tests/tests/modules/UserPreferences/UserPreferenceTest.php';
	$files[] = 'tests/tests/modules/Users/UserTest.php';
	$files[] = 'tests/tests/modules/iCals/iCalTest.php';
	$files[] = 'tests/tests/modules/jjwg_Address_Cache/jjwg_Address_CacheTest.php';
	$files[] = 'tests/tests/modules/jjwg_Areas/jjwg_AreasTest.php';
	$files[] = 'tests/tests/modules/jjwg_Maps/jjwg_MapsTest.php';
	$files[] = 'tests/tests/modules/jjwg_Markers/jjwg_MarkersTest.php';
	$files[] = 'tests/tests/modules/vCals/vCalTest.php';
	$files[] = 'themes/SuiteP/css/admin.scss';
	$files[] = 'themes/SuiteP/css/calendar.scss';
	$files[] = 'themes/SuiteP/css/campaigns.scss';
	$files[] = 'themes/SuiteP/css/cases.scss';
	$files[] = 'themes/SuiteP/css/dashboard.scss';
	$files[] = 'themes/SuiteP/css/detailview.scss';
	$files[] = 'themes/SuiteP/css/editview.scss';
	$files[] = 'themes/SuiteP/css/email.scss';
	$files[] = 'themes/SuiteP/css/forms.scss';
	$files[] = 'themes/SuiteP/css/jstree.scss';
	$files[] = 'themes/SuiteP/css/listview.scss';
	$files[] = 'themes/SuiteP/css/login.scss';
	$files[] = 'themes/SuiteP/css/main.scss';
	$files[] = 'themes/SuiteP/css/mixins.scss';
	$files[] = 'themes/SuiteP/css/modal.scss';
	$files[] = 'themes/SuiteP/css/navbar.scss';
	$files[] = 'themes/SuiteP/css/panels.scss';
	$files[] = 'themes/SuiteP/css/popup.scss';
	$files[] = 'themes/SuiteP/css/projects.scss';
	$files[] = 'themes/SuiteP/css/sidebar.scss';
	$files[] = 'themes/SuiteP/css/studio.scss';
	$files[] = 'themes/SuiteP/css/style.css';
	$files[] = 'themes/SuiteP/css/style.scss';
	$files[] = 'themes/SuiteP/css/suitepicon-glyphs.scss';
	$files[] = 'themes/SuiteP/css/suitepicon.eot';
	$files[] = 'themes/SuiteP/css/suitepicon.html';
	$files[] = 'themes/SuiteP/css/suitepicon.json';
	$files[] = 'themes/SuiteP/css/suitepicon.scss';
	$files[] = 'themes/SuiteP/css/suitepicon.svg';
	$files[] = 'themes/SuiteP/css/suitepicon.ttf';
	$files[] = 'themes/SuiteP/css/suitepicon.woff';
	$files[] = 'themes/SuiteP/css/tabs.scss';
	$files[] = 'themes/SuiteP/css/variables.scss';
	$files[] = 'themes/SuiteP/css/yui.scss';

        // SuiteCRM 7.10

        $files[] = 'modules/Administration/SupportPortal.php';
        $files[] = 'modules/Administration/SupportPortal.tpl';
        $files[] = 'modules/Home/TrainingPortal.php';
        $files[] = 'modules/Home/TrainingPortal.tpl';
        $files[] = 'modules/SurveyQuestionOptions/language/de_DE.lang.php';
        $files[] = 'modules/SurveyQuestionOptions/language/ja_JP.lang.php';
        $files[] = 'modules/SurveyQuestionOptions/language/zh_CN.lang.php';
        $files[] = 'modules/SurveyQuestionResponses/language/de_DE.lang.php';
        $files[] = 'modules/SurveyQuestionResponses/language/ja_JP.lang.php';
        $files[] = 'modules/SurveyQuestionResponses/language/zh_CN.lang.php';
        $files[] = 'modules/SurveyQuestions/language/de_DE.lang.php';
        $files[] = 'modules/SurveyQuestions/language/ja_JP.lang.php';
        $files[] = 'modules/SurveyQuestions/language/zh_CN.lang.php';
        $files[] = 'modules/SurveyResponses/language/de_DE.lang.php';
        $files[] = 'modules/SurveyResponses/language/ja_JP.lang.php';
        $files[] = 'modules/SurveyResponses/language/zh_CN.lang.php';
        $files[] = 'modules/Surveys/language/de_DE.lang.php';
        $files[] = 'modules/Surveys/language/ja_JP.lang.php';
        $files[] = 'modules/Surveys/language/zh_CN.lang.php';
	$files[] = 'include/SugarEmailAddress/templates/displayEmailAddressOptInField.tpl';
	$files[] = 'modules/Emails/include/NonImportedDetailView/NonImportedDetailView.php';


        // SuiteCRM 7.10.2
         $files[] = 'lib/API/v8/Exception/Conflict.php';
         $files[] = 'lib/API/v8/Exception/NotAllowed.php';
         $files[] = 'lib/API/v8/Exception/ReservedKeywordNotAllowed.php';
         $files[] = 'lib/API/v8/Exception/InvalidJsonApiRequest.php';
         $files[] = 'lib/API/v8/Exception/BadRequest.php';
         $files[] = 'lib/API/v8/Exception/InvalidJsonApiResponse.php';
         $files[] = 'lib/API/v8/Exception/UnsupportedMediaType.php';
         $files[] = 'lib/API/v8/Exception/ModuleNotFound.php';
         $files[] = 'lib/API/v8/Exception/IdAlreadyExists.php';
         $files[] = 'lib/API/v8/Exception/EmptyBody.php';
         $files[] = 'lib/API/v8/Exception/Forbidden.php';
         $files[] = 'lib/API/v8/Exception/NotFound.php';
         $files[] = 'lib/API/v8/Exception/NotAcceptable.php';
         $files[] = 'modules/jjwg_Maps/DataTables/license-gpl2.txt';
         $files[] = 'modules/jjwg_Maps/DataTables/component.txt';
         $files[] = 'modules/jjwg_Maps/DataTables/Readme.txt';

        // SuiteCRM 7.10.2
         $files[] = 'lib/API/v8/Exception/Conflict.php';
         $files[] = 'lib/API/v8/Exception/NotAllowed.php';
         $files[] = 'lib/API/v8/Exception/ReservedKeywordNotAllowed.php';
         $files[] = 'lib/API/v8/Exception/InvalidJsonApiRequest.php';
         $files[] = 'lib/API/v8/Exception/BadRequest.php';
         $files[] = 'lib/API/v8/Exception/InvalidJsonApiResponse.php';
         $files[] = 'lib/API/v8/Exception/UnsupportedMediaType.php';
         $files[] = 'lib/API/v8/Exception/ModuleNotFound.php';
         $files[] = 'lib/API/v8/Exception/IdAlreadyExists.php';
         $files[] = 'lib/API/v8/Exception/EmptyBody.php';
         $files[] = 'lib/API/v8/Exception/Forbidden.php';
         $files[] = 'lib/API/v8/Exception/NotFound.php';
         $files[] = 'lib/API/v8/Exception/NotAcceptable.php';
         $files[] = 'modules/jjwg_Maps/DataTables/license-gpl2.txt';
         $files[] = 'modules/jjwg_Maps/DataTables/component.txt';
         $files[] = 'modules/jjwg_Maps/DataTables/Readme.txt';
         $files[] = 'modules/jjwg_Maps/DataTables/license-bsd.txt';
         $files[] = 'modules/jjwg_Maps/DataTables/package.txt';

        // SuiteCRM 7.10.2
         $files[] = 'lib/API/v8/Exception/Conflict.php';
         $files[] = 'lib/API/v8/Exception/NotAllowed.php';
         $files[] = 'lib/API/v8/Exception/ReservedKeywordNotAllowed.php';
         $files[] = 'lib/API/v8/Exception/InvalidJsonApiRequest.php';
         $files[] = 'lib/API/v8/Exception/BadRequest.php';
         $files[] = 'lib/API/v8/Exception/InvalidJsonApiResponse.php';
         $files[] = 'lib/API/v8/Exception/UnsupportedMediaType.php';
         $files[] = 'lib/API/v8/Exception/ModuleNotFound.php';
         $files[] = 'lib/API/v8/Exception/IdAlreadyExists.php';
         $files[] = 'lib/API/v8/Exception/EmptyBody.php';
         $files[] = 'lib/API/v8/Exception/Forbidden.php';
         $files[] = 'lib/API/v8/Exception/NotFound.php';
         $files[] = 'lib/API/v8/Exception/NotAcceptable.php';
         $files[] = 'modules/jjwg_Maps/DataTables/license-gpl2.txt';
         $files[] = 'modules/jjwg_Maps/DataTables/component.txt';
         $files[] = 'modules/jjwg_Maps/DataTables/Readme.txt';

        // SuiteCRM 7.10.2
         $files[] = 'lib/API/v8/Exception/Conflict.php';
         $files[] = 'lib/API/v8/Exception/NotAllowed.php';
         $files[] = 'lib/API/v8/Exception/ReservedKeywordNotAllowed.php';
         $files[] = 'lib/API/v8/Exception/InvalidJsonApiRequest.php';
         $files[] = 'lib/API/v8/Exception/BadRequest.php';
         $files[] = 'lib/API/v8/Exception/InvalidJsonApiResponse.php';
         $files[] = 'lib/API/v8/Exception/UnsupportedMediaType.php';
         $files[] = 'lib/API/v8/Exception/ModuleNotFound.php';
         $files[] = 'lib/API/v8/Exception/IdAlreadyExists.php';
         $files[] = 'lib/API/v8/Exception/EmptyBody.php';
         $files[] = 'lib/API/v8/Exception/Forbidden.php';
         $files[] = 'lib/API/v8/Exception/NotFound.php';
         $files[] = 'lib/API/v8/Exception/NotAcceptable.php';
         $files[] = 'modules/jjwg_Maps/DataTables/license-gpl2.txt';
         $files[] = 'modules/jjwg_Maps/DataTables/component.txt';
         $files[] = 'modules/jjwg_Maps/DataTables/Readme.txt';

        // SuiteCRM 7.10.4
        $files[] = 'include/images/1.gif';
	$files[] = 'modules/InboundEmail/InboundEmailTest.php';


        // SuiteCRM 7.10.7
         $files[] = 'include/StateCheckerCestAbstract.php';
         $files[] = 'tests/unit/configTest.php';
         $files[] = 'tests/unit/include/utils/zipUtilsTest.php';
         $files[] = 'tests/unit/include/utils/progressBarUtilsTest.php';
         $files[] = 'tests/unit/include/utils/securityUtilsTest.php';
         $files[] = 'tests/unit/include/utils/LogicHookTest.php';
         $files[] = 'tests/unit/include/utils/encryptionUtilsTest.php';
         $files[] = 'tests/unit/include/utils/dbUtilsTest.php';
         $files[] = 'tests/unit/include/utils/layoutUtilsTest.php';
         $files[] = 'tests/unit/include/utils/activityUtilsTest.php';
         $files[] = 'tests/unit/include/utils/fileUtilsTest.php';
         $files[] = 'tests/unit/include/utils/autoloaderTest.php';
         $files[] = 'tests/unit/include/utils/sugarFileUtilsTest.php';
         $files[] = 'tests/unit/include/utils/phpZipUtilsTest.php';
         $files[] = 'tests/unit/include/utils/arrayUtilsTest.php';
         $files[] = 'tests/unit/include/utils/logicUtilsTest.php';
         $files[] = 'tests/unit/include/utils/mvcUtilsTest.php';
         $files[] = 'tests/unit/include/SugarObjects/templates/PersonTest.php';
         $files[] = 'tests/unit/include/LangTextTest.php';
         $files[] = 'tests/unit/include/ErrorMessageTest.php';
         $files[] = 'tests/unit/include/APIErrorObjectTest.php';
         $files[] = 'tests/unit/include/SugarEmailAddress/SugarEmailAddressTest.php';
         $files[] = 'tests/unit/include/MVC/Controller/SugarControllerTest.php';
         $files[] = 'tests/unit/include/MVC/Controller/ControllerFactoryTest.php';
         $files[] = 'tests/unit/include/MVC/SugarModuleTest.php';
         $files[] = 'tests/unit/include/MVC/View/SugarViewTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.detailTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.importvcardsaveTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.listTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.noaccessTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.quickcreateTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.jsonTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.serializedTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.multieditTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.sugarpdfTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.xmlTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.popupTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.htmlTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.ajaxuiTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.editTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.classicTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.modulelistmenuTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.quickTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.favoritesTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.ajaxTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.vcardTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.metadataTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.quickeditTest.php';
         $files[] = 'tests/unit/include/MVC/View/views/view.importvcardTest.php';
         $files[] = 'tests/unit/include/MVC/View/ViewFactoryTest.php';
         $files[] = 'tests/unit/include/MVC/SugarApplicationTest.php';
         $files[] = 'tests/unit/include/LangExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/Robo/Commands/CodeCoverageCommandsTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/Exception/ExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/ModuleNotFoundExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/UnsupportedMediaTypeExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/NotAcceptableExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/EmptyBodyExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/ApiExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/ForbiddenExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/NotImplementedExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/BadRequestExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/ConflictExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/InvalidJsonApiResponseExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/NotFoundExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/ReservedKeywordsNotAllowedExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/NotAllowedExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/v8/Exception/InvalidJsonApiRequestExceptionTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Enumerator/SugarBeanRelationshipType.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Operators/OperatorsTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Operators/SpecialOperatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Operators/Comparators/LessThanOrEqualsOperatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Operators/Comparators/GreaterThanOrEqualsOperatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Operators/Comparators/NotEqualsOperatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Operators/Comparators/GreaterThanOperatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Operators/Comparators/InOperatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Operators/Comparators/NotInOperatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Operators/Comparators/EqualsOperatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Operators/Comparators/LessThanOperatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Operators/FieldOperatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Operators/Strings/LikeOperatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Operators/Strings/NotLikeOperatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Validators/ValueValidatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Validators/FieldValidatorTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Interpreters/ByPreMadeFilters/TodayTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Interpreters/FilterInterpreterTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Parsers/FilterParserMock.php';
         $files[] = 'tests/unit/lib/SuiteCRM/API/JsonApi/v1/Filters/Parsers/FilterParserTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/Utility/PathsTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/Utility/OperatingSystemTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/Utility/ModuleLanguageTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/Utility/SuiteLoggerTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/Utility/CurrentLanguageTest.php';
         $files[] = 'tests/unit/lib/SuiteCRM/Utility/StringValidatorTest.php';
         $files[] = 'tests/unit/SuitePHPUnit_Framework_TestCase.php';
         $files[] = 'tests/unit/modules/AOP_Case_Updates/AOP_Case_UpdatesTest.php';
         $files[] = 'tests/unit/modules/AOR_Scheduled_Reports/AOR_Scheduled_ReportsTest.php';
         $files[] = 'tests/unit/modules/Trackers/TrackerTest.php';
         $files[] = 'tests/unit/modules/Audit/AuditTest.php';
         $files[] = 'tests/unit/modules/Currencies/CurrencyTest.php';
         $files[] = 'tests/unit/modules/Administration/AdministrationTest.php';
         $files[] = 'tests/unit/modules/AOK_KnowledgeBase/AOK_KnowledgeBaseTest.php';
         $files[] = 'tests/unit/modules/Emails/EmailTest.php';
         $files[] = 'tests/unit/modules/SavedSearch/SavedSearchTest.php';
         $files[] = 'tests/unit/modules/FP_Event_Locations/FP_Event_LocationsTest.php';
         $files[] = 'tests/unit/modules/Documents/DocumentTest.php';
         $files[] = 'tests/unit/modules/EmailTemplates/EmailTemplateTest.php';
         $files[] = 'tests/unit/modules/EAPM/EAPMTest.php';
         $files[] = 'tests/unit/modules/Calls/CallTest.php';
         $files[] = 'tests/unit/modules/Roles/RoleTest.php';
         $files[] = 'tests/unit/modules/ProjectTask/ProjectTaskTest.php';
         $files[] = 'tests/unit/modules/Project/ProjectTest.php';
         $files[] = 'tests/unit/modules/AM_TaskTemplates/AM_TaskTemplatesTest.php';
         $files[] = 'tests/unit/modules/UserPreferences/UserPreferenceTest.php';
         $files[] = 'tests/unit/modules/ProspectLists/ProspectListTest.php';
         $files[] = 'tests/unit/modules/AOW_WorkFlow/AOW_WorkFlowTest.php';
         $files[] = 'tests/unit/modules/Meetings/MeetingTest.php';
         $files[] = 'tests/unit/modules/MergeRecords/MergeRecordTest.php';
         $files[] = 'tests/unit/modules/jjwg_Address_Cache/jjwg_Address_CacheTest.php';
         $files[] = 'tests/unit/modules/CampaignLog/CampaignLogTest.php';
         $files[] = 'tests/unit/modules/Calls_Reschedule/Calls_RescheduleTest.php';
         $files[] = 'tests/unit/modules/AOD_IndexEvent/AOD_IndexEventTest.php';
         $files[] = 'tests/unit/modules/AOR_Charts/AOR_ChartTest.php';
         $files[] = 'tests/unit/modules/AOR_Conditions/AOR_ConditionTest.php';
         $files[] = 'tests/unit/modules/CampaignTrackers/CampaignTrackerTest.php';
         $files[] = 'tests/unit/modules/Prospects/ProspectTest.php';
         $files[] = 'tests/unit/modules/Employees/EmployeeTest.php';
         $files[] = 'tests/unit/modules/AOS_Line_Item_Groups/AOS_Line_Item_GroupsTest.php';
         $files[] = 'tests/unit/modules/Campaigns/CampaignTest.php';
         $files[] = 'tests/unit/modules/AOS_Contracts/AOS_ContractsTest.php';
         $files[] = 'tests/unit/modules/AOK_Knowledge_Base_Categories/AOK_Knowledge_Base_CategoriesTest.php';
         $files[] = 'tests/unit/modules/AOW_Conditions/AOW_ConditionTest.php';
         $files[] = 'tests/unit/modules/AOS_PDF_Templates/AOS_PDF_TemplatesTest.php';
         $files[] = 'tests/unit/modules/DocumentRevisions/DocumentRevisionTest.php';
         $files[] = 'tests/unit/modules/AOS_Invoices/AOS_InvoicesTest.php';
         $files[] = 'tests/unit/modules/Users/UserTest.php';
         $files[] = 'tests/unit/modules/EmailAddresses/EmailAddressTest.php';
         $files[] = 'tests/unit/modules/AOR_Reports/AOR_ReportTest.php';
         $files[] = 'tests/unit/modules/EmailMarketing/EmailMarketingTest.php';
         $files[] = 'tests/unit/modules/Cases/CaseTest.php';
         $files[] = 'tests/unit/modules/Opportunities/OpportunityTest.php';
         $files[] = 'tests/unit/modules/AOS_Products/AOS_ProductsTest.php';
         $files[] = 'tests/unit/modules/AM_ProjectTemplates/AM_ProjectTemplatesTest.php';
         $files[] = 'tests/unit/modules/jjwg_Areas/jjwg_AreasTest.php';
         $files[] = 'tests/unit/modules/ACLActions/ACLActionTest.php';
         $files[] = 'tests/unit/modules/AOW_Processed/AOW_ProcessedTest.php';
         $files[] = 'tests/unit/modules/jjwg_Maps/jjwg_MapsTest.php';
         $files[] = 'tests/unit/modules/SugarFeed/SugarFeedTest.php';
         $files[] = 'tests/unit/modules/AOW_Actions/AOW_ActionTest.php';
         $files[] = 'tests/unit/modules/iCals/iCalTest.php';
         $files[] = 'tests/unit/modules/OAuthKeys/OAuthKeyTest.php';
         $files[] = 'tests/unit/modules/Leads/LeadTest.php';
         $files[] = 'tests/unit/modules/vCals/vCalTest.php';
         $files[] = 'tests/unit/modules/Relationships/RelationshipTest.php';
         $files[] = 'tests/unit/modules/Notes/NoteTest.php';
         $files[] = 'tests/unit/modules/Groups/GroupTest.php';
         $files[] = 'tests/unit/modules/Accounts/AccountTest.php';
         $files[] = 'tests/unit/modules/Tasks/TaskTest.php';
         $files[] = 'tests/unit/modules/SchedulersJobs/SchedulersJobTest.php';
         $files[] = 'tests/unit/modules/OAuthTokens/OAuthTokenTest.php';
         $files[] = 'tests/unit/modules/ACLRoles/ACLRoleTest.php';
         $files[] = 'tests/unit/modules/AOS_Products_Quotes/AOS_Products_QuotesTest.php';
         $files[] = 'tests/unit/modules/SecurityGroups/SecurityGroupTest.php';
         $files[] = 'tests/unit/modules/Alerts/AlertTest.php';
         $files[] = 'tests/unit/modules/Favorites/FavoritesTest.php';
         $files[] = 'tests/unit/modules/jjwg_Markers/jjwg_MarkersTest.php';
         $files[] = 'tests/unit/modules/Releases/ReleaseTest.php';
         $files[] = 'tests/unit/modules/Bugs/BugTest.php';
         $files[] = 'tests/unit/modules/FP_events/FP_eventsTest.php';
         $files[] = 'tests/unit/modules/EmailMan/EmailManTest.php';
         $files[] = 'tests/unit/modules/InboundEmail/InboundEmailTest.php';
         $files[] = 'tests/unit/modules/EmailText/EmailTextTest.php';
         $files[] = 'tests/unit/modules/Contacts/ContactTest.php';
         $files[] = 'tests/unit/modules/AOR_Fields/AOR_FieldTest.php';
         $files[] = 'tests/unit/modules/AOS_Product_Categories/AOS_Product_CategoriesTest.php';
         $files[] = 'tests/unit/modules/AOS_Quotes/AOS_QuotesTest.php';
         $files[] = 'tests/unit/modules/AOD_Index/AOD_IndexTest.php';
         $files[] = 'tests/unit/modules/Schedulers/SchedulerTest.php';
         $files[] = 'tests/unit/modules/AOP_Case_Events/AOP_Case_EventsTest.php';
         $files[] = 'tests/unit/data/SugarBeanMock.php';
         $files[] = 'tests/unit/data/SugarBeanTest.php';
         $files[] = '.git/objects/pack/pack-9472d643313528e1c80bc3ca943055d78fbe0c88.idx';
         $files[] = '.git/objects/pack/pack-9472d643313528e1c80bc3ca943055d78fbe0c88.pack';
         $files[] = 'themes/SuiteP/images/sidebar/modules/Emails';
         $files[] = 'themes/SuiteP/images/sub_panel/Email_Marketing2.svg';
         $files[] = 'themes/SuiteP/images/sub_panel/Email_Marketing.svg';
         $files[] = 'themes/SuiteP/images/sub_panel/Email_Marketing.png';
         $files[] = 'themes/SuiteP/images/sub_panel/Email_Marketing2.png';

	// 7.10 -> 7.10.10
	$files[] = 'lib/API/public/index.php';

	// 7.10.x -> 7.11-beta
	$files[] = 'codecov.yml';
	$files[] = 'phpcs.xml';

	// 7.11-rc2
	$files[] = 'modules/Users/Save.php';

        // SuiteCRM 7.11-rc-2
         $files[] = 'include/phpmailer/LICENSE';
         $files[] = 'include/phpmailer/VERSION';
         $files[] = 'include/phpmailer/extras/htmlfilter.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-it.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-cz.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-no.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-fr.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-se.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-br.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-zh.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-ru.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-ja.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-fi.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-dk.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-tr.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-ro.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-ar.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-es.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-ch.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-nl.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-de.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-pl.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-et.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-ca.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-hu.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-zh_cn.php';
         $files[] = 'include/phpmailer/language/phpmailer.lang-fo.php';
         $files[] = 'include/phpmailer/class.smtp.php';
         $files[] = 'include/phpmailer/class.phpmailer.php';
         $files[] = 'include/reCaptcha/LICENSE';
         $files[] = 'include/reCaptcha/README';
         $files[] = 'include/reCaptcha/recaptchalib.php';

	// SuiteCRM 7.11.1
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/ClientIntegrationTests.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/ClientTest.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/RegisteredNamespaceTest.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/YamlRunnerTest.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/ConnectionPool/Selectors/RoundRobinSelectorTest.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/ConnectionPool/Selectors/StickyRoundRobinSelectorTest.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/ConnectionPool/SniffingConnectionPoolIntegrationTest.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/ConnectionPool/SniffingConnectionPoolTest.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/ConnectionPool/StaticConnectionPoolIntegrationTest.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/ConnectionPool/StaticConnectionPoolTest.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/Endpoints/AbstractEndpointTest.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/Endpoints/StatusEndpointTest.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/Helper/Iterators/SearchResponseIteratorTest.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/Serializers/ArrayToJSONSerializerTest.php';
	$files[] = 'vendor/elasticsearch/elasticsearch/tests/Elasticsearch/Tests/Serializers/EverythingToJSONSerializerTest.php';

	// SuiteCRM 7.11.4
	$files[] = 'tests/acceptance/modules/AOS_Prouduct_Categories/AOS_Prouduct_CategoriesCest.php';

	// SuiteCRM 7.11.6
	$files[] = 'tests/SuiteCRM/Test/BrowserStack/Local.php';
	$files[] = 'tests/SuiteCRM/Test/BrowserStack/LocalBinary.php';
	$files[] = 'tests/_envs/browser-stack-chrome-fhd.yml';
	$files[] = 'tests/_envs/browser-stack-edge-fhd.yml';
	$files[] = 'tests/_envs/browser-stack-firefox-fhd.yml';
	$files[] = 'tests/_envs/browser-stack-hub.yml';
	$files[] = 'tests/_envs/browser-stack-ie-fhd.yml';
	$files[] = 'tests/_envs/browser-stack-ipad-2.yml';
	$files[] = 'tests/_envs/browser-stack-iphone-6.yml';
	$files[] = 'tests/_envs/browser-stack-local.yml';
	$files[] = 'tests/_envs/browser-stack-safari-fhd.yml';
	$files[] = 'tests/_support/DemoTester.php';
	$files[] = 'tests/_support/FunctionalTester.php';
	$files[] = 'tests/_support/Helper/Demo.php';
	$files[] = 'tests/_support/Helper/Functional.php';
	$files[] = 'tests/_support/Helper/Unit.php';
	$files[] = 'tests/_support/UnitTester.php';
	$files[] = 'tests/demo.suite.yml';
	$files[] = 'tests/demo/DemoCest.php';
	$files[] = 'tests/demo/_bootstrap.php';
	$files[] = 'tests/functional.suite.yml';
	$files[] = 'tests/functional/_bootstrap.php';
	$files[] = 'tests/unit.suite.yml';


	// SuiteCRM 7.11.7
	$files[] = '.github/FUNDING.yml';
	$files[] = 'include/SugarCharts/Jit/FlashCanvas/canvas2png.js';
	$files[] = 'include/SugarCharts/Jit/FlashCanvas/flashcanvas.js';
	$files[] = 'include/SugarCharts/Jit/FlashCanvas/flashcanvas.swf';
	$files[] = 'include/SugarCharts/Jit/FlashCanvas/proxy.php';
	$files[] = 'include/SugarCharts/Jit/FlashCanvas/save.php';
	$files[] = 'include/SugarCharts/Jit/JitReports.php';
	$files[] = 'include/SugarCharts/Jit/css/base.css';
	$files[] = 'include/SugarCharts/Jit/js/Jit/jit.js';
	$files[] = 'include/SugarCharts/Jit/js/mySugarCharts.js';
	$files[] = 'include/SugarCharts/Jit/js/sugarCharts.js';
	$files[] = 'include/SugarCharts/Jit/tpls/DashletGenericChartScript.tpl';
	$files[] = 'include/SugarCharts/Jit/tpls/chart.tpl';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/CHANGELOG';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/LICENSE';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/README.md';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/_toolkit_loader.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/advanced_settings_example.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/certs/README';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/compatibility.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/endpoints/acs.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/endpoints/metadata.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/endpoints/sls.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/extlib/xmlseclibs/CHANGELOG.txt';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/extlib/xmlseclibs/LICENSE';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/extlib/xmlseclibs/xmlseclibs.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml/AuthRequest.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml/Metadata.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml/Response.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml/Settings.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml/XmlSec.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/Auth.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/AuthnRequest.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/Constants.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/Error.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/IdPMetadataParser.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/LogoutRequest.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/LogoutResponse.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/Metadata.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/Response.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/Settings.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/Utils.php';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/schemas/saml-schema-assertion-2.0.xsd';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/schemas/saml-schema-authn-context-2.0.xsd';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/schemas/saml-schema-authn-context-types-2.0.xsd';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/schemas/saml-schema-metadata-2.0.xsd';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/schemas/saml-schema-protocol-2.0.xsd';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/schemas/sstc-metadata-attr.xsd';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/schemas/sstc-saml-attribute-ext.xsd';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/schemas/sstc-saml-metadata-algsupport-v1.0.xsd';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/schemas/sstc-saml-metadata-ui-v1.0.xsd';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/schemas/xenc-schema.xsd';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/schemas/xml.xsd';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/schemas/xmldsig-core-schema.xsd';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/lib/Saml2/version.json';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/locale/en_US/LC_MESSAGES/phptoolkit.mo';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/locale/en_US/LC_MESSAGES/phptoolkit.po';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/locale/es_ES/LC_MESSAGES/phptoolkit.mo';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/locale/es_ES/LC_MESSAGES/phptoolkit.po';
	$files[] = 'modules/Users/authentication/SAML2Authenticate/lib/onelogin/php-saml/settings_example.php';
	$files[] = 'tests/_envs/chrome-driver.yml';
	$files[] = 'tests/_envs/selenium-chrome.yml';
	$files[] = 'tests/_envs/selenium-fhd.yml';
	$files[] = 'tests/_envs/selenium-firefox.yml';
	$files[] = 'tests/_envs/selenium-hd.yml';
	$files[] = 'tests/_envs/selenium-hub.yml';
	$files[] = 'tests/_envs/selenium-ipad-2.yml';
	$files[] = 'tests/_envs/selenium-iphone-6.yml';
	$files[] = 'tests/_envs/selenium-xga.yml';
	$files[] = 'tests/_support/Step/Acceptance/Calendar.php';
	$files[] = 'tests/_support/Step/Acceptance/Documents.php';
	$files[] = 'tests/_support/Step/Acceptance/EmailTemplates.php';
	$files[] = 'tests/_support/Step/Acceptance/EmailsTester.php';
	$files[] = 'tests/_support/Step/Acceptance/MapsAreas.php';
	$files[] = 'tests/_support/Step/Acceptance/Notes.php';
	$files[] = 'tests/_support/Step/Acceptance/Quotes.php';
	$files[] = 'tests/_support/Step/Acceptance/Spots.php';
	$files[] = 'tests/_support/Step/Acceptance/Surveys.php';
	$files[] = 'tests/_support/Step/Acceptance/TargetList.php';
	$files[] = 'tests/_support/Step/Acceptance/Targets.php';
	$files[] = 'tests/_support/Step/Acceptance/Tasks.php';
	$files[] = 'tests/acceptance/modules/Home/HomeCest.php';


return $files;
}
}
