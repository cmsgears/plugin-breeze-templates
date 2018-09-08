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
use cmsgears\cms\common\models\entities\Widget;

use cmsgears\core\common\utilities\DateUtil;

/**
 * The breeze cms migration inserts the default objects.
 *
 * @since 1.0.0
 */
class m180810_100100_breeze_cms_data extends Migration {

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
		$this->insertWidgetMappings();

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
		$systemTemplate		= Template::findGlobalBySlugType( 'system', CmsGlobal::TYPE_PAGE );
		$searchTemplate		= Template::findGlobalBySlugType( 'search', CmsGlobal::TYPE_PAGE );
		$qnaTemplate		= Template::findGlobalBySlugType( 'qna', CmsGlobal::TYPE_PAGE );

		// Pages
		$homePage		= Page::findBySlugType( 'home', CmsGlobal::TYPE_PAGE );

		$aboutPage		= Page::findBySlugType( 'about-us', CmsGlobal::TYPE_PAGE );
		$termPage		= Page::findBySlugType( 'terms', CmsGlobal::TYPE_PAGE );
		$privacyPage	= Page::findBySlugType( 'privacy', CmsGlobal::TYPE_PAGE );

		$login			= Page::findBySlugType( 'login', CmsGlobal::TYPE_PAGE );
		$loginOtp		= Page::findBySlugType( 'login-otp', CmsGlobal::TYPE_PAGE );
		$register		= Page::findBySlugType( 'register', CmsGlobal::TYPE_PAGE );
		$caccount		= Page::findBySlugType( 'confirm-account', CmsGlobal::TYPE_PAGE );
		$caccountOtp	= Page::findBySlugType( 'confirm-account-otp', CmsGlobal::TYPE_PAGE );
		$aaccount		= Page::findBySlugType( 'activate-account', CmsGlobal::TYPE_PAGE );
		$fpassword		= Page::findBySlugType( 'forgot-password', CmsGlobal::TYPE_PAGE );
		$rpassword		= Page::findBySlugType( 'reset-password', CmsGlobal::TYPE_PAGE );
		$rpasswordOtp	= Page::findBySlugType( 'reset-password-otp', CmsGlobal::TYPE_PAGE );
		$feedback		= Page::findBySlugType( 'feedback', CmsGlobal::TYPE_PAGE );
		$testimonial	= Page::findBySlugType( 'testimonial', CmsGlobal::TYPE_PAGE );

		$searchPage		= Page::findBySlugType( 'search-pages', CmsGlobal::TYPE_PAGE );
		$searchPost		= Page::findBySlugType( 'search-posts', CmsGlobal::TYPE_PAGE );
		$searchArticle	= Page::findBySlugType( 'search-articles', CmsGlobal::TYPE_PAGE );

		$helpPage		= Page::findBySlugType( 'help', CmsGlobal::TYPE_PAGE );
		$faqPage		= Page::findBySlugType( 'faq', CmsGlobal::TYPE_PAGE );

