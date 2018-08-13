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

use cmsgears\core\common\base\Migration;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

/**
 * The breeze cms migration inserts the templates available in Breeze for CMS Module of CMSGears.
 *
 * @since 1.0.0
 */
class m180502_100000_breeze_cms extends Migration {

	// Public variables

	// Private Variables

	private $cmgPrefix;

	private $site;

	private $master;

	public function init() {

		// Table prefix
		$this->cmgPrefix	= Yii::$app->migration->cmgPrefix;

		$this->site		= Site::findBySlug( CoreGlobal::SITE_MAIN );
		$this->master	= User::findByUsername( Yii::$app->migration->getSiteMaster() );

		Yii::$app->core->setSite( $this->site );
	}

    public function up() {

		$this->insertPageTemplates();

		$this->insertFormTemplates();

		$this->insertElementTemplates();
		$this->insertBlockTemplates();

		$this->insertWidgetTemplates();
		$this->insertSidebarTemplates();

		$this->insertMenuTemplates();
    }

	/**
	 * Page Templates
	 */
	private function insertPageTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Page - Default, Landing
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, null, CmsGlobal::TYPE_PAGE, true, 'Page layout for pages.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\PageSettings', '@breeze/templates/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/page/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-default" }', null, null ],
			[ $master->id, $master->id, 'Landing', 'landing', null, CmsGlobal::TYPE_PAGE, true, 'Page layout for home page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\PageSettings', '@breeze/templates/page/default/forms', 'default', true, 'page/landing', false, '@breeze/templates/page/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-default" }', null, null ],
			[ $master->id, $master->id, 'QnA', 'qna', 'Questions and Answers', CmsGlobal::TYPE_PAGE, true, 'Page layout for pages having Questions and Answers accordian using page attributes.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\PageSettings', '@breeze/templates/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/page/qna', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-default" }', null, null ],
			// Article - Default
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, null, CmsGlobal::TYPE_ARTICLE, true, 'Article layout for articles.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\PageSettings', '@breeze/templates/page/default/forms', 'default', true, 'article/default', false, '@breeze/templates/article/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-default" }', null, null ],
			// Post - Default
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, null, CmsGlobal::TYPE_POST, true, 'Post layout for blog posts.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\PageSettings', '@breeze/templates/page/default/forms', 'default', true, 'post/default', true, '@breeze/templates/post/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	/**
	 * Form Templates
	 */
	private function insertFormTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Form - Default
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, null, CoreGlobal::TYPE_FORM, true, 'It can be used to display public forms.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\FormSettings', '@breeze/templates/form/default/forms', 'default', true, 'form/default', false, '@breeze/templates/form/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	/**
	 * Element Templates
	 */
	private function insertElementTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Element - Card
			[ $master->id, $master->id, 'Card', 'card', null, CmsGlobal::TYPE_ELEMENT, true, 'Default layout for card elements.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/card/default/forms', 'default', true, null, false, '@breeze/templates/element/card/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-default" }', null, null ],
			// Element - Box
			[ $master->id, $master->id, 'Box', 'box', null, CmsGlobal::TYPE_ELEMENT, true, 'Default layout for box elements.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/box/default/forms', 'default', true, null, false, '@breeze/templates/element/box/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "box box-basic box-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	/**
	 * Block Templates
	 */
	private function insertBlockTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Block - Default
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, null, CmsGlobal::TYPE_BLOCK, true, 'Default layout for blocks.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block block-basic block-default" }', null, null ],
			// Max Block - Default, Testimonial, FoxSlider
			[ $master->id, $master->id, 'Max', 'max', null, CmsGlobal::TYPE_BLOCK, true, 'Default layout for max blocks.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block block-max" }', null, null ],
			[ $master->id, $master->id, 'Testimonial', 'testimonial', null, CmsGlobal::TYPE_BLOCK, true, 'Testimonial layout for blocks showing testimonials.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/testimonial', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block block-max block-testimonial" }', null, null ],
			[ $master->id, $master->id, 'FoxSlider', 'foxslider', null, CmsGlobal::TYPE_BLOCK, true, 'FoxSlider layout for blocks showing slider.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/foxslider', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block block-max block-foxslider" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertWidgetTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Text Widget - Default, Social, Address and Search
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, null, CmsGlobal::TYPE_WIDGET, true, 'Default layout for widgets.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default" }', null, null ],
			[ $master->id, $master->id, 'Social', CmsGlobal::TEMPLATE_SOCIAL, null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display social links.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/social', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-social" }', null, null ],
			[ $master->id, $master->id, 'Address', CmsGlobal::TEMPLATE_ADDRESS, null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display address details.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/address', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-address" }', null, null ],
			[ $master->id, $master->id, 'Search', CmsGlobal::TEMPLATE_SEARCH, null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display page, article and post search form.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/search', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-search" }', null, null ],
			// Archive Widget - Default
			[ $master->id, $master->id, 'Archive', CmsGlobal::TEMPLATE_ARCHIVE, null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display post and article archive list.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/archive', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-archive" }', null, null ],
			// Page Widget - Default
			[ $master->id, $master->id, 'Page', CmsGlobal::TEMPLATE_PAGE, null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display popular, recent and related pages.', 'cmsgears\widgets\blog\PageWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\PageConfig', '@breeze/templates/widget/page/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/page', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-page" }', null, null ],
			// Article Widget - Default
			[ $master->id, $master->id, 'Article', CmsGlobal::TEMPLATE_ARTICLE, null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display popular, recent, related and author articles.', 'cmsgears\widgets\blog\ArticleWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\ArticleConfig', '@breeze/templates/widget/article/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/article', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-article" }', null, null ],
			// Post Widget - Default
			[ $master->id, $master->id, 'Post', CmsGlobal::TEMPLATE_POST, null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display popular, recent, similar, related and author posts.', 'cmsgears\widgets\blog\PostWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\PostConfig', '@breeze/templates/widget/post/forms', 'cmsgears\templates\breeze\models\forms\widget\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/post', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-post" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertSidebarTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Sidebar - Default, Vertical, Horizontal
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, null, CmsGlobal::TYPE_SIDEBAR, true, 'Default layout for sidebars.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\SidebarSettings', '@breeze/templates/sidebar/default/forms', 'default', true, null, false, '@breeze/templates/sidebar/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "sidebar sidebar-basic sidebar-default" }', null, null ],
			[ $master->id, $master->id, 'Vertical Sidebar', CmsGlobal::TEMPLATE_SIDEBAR_VERTICAL, null, CmsGlobal::TYPE_SIDEBAR, true, 'Sidebar displayed vertically on a page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\SidebarSettings', '@breeze/templates/sidebar/default/forms', 'default', true, null, false, '@breeze/templates/sidebar/vertical', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "sidebar sidebar-basic sidebar-vertical" }', null, null ],
			[ $master->id, $master->id, 'Horizontal Sidebar', CmsGlobal::TEMPLATE_SIDEBAR_HORIZONTAL, null, CmsGlobal::TYPE_SIDEBAR, true, 'Sidebar displayed horizontally on a page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\SidebarSettings', '@breeze/templates/sidebar/default/forms', 'default', true, null, false, '@breeze/templates/sidebar/horizontal', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "sidebar sidebar-basic sidebar-horizontal" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertMenuTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Menu - Default, Vertical, Horizontal
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, null, CmsGlobal::TYPE_MENU, true, 'Default layout for menus.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\MenuSettings', '@breeze/templates/menu/default/forms', 'default', true, null, false, '@breeze/templates/menu/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "sidebar sidebar-basic sidebar-default" }', null, null ],
			[ $master->id, $master->id, 'Vertical Menu', CmsGlobal::TEMPLATE_MENU_VERTICAL, null, CmsGlobal::TYPE_MENU, true, 'Vertical menu.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\MenuSettings', '@breeze/templates/menu/default/forms', 'default', true, null, false, '@breeze/templates/menu/vertical', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "sidebar sidebar-basic sidebar-vertical" }', null, null ],
			[ $master->id, $master->id, 'Horizontal Menu', CmsGlobal::TEMPLATE_MENU_HORIZONTAL, null, CmsGlobal::TYPE_MENU, true, 'Horizontal Menu.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\MenuSettings', '@breeze/templates/menu/default/forms', 'default', true, null, false, '@breeze/templates/menu/horizontal', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "sidebar sidebar-basic sidebar-horizontal" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

    public function down() {

        echo "m180502_100000_breeze_cms will be deleted with m160621_014408_core.\n";

        return true;
    }

}
