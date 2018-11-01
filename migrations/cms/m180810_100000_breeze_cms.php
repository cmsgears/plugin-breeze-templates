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
class m180810_100000_breeze_cms extends Migration {

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

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Page - Default, Landing
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_PAGE, null, null, true, 'Page layout for pages.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\PageSettings', '@breeze/templates/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/page/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic" }', null, null ],
			[ $master->id, $master->id, 'Landing', 'landing', CmsGlobal::TYPE_PAGE, null, null, true, 'Page layout for home page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\PageSettings', '@breeze/templates/page/default/forms', 'default', true, 'page/landing', false, '@breeze/templates/page/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ],
			[ $master->id, $master->id, 'System', 'system', CmsGlobal::TYPE_PAGE, null, null, true, 'Page layout for system pages.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\PageSettings', '@breeze/templates/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/page/system', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ],
			[ $master->id, $master->id, 'Search', 'search', CmsGlobal::TYPE_PAGE, null, null, true, 'Page layout for search pages.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\PageSettings', '@breeze/templates/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/page/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ],
			[ $master->id, $master->id, 'QnA', 'qna', CmsGlobal::TYPE_PAGE, null, 'Questions and Answers', true, 'Page layout for pages having Questions and Answers accordian using page attributes.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\PageSettings', '@breeze/templates/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/page/qna', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ],
			// Article - Default
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_ARTICLE, null, null, true, 'Article layout for articles.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\PageSettings', '@breeze/templates/page/default/forms', 'default', true, 'article/default', false, '@breeze/templates/article/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic" }', null, null ],
			// Post - Default
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_POST, null, null, true, 'Post layout for blog posts.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\PageSettings', '@breeze/templates/page/default/forms', 'default', true, 'post/default', true, '@breeze/templates/post/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	/**
	 * Form Templates
	 */
	private function insertFormTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Form - Default
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CoreGlobal::TYPE_FORM, null, null, true, 'It can be used to display public forms.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\FormSettings', '@breeze/templates/form/default/forms', 'default', true, 'form/default', false, '@breeze/templates/form/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic" }', null, null ],
			[ $master->id, $master->id, 'Contact', 'contact', CoreGlobal::TYPE_FORM, null, null, true, 'It can be used to display contact forms.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\FormSettings', '@breeze/templates/form/default/forms', 'default', true, 'form/default', false, '@breeze/templates/form/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	/**
	 * Element Templates
	 */
	private function insertElementTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Element - Card
			[ $master->id, $master->id, 'Card', 'card', CmsGlobal::TYPE_ELEMENT, null, null, true, 'Default layout for card elements.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/card/default/forms', 'default', true, null, false, '@breeze/templates/element/card/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-default" }', null, null ],
			[ $master->id, $master->id, 'Gallery', 'gallery', CmsGlobal::TYPE_ELEMENT, null, null, true, "Default layout for card elements showing it's gallery.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/card/default/forms', 'default', true, null, false, '@breeze/templates/element/card/gallery', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-default" }', null, null ],
			[ $master->id, $master->id, 'Slider', 'slider', CmsGlobal::TYPE_ELEMENT, null, null, true, "Default layout for card elements showing slider of it's gallery.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/card/default/forms', 'default', true, null, false, '@breeze/templates/element/card/slider', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-default" }', null, null ],
			[ $master->id, $master->id, 'Attributes Slider', 'attributes-slider', CmsGlobal::TYPE_ELEMENT, null, null, true, "Default layout for card elements showing slider of it's attributes.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/card/default/forms', 'default', true, null, false, '@breeze/templates/element/card/slider', 'attributes', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-default" }', null, null ],
			[ $master->id, $master->id, 'Attributes Accordian', 'attributes-accordian', CmsGlobal::TYPE_ELEMENT, null, null, true, "Default layout for card elements showing accordian of it's attributes.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/card/default/forms', 'default', true, null, false, '@breeze/templates/element/card/accordian', 'attributes', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-default" }', null, null ],
			[ $master->id, $master->id, 'Form', 'form', CmsGlobal::TYPE_ELEMENT, null, null, true, 'Default layout for card elements having Ajax form.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/card/default/forms', 'default', true, null, false, '@breeze/templates/element/card/form', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-default" }', null, null ],
			// Element - Box
			[ $master->id, $master->id, 'Box', 'box', CmsGlobal::TYPE_ELEMENT, null, null, true, 'Default layout for box elements.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/box/default/forms', 'default', true, null, false, '@breeze/templates/element/box/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "box box-basic box-default" }', null, null ],
			[ $master->id, $master->id, 'Gallery', 'gallery', CmsGlobal::TYPE_ELEMENT, null, null, true, "Default layout for box elements showing it's gallery.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/box/default/forms', 'default', true, null, false, '@breeze/templates/element/box/gallery', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "box box-basic box-default" }', null, null ],
			[ $master->id, $master->id, 'Slider', 'slider', CmsGlobal::TYPE_ELEMENT, null, null, true, "Default layout for box elements showing slider of it's gallery.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/box/default/forms', 'default', true, null, false, '@breeze/templates/element/box/slider', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "box box-basic box-default" }', null, null ],
			[ $master->id, $master->id, 'Attributes Slider', 'attributes-slider', CmsGlobal::TYPE_ELEMENT, null, null, true, "Default layout for box elements showing slider of it's attributes.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/box/default/forms', 'default', true, null, false, '@breeze/templates/element/box/slider', 'attributes', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-default" }', null, null ],
			[ $master->id, $master->id, 'Attributes Accordian', 'attributes-accordian', CmsGlobal::TYPE_ELEMENT, null, null, true, "Default layout for box elements showing accordian of it's attributes.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/box/default/forms', 'default', true, null, false, '@breeze/templates/element/box/accordian', 'attributes', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-default" }', null, null ],
			[ $master->id, $master->id, 'Form', 'form', CmsGlobal::TYPE_ELEMENT, null, null, true, 'Default layout for box elements having Ajax form.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\ElementSettings', '@breeze/templates/element/box/default/forms', 'default', true, null, false, '@breeze/templates/element/box/form', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "box box-basic box-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	/**
	 * Block Templates
	 */
	private function insertBlockTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Block - Default
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_BLOCK, null, null, true, 'Default layout for blocks.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ $master->id, $master->id, 'Gallery', 'gallery', CmsGlobal::TYPE_BLOCK, null, null, true, "Default layout for blocks showing it's gallery.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/gallery', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ $master->id, $master->id, 'Slider', 'slider', CmsGlobal::TYPE_BLOCK, null, null, true, "Default layout for blocks showing slider of it's gallery.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/slider', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ $master->id, $master->id, 'Attributes Slider', 'attributes-slider', CmsGlobal::TYPE_BLOCK, null, null, true, "Default layout for blocks showing slider of it's attributes.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/slider', 'attributes', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ $master->id, $master->id, 'Elements Slider', 'elements-slider', CmsGlobal::TYPE_BLOCK, null, null, true, "Default layout for blocks showing slider of it's elements.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/slider', 'elements', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ $master->id, $master->id, 'Attributes Accordian', 'attributes-accordian', CmsGlobal::TYPE_BLOCK, null, null, true, "Default layout for blocks showing accordian of it's attributes.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/accordian', 'attributes', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ $master->id, $master->id, 'Elements Accordian', 'elements-accordian', CmsGlobal::TYPE_BLOCK, null, null, true, "Default layout for blocks showing accordian of it's elements.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/accordian', 'elements', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ $master->id, $master->id, 'Form', 'form', CmsGlobal::TYPE_BLOCK, null, null, true, 'Default layout for blocks having Ajax form.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/form', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			// Max Block - Default, Testimonial, FoxSlider
			[ $master->id, $master->id, 'Max', 'max', CmsGlobal::TYPE_BLOCK, null, null, true, 'Default layout for max blocks.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max" }', null, null ],
			[ $master->id, $master->id, 'Testimonial', 'testimonial', CmsGlobal::TYPE_BLOCK, null, null, true, 'Testimonial layout for blocks showing testimonials.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/testimonial', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max block-testimonial" }', null, null ],
			[ $master->id, $master->id, 'FoxSlider', 'foxslider', CmsGlobal::TYPE_BLOCK, null, null, true, 'FoxSlider layout for blocks showing slider.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/foxslider', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max block-max-area block-foxslider" }', null, null ],
			[ $master->id, $master->id, 'Form', 'form', CmsGlobal::TYPE_BLOCK, null, null, true, 'Form layout for blocks showing ajax forms.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/form', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertWidgetTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Text Widget - Default, Social, Address
			// Notes: Social and Address use widget attributes to manage the details
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_WIDGET, null, null, true, 'Default layout for widgets.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-default" }', null, null ],
			[ $master->id, $master->id, 'Social', CmsGlobal::TEMPLATE_SOCIAL, CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display social links using social attributes.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/social', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-social" }', null, null ],
			[ $master->id, $master->id, 'Contact', CmsGlobal::TEMPLATE_CONTACT, CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display address details.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/address', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-contact" }', null, null ],
			// Basic Widgets
			[ $master->id, $master->id, 'Gallery', 'gallery', CmsGlobal::TYPE_WIDGET, null, null, true, "Default layout for widgets showing it's gallery.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/gallery', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-default" }', null, null ],
			[ $master->id, $master->id, 'Slider', 'slider', CmsGlobal::TYPE_WIDGET, null, null, true, "Default layout for widgets showing slider of it's gallery.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/slider', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-default" }', null, null ],
			[ $master->id, $master->id, 'Attributes Slider', 'attributes-slider', CmsGlobal::TYPE_WIDGET, null, null, true, "Default layout for widgets showing slider of it's attributes.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/slider', 'attributes', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-default" }', null, null ],
			[ $master->id, $master->id, 'Attributes Accordian', 'attributes-accordian', CmsGlobal::TYPE_WIDGET, null, null, true, "Default layout for widgets showing accordian of it's attributes.", null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/accordian', 'attributes', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-default" }', null, null ],
			[ $master->id, $master->id, 'Form', 'form', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to submit ajax form.', 'cmsgears\widgets\aform\AjaxFormWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\AjaxFormConfig', '@breeze/templates/widget/form/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/form', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-form" }', null, null ],
			// Search Widget - Default
			[ $master->id, $master->id, 'Search', CmsGlobal::TEMPLATE_SEARCH, CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display page, article and post search form.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/search', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-search" }', null, null ],
			// Author Widget - Default
			[ $master->id, $master->id, 'Author', CmsGlobal::TEMPLATE_AUTHOR, CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display author info.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/author', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-author" }', null, null ],
			// Tags Widget - Default
			[ $master->id, $master->id, 'Tags', CmsGlobal::TEMPLATE_TAGS, CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display model categories and tags.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/tags', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-tags" }', null, null ],
			// Archive Widget - Default
			[ $master->id, $master->id, 'Archive', CmsGlobal::TEMPLATE_ARCHIVE, CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display post and article archive list.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/archive', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-archive" }', null, null ],
			// Page Widget - Default, Banner & Search
			[ $master->id, $master->id, 'Page Card', 'page-card', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent and related pages.', 'cmsgears\widgets\blog\PageWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\PageConfig', '@breeze/templates/widget/page/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/page', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-card widget-card-page" }', null, null ],
			[ $master->id, $master->id, 'Page Box', 'page-box', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent and related pages.', 'cmsgears\widgets\blog\PageWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\PageConfig', '@breeze/templates/widget/page/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/page', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-page" }', null, null ],
			[ $master->id, $master->id, 'Page Search', 'page-search', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to search pages.', 'cmsgears\widgets\blog\PageWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\PageConfig', '@breeze/templates/widget/page/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/page', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box-search widget-box-search-page" }', null, null ],
			// Article Widget - Default
			[ $master->id, $master->id, 'Article Card', 'article-card', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author articles.', 'cmsgears\widgets\blog\ArticleWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\ArticleConfig', '@breeze/templates/widget/article/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/article', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-card widget-card-article" }', null, null ],
			[ $master->id, $master->id, 'Article Box', 'article-box', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author articles.', 'cmsgears\widgets\blog\ArticleWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\ArticleConfig', '@breeze/templates/widget/article/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/article', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-article" }', null, null ],
			[ $master->id, $master->id, 'Article Club', 'article-club', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author articles clubbed from multiple sites.', 'cmsgears\widgets\blog\ArticleWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\ArticleConfig', '@breeze/templates/widget/article/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/article', 'club', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-club-article" }', null, null ],
			[ $master->id, $master->id, 'Article Search', 'article-search', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to search articles.', 'cmsgears\widgets\blog\ArticleWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\ArticleConfig', '@breeze/templates/widget/article/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/article', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box-search widget-box-search-article" }', null, null ],
			// Post Widget - Default
			[ $master->id, $master->id, 'Post Card', 'post-card', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, similar, related and author posts.', 'cmsgears\widgets\blog\PostWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\PostConfig', '@breeze/templates/widget/post/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/post', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-card widget-card-post" }', null, null ],
			[ $master->id, $master->id, 'Post Box', 'post-box', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, similar, related and author posts.', 'cmsgears\widgets\blog\PostWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\PostConfig', '@breeze/templates/widget/post/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/post', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-post" }', null, null ],
			[ $master->id, $master->id, 'Post Club', 'post-club', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, similar, related and author posts clubbed from multiple sites.', 'cmsgears\widgets\blog\PostWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\PostConfig', '@breeze/templates/widget/post/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/post', 'club', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-post-club" }', null, null ],
			[ $master->id, $master->id, 'Post Search', 'post-search', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to search posts.', 'cmsgears\widgets\blog\PostWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\PostConfig', '@breeze/templates/widget/post/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/post', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box-search widget-box-search-post" }', null, null ],
			[ $master->id, $master->id, 'Post Home', 'post-home', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show posts specifically on landing page.', 'cmsgears\widgets\blog\PostWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\PostConfig', '@breeze/templates/widget/post/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/post', 'home', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box-home widget-box-home-post" }', null, null ],
			// Newsletter Widget - Default
			[ $master->id, $master->id, 'Newsletter', 'newsletter', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to subscribe mailing list.', 'cmsgears\widgets\newsletter\FollowMeWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\NewsletterConfig', '@breeze/templates/widget/form/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/newsletter', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-newsletter" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertSidebarTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Sidebar - Default, Vertical, Horizontal
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_SIDEBAR, null, null, true, 'Default layout for sidebars.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\SidebarSettings', '@breeze/templates/sidebar/default/forms', 'default', true, null, false, '@breeze/templates/sidebar/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "sidebar-basic sidebar-default" }', null, null ],
			[ $master->id, $master->id, 'Vertical Sidebar', CmsGlobal::TEMPLATE_SIDEBAR_VERTICAL, CmsGlobal::TYPE_SIDEBAR, null, null, true, 'Sidebar displayed vertically on a page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\SidebarSettings', '@breeze/templates/sidebar/default/forms', 'default', true, null, false, '@breeze/templates/sidebar/vertical', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "sidebar-basic sidebar-vertical" }', null, null ],
			[ $master->id, $master->id, 'Horizontal Sidebar', CmsGlobal::TEMPLATE_SIDEBAR_HORIZONTAL, CmsGlobal::TYPE_SIDEBAR, null, null, true, 'Sidebar displayed horizontally on a page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\SidebarSettings', '@breeze/templates/sidebar/default/forms', 'default', true, null, false, '@breeze/templates/sidebar/horizontal', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "sidebar-basic sidebar-horizontal" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertMenuTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Menu - Default, Vertical, Horizontal
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_MENU, null, null, true, 'Default layout for menus.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\MenuSettings', '@breeze/templates/menu/default/forms', 'default', true, null, false, '@breeze/templates/menu/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "nav nav-default" }', null, null ],
			[ $master->id, $master->id, 'Vertical Menu', CmsGlobal::TEMPLATE_MENU_VERTICAL, CmsGlobal::TYPE_MENU, null, null, true, 'Vertical menu.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\MenuSettings', '@breeze/templates/menu/default/forms', 'default', true, null, false, '@breeze/templates/menu/vertical', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "vnav nav-vertical" }', null, null ],
			[ $master->id, $master->id, 'Horizontal Menu', CmsGlobal::TEMPLATE_MENU_HORIZONTAL, CmsGlobal::TYPE_MENU, null, null, true, 'Horizontal Menu.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\MenuSettings', '@breeze/templates/menu/default/forms', 'default', true, null, false, '@breeze/templates/menu/horizontal', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "nav nav-horizontal" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

    public function down() {

        echo "m180810_100000_breeze_cms will be deleted with m160621_014408_core.\n";

        return true;
    }

}