		$defaultPages	= join( ',', [ $aboutPage->id, $termPage->id, $privacyPage->id ] );
		$systemPages	= join( ',', [ $login->id, $loginOtp->id, $register->id, $caccount->id, $caccountOtp->id, $aaccount->id, $fpassword->id, $rpassword->id, $rpasswordOtp->id, $feedback->id, $testimonial->id ] );
		$searchPages	= join( ',', [ $searchPage->id, $searchPost->id, $searchArticle->id ] );
		$qnaPages		= join( ',', [ $helpPage->id, $faqPage->id ] );

		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $landingTemplate->id ], "id=$homePage->id" );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $pageTemplate->id ], "id in ($defaultPages)" );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $systemTemplate->id ], "id in ($systemPages)" );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $searchTemplate->id ], "id in ($searchPages)" );
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
			[ $site->id, $contactTemplate->id, $master->id, $master->id, 'Contact Us', 'contact-us', CoreGlobal::TYPE_FORM, null, null, 'contact form', 'Thanks for contacting us.', true, $vis, $status, false, true, DateUtil::getDateTime(), DateUtil::getDateTime(), null, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","elements":"0","elementsWithContent":"0","elementsOrder":null,"elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsWithContent":"0","widgetsOrder":null,"widgetType":"","blocks":"0","blocksWithContent":"0","blocksOrder":null,"blockType":"","sidebars":"0","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":""}}' ]
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
		$status	= ObjectData::STATUS_ACTIVE;
		$vis	= ObjectData::VISIBILITY_PUBLIC;

		$pageTemplate		= Template::findGlobalBySlugType( CmsGlobal::TEMPLATE_PAGE, CmsGlobal::TYPE_WIDGET );
		$postTemplate		= Template::findGlobalBySlugType( CmsGlobal::TEMPLATE_POST, CmsGlobal::TYPE_WIDGET );
		$articleTemplate	= Template::findGlobalBySlugType( CmsGlobal::TEMPLATE_ARTICLE, CmsGlobal::TYPE_WIDGET );

		$columns = [ 'siteId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data' ];

		$models = [
			// Page Widgets
			[ $site->id, $pageTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Search Pages', 'search-pages', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Search pages from all sites.', 'It search pages published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $pageTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Recent Pages', 'recent-pages', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Recent pages from all sites.', 'It shows the recent pages published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $pageTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Popular Pages', 'popular-pages', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Popular pages from all sites.', 'It shows the popular pages published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $pageTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Search Site Pages', 'search-site-pages', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Search pages from active site.', 'It search pages published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $pageTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Recent Site Pages', 'recent-site-pages', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Recent pages from active site.', 'It shows the recent pages published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $pageTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Popular Site Pages', 'popular-site-pages', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Popular pages from active site.', 'It shows the popular pages published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			// Post Widgets
			[ $site->id, $postTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Search Posts', 'search-posts', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Search posts from all sites.', 'It search posts published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $postTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Recent Posts', 'recent-posts', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Recent posts from all sites.', 'It shows the recent posts published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $postTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Popular Posts', 'popular-posts', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Popular posts from all sites.', 'It shows the popular posts published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $postTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Author Posts', 'author-posts', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Author posts from all sites.', 'It shows the author posts published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $postTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Archive Posts', 'archive-posts', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Archive posts from all sites.', 'It shows the archive posts according to selected month and published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $postTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Search Site Posts', 'search-site-posts', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Search posts from active site.', 'It search posts published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $postTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Recent Site Posts', 'recent-site-posts', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Recent posts from active site.', 'It shows the recent posts published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $postTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Popular Site Posts', 'popular-site-posts', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Popular posts from active site.', 'It shows the popular posts published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $postTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Author Site Posts', 'author-site-posts', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Author posts from active sites.', 'It shows the author posts published on active sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $postTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Archive Site Posts', 'archive-site-posts', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Archive posts from active sites.', 'It shows the archive posts according to selected month and published on active sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $postTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Category Posts', 'category-posts', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Category posts from active sites.', 'It shows the category posts published on active sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $postTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Tag Posts', 'tag-posts', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Tag posts from active sites.', 'It shows the tag posts published on active sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			// Article Widgets
			[ $site->id, $articleTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Search Articles', 'search-articles', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Search articles from all sites.', 'It search articles published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $articleTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Recent Articles', 'recent-articles', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Recent articles from all sites.', 'It shows the recent articles published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $articleTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Popular Articles', 'popular-articles', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Popular articles from all sites.', 'It shows the popular articles published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $articleTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Author Articles', 'author-articles', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Author articles from all sites.', 'It shows the author articles published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $articleTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Archive Articles', 'archive-articles', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Archive articles from all sites.', 'It shows the archive articles according to selected month and published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $articleTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Search Site Articles', 'search-site-articles', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Search articles from active site.', 'It search articles published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $articleTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Recent Site Articles', 'recent-site-articles', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Recent articles from active site.', 'It shows the recent articles published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $articleTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Popular Site Articles', 'popular-site-articles', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Popular articles from active site.', 'It shows the popular articles published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $articleTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Author Site Articles', 'author-site-articles', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Author articles from active sites.', 'It shows the author articles published on active sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
			[ $site->id, $articleTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Archive Site Articles', 'archive-site-articles', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Archive articles from active sites.', 'It shows the archive articles according to selected month and published on active sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL ],
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $models );
	}

	private function insertWidgetMappings() {

		$searchPage		= Page::findBySlugType( 'search-pages', CmsGlobal::TYPE_PAGE );
		$searchPost		= Page::findBySlugType( 'search-posts', CmsGlobal::TYPE_PAGE );
		$searchArticle	= Page::findBySlugType( 'search-articles', CmsGlobal::TYPE_PAGE );

		$searchPageWidget	= Widget::findBySlugType( 'search-pages', CmsGlobal::TYPE_WIDGET );
		$searchPostWidget	= Widget::findBySlugType( 'search-posts', CmsGlobal::TYPE_WIDGET );
		$searchArtiWidget	= Widget::findBySlugType( 'search-articles', CmsGlobal::TYPE_WIDGET );

		$columns = [ 'modelId', 'parentId', 'parentType', 'type', 'order', 'active', 'pinned', 'featured', 'nodes' ];

		$mappings = [
			[ $searchPageWidget->id, $searchPage->id, 'page', CmsGlobal::TYPE_WIDGET, 0, 1, 0, 0, NULL ],
			[ $searchPostWidget->id, $searchPost->id, 'page', CmsGlobal::TYPE_WIDGET, 0, 1, 0, 0, NULL ],
			[ $searchArtiWidget->id, $searchArticle->id, 'page', CmsGlobal::TYPE_WIDGET, 0, 1, 0, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_model_object', $columns, $mappings );
	}

	/**
	 * Sidebars
	 */
	private function insertSidebars() {

		$site	= $this->site;
		$master	= $this->master;
		$status	= ObjectData::STATUS_ACTIVE;
		$vis	= ObjectData::VISIBILITY_PUBLIC;

		$hTemplate	= Template::findGlobalBySlugType( CmsGlobal::TEMPLATE_SIDEBAR_VERTICAL, CmsGlobal::TYPE_SIDEBAR );
		$vTemplate	= Template::findGlobalBySlugType( CmsGlobal::TEMPLATE_SIDEBAR_HORIZONTAL, CmsGlobal::TYPE_SIDEBAR );

		$columns = [ 'siteId', 'templateId', 'avatarId', 'bannerId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'status', 'visibility', 'classPath', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$models = [
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Main Top', 'main-top', CmsGlobal::TYPE_SIDEBAR, NULL, 'Main sidebar used at top of landing page.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Main Right', 'main-right', CmsGlobal::TYPE_SIDEBAR, NULL, 'Main sidebar used at right of landing page.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Main Bottom', 'main-bottom', CmsGlobal::TYPE_SIDEBAR, NULL, 'Main sidebar used at bottom of landing page.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Main Left', 'main-left', CmsGlobal::TYPE_SIDEBAR, NULL, 'Main sidebar used at left of landing page.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL, NULL, $master->id, $master->id, 'Main Footer', 'main-footer', CmsGlobal::TYPE_SIDEBAR, NULL, 'Main sidebar used on public footer.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Page Top', 'page-top', CmsGlobal::TYPE_SIDEBAR, NULL, 'Page sidebar used at top of page.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Page Right', 'page-right', CmsGlobal::TYPE_SIDEBAR, NULL, 'Page sidebar used at right of page.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Page Bottom', 'page-bottom', CmsGlobal::TYPE_SIDEBAR, NULL, 'Page sidebar used at bottom of page.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Page Left', 'page-left', CmsGlobal::TYPE_SIDEBAR, NULL, 'Page sidebar used at left of page.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Post Top', 'post-top', CmsGlobal::TYPE_SIDEBAR, NULL, 'Post sidebar used at top of post.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Post Right', 'post-right', CmsGlobal::TYPE_SIDEBAR, NULL, 'Post sidebar used at right of post.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Post Bottom', 'post-bottom', CmsGlobal::TYPE_SIDEBAR, NULL, 'Post sidebar used at bottom of post.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Post Left', 'post-left', CmsGlobal::TYPE_SIDEBAR, NULL, 'Post sidebar used at left of post.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Article Top', 'article-top', CmsGlobal::TYPE_SIDEBAR, NULL, 'Article sidebar used at top of article.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Article Right', 'article-right', CmsGlobal::TYPE_SIDEBAR, NULL, 'Article sidebar used at right of article.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Article Bottom', 'article-bottom', CmsGlobal::TYPE_SIDEBAR, NULL, 'Article sidebar used at bottom of article.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Article Left', 'article-left', CmsGlobal::TYPE_SIDEBAR, NULL, 'Article sidebar used at left of article.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Form Top', 'form-top', CmsGlobal::TYPE_SIDEBAR, NULL, 'Form sidebar used at top of form.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $hTemplate->id, NULL ,NULL, $master->id, $master->id, 'Form Right', 'form-right', CmsGlobal::TYPE_SIDEBAR, NULL, 'Form sidebar used at right of form.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Form Bottom', 'form-bottom', CmsGlobal::TYPE_SIDEBAR, NULL, 'Form sidebar used at bottom of form.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ],
			[ $site->id, $vTemplate->id, NULL, NULL, $master->id, $master->id, 'Form Left', 'form-left', CmsGlobal::TYPE_SIDEBAR, NULL, 'Form sidebar used at left of form.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","attributes":"0","attributeType":"","metaWrapClass":"","widgets":"1","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}' ]
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

        echo "m180810_100100_breeze_cms_data will be deleted with m160621_014408_core.\n";

        return true;
    }

}
