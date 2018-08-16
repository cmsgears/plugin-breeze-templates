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

use cmsgears\core\common\models\entities\ObjectData;
use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\entities\User;
use cmsgears\core\common\models\resources\Form;
use cmsgears\core\common\models\resources\FormField;
use cmsgears\cms\common\models\entities\Page;

use cmsgears\core\common\utilities\DateUtil;

/**
 * The breeze cms migration inserts the default objects.
 *
 * @since 1.0.0
 */
class m180502_100100_breeze_cms_objects extends Migration {

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

		$this->insertPages();
		$this->configurePageTemplates();

		$this->insertForms();
		$this->insertFormFields();

		$this->insertElements();
		$this->insertBlocks();

		$this->insertWidgets();
		$this->insertSidebars();

		$this->insertMenus();
    }

	/**
	 * Pages
	 */
	private function insertPages() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$models = [
			// Default - Pages
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_page', $columns, $models );
	}

	/**
	 * Page - Template Mappings
	 */
	private function configurePageTemplates() {

		// Templates
		$landingTemplate	= Template::findGlobalBySlugType( 'landing', CmsGlobal::TYPE_PAGE );
		$pageTemplate		= Template::findGlobalBySlugType( CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_PAGE );
		$qnaTemplate		= Template::findGlobalBySlugType( 'qna', CmsGlobal::TYPE_PAGE );

		// Pages
		$homePage		= Page::findBySlugType( 'home', CmsGlobal::TYPE_PAGE );

		$aboutPage		= Page::findBySlugType( 'about-us', CmsGlobal::TYPE_PAGE );
		$termPage		= Page::findBySlugType( 'terms', CmsGlobal::TYPE_PAGE );
		$privacyPage	= Page::findBySlugType( 'privacy', CmsGlobal::TYPE_PAGE );

		$helpPage		= Page::findBySlugType( 'help', CmsGlobal::TYPE_PAGE );
		$faqPage		= Page::findBySlugType( 'faq', CmsGlobal::TYPE_PAGE );

		$defaultPages	= join( ',', [ $aboutPage->id, $termPage->id, $privacyPage->id ] );
		$qnaPages		= join( ',', [ $helpPage->id, $faqPage->id ] );

		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $landingTemplate->id ], "id=$homePage->id" );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $pageTemplate->id ], "id in ($defaultPages)" );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $qnaTemplate->id ], "id in ($qnaPages)" );
	}

	/**
	 * Forms
	 */
	private function insertForms() {

		$site	= $this->site;
		$master	= $this->master;
		$vis	= Form::VISIBILITY_PUBLIC;
		$status	= Form::STATUS_ACTIVE;

		$formTemplate		= Template::findGlobalBySlugType( 'default', CoreGlobal::TYPE_FORM );
		$contactTemplate	= Template::findGlobalBySlugType( 'contact', CoreGlobal::TYPE_FORM );

		$columns = [ 'siteId', 'templateId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'description', 'success', 'captcha', 'visibility', 'status', 'userMail', 'adminMail', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$models = [
			[ $site->id, $contactTemplate->id, $master->id, $master->id, 'Contact Us', 'contact-us', CoreGlobal::TYPE_FORM, null, null, 'contact form', 'Thanks for contacting us.', true, $vis, $status, false, true, DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_form', $columns, $models );

		$summary = "Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content.";
		$content = "Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It\'s also called placeholder (or filler) text. It\'s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero.";

		$columns = [ 'templateId', 'parentId', 'parentType', 'seoName', 'seoDescription', 'seoKeywords', 'seoRobot', 'summary', 'content', 'publishedAt' ];

		$pages	= [
			[ $contactTemplate->id, Form::findBySlugType( 'contact-us', CoreGlobal::TYPE_FORM )->id, CoreGlobal::TYPE_FORM, null, null, null, null, $summary, $content, DateUtil::getDateTime() ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_model_content', $columns, $pages );
	}

	/**
	 * Form Fields
	 */
	private function insertFormFields() {

		$form = Form::findBySlugType( 'contact-us', CoreGlobal::TYPE_FORM );

		$columns = [ 'formId', 'name', 'label', 'type', 'compress', 'validators', 'order', 'icon', 'htmlOptions' ];

		$fields	= [
			[ $form->id, 'name', 'Name', FormField::TYPE_TEXT, false, 'required', 0, NULL, '{"field":{placeholder":"Name"}}' ],
			[ $form->id, 'email', 'Email', FormField::TYPE_TEXT, false, 'required', 0, NULL, '{"field":{"placeholder":"Email"}}' ],
			[ $form->id, 'subject', 'Subject', FormField::TYPE_TEXT, false, 'required', 0, NULL, '{"field":{"placeholder":"Subject"}}' ],
			[ $form->id, 'message', 'Message', FormField::TYPE_TEXTAREA, false, 'required', 0, NULL, '{"field":{"placeholder":"Message"}}' ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_form_field', $columns, $fields );
	}

	/**
	 * Elements
	 */
	private function insertElements() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$models = [
			// Default - Elements
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $models );
	}

	/**
	 * Blocks
	 */
	private function insertBlocks() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$models = [
			// Default - Blocks
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $models );
	}

	/**
	 * Widgets
	 */
	private function insertWidgets() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$models = [
			// Default - Widgets
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $models );
	}

	/**
	 * Sidebars
	 */
	private function insertSidebars() {

		$site	= $this->site;
		$master	= $this->master;
		$status	= ObjectData::STATUS_ACTIVE;

		$hTemplate	= Template::findGlobalBySlugType( CmsGlobal::TEMPLATE_SIDEBAR_VERTICAL, CmsGlobal::TYPE_SIDEBAR );
		$vTemplate	= Template::findGlobalBySlugType( CmsGlobal::TEMPLATE_SIDEBAR_HORIZONTAL, CmsGlobal::TYPE_SIDEBAR );

		$columns = [ 'siteId', 'templateId', 'avatarId', 'bannerId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'status', 'classPath', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$models = [
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Main Top', 'main-top', CmsGlobal::TYPE_SIDEBAR, NULL, 'Main sidebar used at top of landing page.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Main Right', 'main-right', CmsGlobal::TYPE_SIDEBAR, NULL, 'Main sidebar used at right of landing page.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Main Bottom', 'main-bottom', CmsGlobal::TYPE_SIDEBAR, NULL, 'Main sidebar used at bottom of landing page.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Main Left', 'main-left', CmsGlobal::TYPE_SIDEBAR, NULL, 'Main sidebar used at left of landing page.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL, NULL, $master->id, $master->id, 'Main Footer', 'main-footer', CmsGlobal::TYPE_SIDEBAR, NULL, 'Main sidebar used on public footer.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Page Top', 'page-top', CmsGlobal::TYPE_SIDEBAR, NULL, 'Page sidebar used at top of page.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Page Right', 'page-right', CmsGlobal::TYPE_SIDEBAR, NULL, 'Page sidebar used at right of page.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Page Bottom', 'page-bottom', CmsGlobal::TYPE_SIDEBAR, NULL, 'Page sidebar used at bottom of page.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Page Left', 'page-left', CmsGlobal::TYPE_SIDEBAR, NULL, 'Page sidebar used at left of page.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Post Top', 'post-top', CmsGlobal::TYPE_SIDEBAR, NULL, 'Post sidebar used at top of post.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Post Right', 'post-right', CmsGlobal::TYPE_SIDEBAR, NULL, 'Post sidebar used at right of post.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Post Bottom', 'post-bottom', CmsGlobal::TYPE_SIDEBAR, NULL, 'Post sidebar used at bottom of post.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Post Left', 'post-left', CmsGlobal::TYPE_SIDEBAR, NULL, 'Post sidebar used at left of post.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Article Top', 'article-top', CmsGlobal::TYPE_SIDEBAR, NULL, 'Article sidebar used at top of article.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Article Right', 'article-right', CmsGlobal::TYPE_SIDEBAR, NULL, 'Article sidebar used at right of article.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Article Bottom', 'article-bottom', CmsGlobal::TYPE_SIDEBAR, NULL, 'Article sidebar used at bottom of article.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Article Left', 'article-left', CmsGlobal::TYPE_SIDEBAR, NULL, 'Article sidebar used at left of article.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Form Top', 'form-top', CmsGlobal::TYPE_SIDEBAR, NULL, 'Form sidebar used at top of form.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Form Right', 'form-right', CmsGlobal::TYPE_SIDEBAR, NULL, 'Form sidebar used at right of form.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Form Bottom', 'form-bottom', CmsGlobal::TYPE_SIDEBAR, NULL, 'Form sidebar used at bottom of form.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Form Left', 'form-left', CmsGlobal::TYPE_SIDEBAR, NULL, 'Form sidebar used at left of form.', $status, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $models );
	}

	/**
	 * Menus
	 */
	private function insertMenus() {

		$site	= $this->site;
		$master	= $this->master;
		$status	= ObjectData::STATUS_ACTIVE;
		$vis	= ObjectData::VISIBILITY_PUBLIC;

		$columns = [ 'siteId', 'templateId', 'avatarId', 'bannerId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'status', 'visibility', 'classPath', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$models = [
			[ $site->id, NULL, NULL ,NULL, $master->id, $master->id, 'Main', 'main', CmsGlobal::TYPE_MENU, NULL, 'Main Menu used on landing header.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ],
			[ $site->id, NULL, NULL ,NULL, $master->id, $master->id, 'Secondary', 'secondary', CmsGlobal::TYPE_MENU, NULL, 'Secondary Menu used on public header.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ],
			[ $site->id, NULL, NULL, NULL, $master->id, $master->id, 'Links', 'links', CmsGlobal::TYPE_MENU, NULL, 'Links menu used on footer.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ],
			[ $site->id, NULL, NULL, NULL, $master->id, $master->id, 'Page', 'page', CmsGlobal::TYPE_MENU, NULL, 'Page menu used on footer, system pages.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $models );
	}

    public function down() {

        echo "m180502_100100_breeze_cms_objects will be deleted with m160621_014408_core.\n";

        return true;
    }

}
