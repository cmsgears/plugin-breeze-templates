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
use cmsgears\shop\common\config\ShopGlobal;

use cmsgears\core\common\models\entities\ObjectData;
use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\entities\User;
use cmsgears\cms\common\models\entities\Page;
use cmsgears\cms\common\models\entities\Widget;

use cmsgears\core\common\utilities\DateUtil;

/**
 * The breeze cms migration inserts the default objects.
 *
 * @since 1.0.0
 */
class m180611_100100_breeze_shop_data extends \cmsgears\core\common\base\Migration {

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

		$this->insertWidgets();
		$this->insertWidgetMappings();
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
		$cartTemplate	= Template::findGlobalBySlugType( ShopGlobal::TEMPLATE_CART, CmsGlobal::TYPE_PAGE );
		$checkTemplate	= Template::findGlobalBySlugType( ShopGlobal::TEMPLATE_CHECKOUT, CmsGlobal::TYPE_PAGE );
		$payTemplate	= Template::findGlobalBySlugType( ShopGlobal::TEMPLATE_PAYMENT, CmsGlobal::TYPE_PAGE );

		// Pages
		$cartPage		= Page::findBySlugType( 'cart', CmsGlobal::TYPE_PAGE );
		$checkoutPage	= Page::findBySlugType( 'checkout', CmsGlobal::TYPE_PAGE );
		$paymentPage	= Page::findBySlugType( 'payment', CmsGlobal::TYPE_PAGE );

		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $cartTemplate->id ], "id=$cartPage->id" );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $checkTemplate->id ], "id=$checkoutPage->id" );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $payTemplate->id ], "id=$paymentPage->id" );
	}

	private function insertWidgets() {

		$site	= $this->site;
		$master	= $this->master;
		$status	= ObjectData::STATUS_ACTIVE;
		$vis	= ObjectData::VISIBILITY_PUBLIC;

		$productcTemplate	= Template::findGlobalBySlugType( 'product-card', CmsGlobal::TYPE_WIDGET );
		$productbTemplate	= Template::findGlobalBySlugType( 'product-box', CmsGlobal::TYPE_WIDGET );
		$productbcTemplate	= Template::findGlobalBySlugType( 'product-club', CmsGlobal::TYPE_WIDGET );
		$productsTemplate	= Template::findGlobalBySlugType( 'product-search', CmsGlobal::TYPE_WIDGET );
		$producthTemplate	= Template::findGlobalBySlugType( 'product-home', CmsGlobal::TYPE_WIDGET );

		$columns = [ 'siteId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data' ];

		$models = [
			// Product Widgets
			[ $site->id, $productsTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Search Products', 'search-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Search Products', 'It search products published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"wrapperOptions":"{ \"class\": \"box-page-search-wrap row max-cols-50\" }","singleOptions":"{ \"class\": \"box box-default box-page-search col col12x4 row\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"recent","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":false,"tagParam":false,"wrap":"1","options":"{ \"class\": \"widget-basic widget-box widget-box-search widget-box-search-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","allPath":"all","showAllPath":"0","singlePath":"single","route":"","pagination":"1","paging":"1","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"12","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"250","excludeMain":"0","siteModels":"0","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productsTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Author Products', 'author-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Author Products', 'It search the author products published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"wrapperOptions":"{ \"class\": \"box-page-search-wrap row max-cols-50\" }","singleOptions":"{ \"class\": \"box box-default box-page-search col col12x4 row\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"recent","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":false,"tagParam":false,"wrap":"1","options":"{ \"class\": \"widget-basic widget-box widget-box-search widget-box-search-author widget-box-search-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","allPath":"all","showAllPath":"0","singlePath":"single","route":"","pagination":"1","paging":"1","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"12","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"250","excludeMain":"0","siteModels":"0","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productsTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Archive Products', 'archive-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Archive Products', 'It shows the archive products according to selected month and published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"wrapperOptions":"{ \"class\": \"box-page-search-wrap row max-cols-50\" }","singleOptions":"{ \"class\": \"box box-default box-page-search col col12x4 row\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"recent","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":false,"tagParam":false,"wrap":"1","options":"{ \"class\": \"widget-basic widget-box widget-box-search widget-box-search-archive widget-box-search-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","allPath":"all","showAllPath":"0","singlePath":"single","route":"","pagination":"1","paging":"1","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"12","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"250","excludeMain":"0","siteModels":"0","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productcTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Recent Products', 'recent-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Recent Products', 'It shows the recent products published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"1","headerIcon":"0","headerTitle":"1","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"wrapperOptions":"{ \"class\": \"card-page-wrap\" }","singleOptions":"{ \"class\": \"card card-default card-page\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"recent","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":false,"tagParam":false,"wrap":"1","options":"{ \"class\": \"widget-basic widget-card widget-card-recent widget-card-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","allPath":"all","showAllPath":"0","singlePath":"single","route":"","pagination":"0","paging":"0","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"5","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"120","excludeMain":"0","siteModels":"0","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productcTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Popular Products', 'popular-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Popular Products', 'It shows the popular products published on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"1","headerIcon":"0","headerTitle":"1","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"wrapperOptions":"{ \"class\": \"card-page-wrap\" }","singleOptions":"{ \"class\": \"card card-default card-page\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"popular","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":false,"tagParam":false,"wrap":"1","options":"{ \"class\": \"widget-basic widget-card widget-card-popular widget-card-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","allPath":"all","showAllPath":"0","singlePath":"single","route":"","pagination":"0","paging":"0","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"5","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"120","excludeMain":"0","siteModels":"0","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productbTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Related Products', 'related-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Popular Products', 'It shows the products published by same author on all sites.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"route":"","allPath":"all","singlePath":"single","wrapperOptions":"{ \"class\": \"box-page-wrap row max-cols-50\" }","singleOptions":"{ \"class\": \"box box-default box-page col col12x3\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"related","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":"0","tagParam":"0","wrap":"1","options":"{ \"class\": \"widget-basic widget-box widget-box-related widget-box-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","showAllPath":"0","pagination":"0","paging":"0","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"4","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"180","excludeMain":"0","siteModels":"0","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $producthTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Home Products', 'home-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Home Products', 'It shows Products published on all sites on landing page.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"route":"","allPath":"all","singlePath":"single","wrapperOptions":"{ \"class\": \"box-home-wrap row max-cols-50\" }","singleOptions":"{ \"class\": \"box box-default box-home col col12x4 row\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"recent","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":"0","tagParam":"0","wrap":"1","options":"{ \"class\": \"widget-basic widget-box widget-box-home widget-box-home-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","showAllPath":"0","pagination":"1","paging":"1","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"12","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"250","excludeMain":"0","siteModels":"0","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productbcTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Multisite Products', 'multisite-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Multisite Products', 'It shows the products published on all sites in site group.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"route":"","allPath":"all","singlePath":"single","wrapperOptions":"{ \"class\": \"box-page-wrap\" }","singleOptions":"{ \"class\": \"box box-default box-page\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"recent","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":"0","tagParam":"0","wrap":"1","options":"{ \"class\": \"widget-basic widget-box widget-box-club widget-box-club-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","showAllPath":"0","pagination":"0","paging":"0","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"4","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"180","excludeMain":"0","siteModels":"0","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productsTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Search Site Products', 'search-site-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Search Products', 'It search products published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"wrapperOptions":"{ \"class\": \"box-page-search-wrap row max-cols-50\" }","singleOptions":"{ \"class\": \"box box-default box-page-search col col12x4 row\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"recent","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":false,"tagParam":false,"wrap":"1","options":"{ \"class\": \"widget-basic widget-box widget-box-search widget-box-search-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","allPath":"all","showAllPath":"0","singlePath":"single","route":"","pagination":"1","paging":"1","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"12","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"250","excludeMain":"0","siteModels":"1","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productsTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Author Site Products', 'author-site-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Author Products', 'It shows the author products published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"wrapperOptions":"{ \"class\": \"box-page-search-wrap row max-cols-50\" }","singleOptions":"{ \"class\": \"box box-default box-page-search col col12x4 row\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"recent","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":false,"tagParam":false,"wrap":"1","options":"{ \"class\": \"widget-basic widget-box widget-box-search widget-box-search-author widget-box-search-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","allPath":"all","showAllPath":"0","singlePath":"single","route":"","pagination":"1","paging":"1","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"12","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"250","excludeMain":"0","siteModels":"1","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productsTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Archive Site Products', 'archive-site-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Archive Products', 'It shows the archive products according to selected month and published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"wrapperOptions":"{ \"class\": \"box-page-search-wrap row max-cols-50\" }","singleOptions":"{ \"class\": \"box box-default box-page-search col col12x4 row\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"recent","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":false,"tagParam":false,"wrap":"1","options":"{ \"class\": \"widget-basic widget-box widget-box-search widget-box-search-archive widget-box-search-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","allPath":"all","showAllPath":"0","singlePath":"single","route":"","pagination":"1","paging":"1","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"12","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"250","excludeMain":"0","siteModels":"1","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productcTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Recent Site Products', 'recent-site-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Recent Products', 'It shows the recent products published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"1","headerIcon":"0","headerTitle":"1","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"wrapperOptions":"{ \"class\": \"card-page-wrap\" }","singleOptions":"{ \"class\": \"card card-default card-page\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"recent","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":false,"tagParam":false,"wrap":"1","options":"{ \"class\": \"widget-basic widget-card widget-card-recent widget-card-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","allPath":"all","showAllPath":"0","singlePath":"single","route":"","pagination":"0","paging":"0","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"5","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"120","excludeMain":"0","siteModels":"1","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productcTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Popular Site Products', 'popular-site-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Popular Products', 'It shows the popular products published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"1","headerIcon":"0","headerTitle":"1","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"wrapperOptions":"{ \"class\": \"card-page-wrap\" }","singleOptions":"{ \"class\": \"card card-default card-page\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"popular","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":false,"tagParam":false,"wrap":"1","options":"{ \"class\": \"widget-basic widget-card widget-card-popular widget-card-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","allPath":"all","showAllPath":"0","singlePath":"single","route":"","pagination":"0","paging":"0","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"5","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"120","excludeMain":"0","siteModels":"1","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productbTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Related Site Products', 'related-site-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Related Products', 'It shows the related products published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"1","headerIcon":"0","headerTitle":"1","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"wrapperOptions":"{ \"class\": \"card-page-wrap\" }","singleOptions":"{ \"class\": \"card card-default card-page\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"related","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":false,"tagParam":false,"wrap":"1","options":"{ \"class\": \"widget-basic widget-card widget-card-related widget-card-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","allPath":"all","showAllPath":"0","singlePath":"single","route":"","pagination":"0","paging":"0","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"5","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"120","excludeMain":"0","siteModels":"1","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productsTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Category Products', 'category-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Category Products', 'It search the category products published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"wrapperOptions":"{ \"class\": \"box-page-search-wrap row max-cols-50\" }","singleOptions":"{ \"class\": \"box box-default box-page-search col col12x4 row\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"category","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":false,"tagParam":false,"wrap":"1","options":"{ \"class\": \"widget-basic widget-box widget-box-search widget-box-search-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","allPath":"all","showAllPath":"0","singlePath":"single","route":"","pagination":"1","paging":"1","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"12","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"250","excludeMain":"0","siteModels":"1","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productsTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Tag Products', 'tag-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Tag Products', 'It search the tag Products published on active site.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"wrapperOptions":"{ \"class\": \"box-page-search-wrap row max-cols-50\" }","singleOptions":"{ \"class\": \"box box-default box-page-search col col12x4 row\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"tag","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":false,"tagParam":false,"wrap":"1","options":"{ \"class\": \"widget-basic widget-box widget-box-search widget-box-search-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","allPath":"all","showAllPath":"0","singlePath":"single","route":"","pagination":"1","paging":"1","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"12","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"250","excludeMain":"0","siteModels":"1","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ],
			[ $site->id, $productbTemplate->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Similar Products', 'similar-products', CmsGlobal::TYPE_WIDGET, 'icon', 'texture', 'Similar Products', 'It shows the similar products having same category or tag.', NULL, NULL, 16000, 1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"route":"","allPath":"all","singlePath":"single","wrapperOptions":"{ \"class\": \"box-page-wrap row max-cols-50\" }","singleOptions":"{ \"class\": \"box box-default box-page col col12x3\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"similar","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":"0","tagParam":"0","wrap":"1","options":"{ \"class\": \"widget-basic widget-box widget-box-similar widget-box-product\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","showAllPath":"0","pagination":"0","paging":"0","nextLabel":"&raquo;","prevLabel":"&laquo;","limit":"4","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"180","excludeMain":"0","siteModels":"1","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}' ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $models );
	}

	private function insertWidgetMappings() {

		$shop = Page::findBySlugType( 'shop', CmsGlobal::TYPE_PAGE );

		$productsWidget = Widget::findBySlugType( 'search-site-products', CmsGlobal::TYPE_WIDGET );

		$columns = [ 'modelId', 'parentId', 'parentType', 'type', 'order', 'active', 'pinned', 'featured', 'nodes' ];

		$mappings = [
			[ $productsWidget->id, $shop->id, 'page', CmsGlobal::TYPE_WIDGET, 0, 1, 0, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_model_object', $columns, $mappings );
	}

    public function down() {

        echo "m180611_100100_breeze_shop_data will be deleted with m160621_014408_core.\n";

        return true;
    }

}
