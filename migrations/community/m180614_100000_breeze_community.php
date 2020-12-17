<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;
use cmsgears\cms\common\config\CmsGlobal;
use cmsgears\community\common\config\CmnGlobal;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

/**
 * The breeze shop migration inserts the templates available in Breeze for Shop Module of CMSGears.
 *
 * @since 1.0.0
 */
class m180614_100000_breeze_community extends \cmsgears\core\common\base\Migration {

	// Public variables

	// Private Variables

	private $cmgPrefix;

	private $site;

	private $master;

	public function init() {

		// Table prefix
		$this->cmgPrefix = Yii::$app->migration->cmgPrefix;

		$this->site		= Site::findBySlug( CoreGlobal::SITE_MAIN );
		$this->master	= User::findByUsername( Yii::$app->migration->getSiteMaster() );

		Yii::$app->core->setSite( $this->site );
	}

    public function up() {

		$this->insertPageTemplates();

		$this->insertGroupTemplates();

		$this->insertWidgetTemplates();
    }

	private function insertPageTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Group Pages
			[ $master->id, $master->id, 'Groups', CmnGlobal::TEMPLATE_GROUP, CmsGlobal::TYPE_PAGE, null, null, true, false, 'Page layout to show groups on groups page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\PageSettings', '@breeze/templates/cms/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/cms/page/search', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertGroupTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Default Templates - Group
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CmnGlobal::TYPE_GROUP, null, true, true, 'Default layout for groups.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\community\settings\GroupSettings', '@breeze/templates/community/group/default/forms', 'default', true, 'community/group/default', true, '@breeze/templates/community/group/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ],
			[ $master->id, $master->id, 'Category', CoreGlobal::TEMPLATE_CATEGORY, CmnGlobal::TYPE_GROUP, null, true, true, 'Default layout for group categories.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\community\settings\GroupSettings', '@breeze/templates/community/group/default/forms', 'default', true, 'community/group/default', true, '@breeze/templates/community/group/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ],
			[ $master->id, $master->id, 'Tag', CoreGlobal::TEMPLATE_TAG, CmnGlobal::TYPE_GROUP, null, true, true, 'Default layout for group tags.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\community\settings\GroupSettings', '@breeze/templates/community/group/default/forms', 'default', true, 'community/group/default', true, '@breeze/templates/community/group/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ],
			// Default Templates - User Post
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CmnGlobal::TYPE_USER_POST, null, true, true, 'Default layout for user posts.', null, null, null, null, null, null, null, null, null, 'default', true, 'community/post/default', true, '@breeze/templates/community/post/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block block-basic block-user-post" }', null, null ],
			// Default Templates - Group Post
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CmnGlobal::TYPE_GROUP_POST, null, true, true, 'Default layout for group posts.', null, null, null, null, null, null, null, null, null, 'default', true, 'community/post/default', true, '@breeze/templates/community/post/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block block-basic block-group-post" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertWidgetTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Group Widget - Default
			[ $master->id, $master->id, 'Group Card', 'group-card', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display popular, recent, and featured Groups.', 'cmsgears\widgets\club\cms\GroupWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\community\GroupConfig', '@breeze/templates/widget/community/group/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/community/group', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-card widget-card-model widget-card-group" }', null, null ],
			[ $master->id, $master->id, 'Group Box', 'group-box', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display related and similar Groups.', 'cmsgears\widgets\club\cms\GroupWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\community\GroupConfig', '@breeze/templates/widget/community/group/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/community/group', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-model widget-box-group" }', null, null ],
			[ $master->id, $master->id, 'Group Club', 'group-club', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display popular, recent, featured, related and similar Groups clubbed from multiple sites.', 'cmsgears\widgets\club\cms\GroupWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\community\GroupConfig', '@breeze/templates/widget/community/group/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/community/group', 'club', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-club widget-box-club-group" }', null, null ],
			[ $master->id, $master->id, 'Group Search', 'group-search', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to search Groups.', 'cmsgears\widgets\club\cms\GroupWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\community\GroupConfig', '@breeze/templates/widget/community/group/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/community/group', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-search-model widget-box-search-group" }', null, null ],
			[ $master->id, $master->id, 'Group Home', 'group-home', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to show Groups specifically on landing page.', 'cmsgears\widgets\club\cms\GroupWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\community\GroupConfig', '@breeze/templates/widget/community/group/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/community/group', 'home', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-home widget-box-home-group" }', null, null ],
			[ $master->id, $master->id, 'Group Page', 'group-page', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to show Groups specifically on single Group page.', 'cmsgears\widgets\club\cms\GroupWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\community\GroupConfig', '@breeze/templates/widget/community/group/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/community/group', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-page widget-box-page-group" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

    public function down() {

        echo "m180614_100000_breeze_community will be deleted with m160621_014408_core.\n";

        return true;
    }

}
