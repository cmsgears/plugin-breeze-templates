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

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

/**
 * The breeze shop migration inserts the templates available in Breeze for Shop Module of CMSGears.
 *
 * @since 1.0.0
 */
class m180611_100000_breeze_shop extends \cmsgears\core\common\base\Migration {

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

		$this->insertProductTemplates();

		$this->insertWidgetTemplates();
    }

	private function insertPageTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Default Templates - Shop Page
			[ $master->id, $master->id, 'Cart', ShopGlobal::TEMPLATE_CART, CmsGlobal::TYPE_PAGE, null, true, false, 'Cart layout for shop page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\PageSettings', '@breeze/templates/cms/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/shop/cart/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-cart" }', null, null ],
			[ $master->id, $master->id, 'Checkout', ShopGlobal::TEMPLATE_CHECKOUT, CmsGlobal::TYPE_PAGE, null, true, false, 'Checkout layout for shop page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\PageSettings', '@breeze/templates/cms/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/shop/checkout/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-checkout" }', null, null ],
			[ $master->id, $master->id, 'Payment', ShopGlobal::TEMPLATE_PAYMENT, CmsGlobal::TYPE_PAGE, null, true, false, 'Payment layout for shop page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\PageSettings', '@breeze/templates/cms/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/shop/payment/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-payment" }', null, null ],
			// Product Pages
			[ $master->id, $master->id, 'Shop', ShopGlobal::TEMPLATE_SHOP, CmsGlobal::TYPE_PAGE, null, null, true, false, 'Page layout to show products on shop page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\PageSettings', '@breeze/templates/cms/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/cms/page/search', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ],
			[ $master->id, $master->id, 'Offers', ShopGlobal::TEMPLATE_OFFER, CmsGlobal::TYPE_PAGE, null, null, true, false, 'Page layout to show offers on offers page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\PageSettings', '@breeze/templates/cms/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/cms/page/search', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	/**
	 * Product templates will be available for all the sites and themes.
	 */
	private function insertProductTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Default Templates - Product
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, ShopGlobal::TYPE_PRODUCT, null, true, true, 'Product layout for shop products.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\shop\settings\ProductSettings', '@breeze/templates/shop/product/default/forms', 'default', true, 'product/default', false, '@breeze/templates/shop/product/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-product" }', null, null ],
			[ $master->id, $master->id, 'Category', CoreGlobal::TEMPLATE_CATEGORY, ShopGlobal::TYPE_PRODUCT, null, true, true, 'Product layout for shop product categories.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\shop\settings\ProductSettings', '@breeze/templates/shop/product/default/forms', 'default', true, 'product/default', false, '@breeze/templates/shop/product/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-product" }', null, null ],
			[ $master->id, $master->id, 'Tag', CoreGlobal::TEMPLATE_TAG, ShopGlobal::TYPE_PRODUCT, null, true, true, 'Product layout for shop product tags.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\shop\settings\ProductSettings', '@breeze/templates/shop/product/default/forms', 'default', true, 'product/default', false, '@breeze/templates/shop/product/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-product" }', null, null ],
			// Default Templates - Offer
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, ShopGlobal::TYPE_OFFER, null, true, true, 'Offer layout for offers.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\shop\settings\OfferSettings', '@breeze/templates/shop/offer/default/forms', 'default', true, 'offer/default', false, '@breeze/templates/shop/offer/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-offer" }', null, null ],
			[ $master->id, $master->id, 'Category', CoreGlobal::TEMPLATE_CATEGORY, ShopGlobal::TYPE_OFFER, null, true, true, 'Offer layout for offer categories.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\shop\settings\OfferSettings', '@breeze/templates/shop/offer/default/forms', 'default', true, 'offer/default', false, '@breeze/templates/shop/offer/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-offer" }', null, null ],
			[ $master->id, $master->id, 'Tag', CoreGlobal::TEMPLATE_TAG, ShopGlobal::TYPE_OFFER, null, true, true, 'Offer layout for offer tags.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\shop\settings\OfferSettings', '@breeze/templates/shop/offer/default/forms', 'default', true, 'offer/default', false, '@breeze/templates/shop/offer/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-offer" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertWidgetTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Product Widget - Default
			[ $master->id, $master->id, 'Product Card', 'product-card', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display popular, recent, and featured Products.', 'cmsgears\widgets\club\cms\ProductWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\ProductConfig', '@breeze/templates/widget/shop/product/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/product', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-card widget-card-model widget-card-product" }', null, null ],
			[ $master->id, $master->id, 'Product Box', 'product-box', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display related and similar Products.', 'cmsgears\widgets\club\cms\ProductWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\ProductConfig', '@breeze/templates/widget/shop/product/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/product', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-model widget-box-product" }', null, null ],
			[ $master->id, $master->id, 'Product Club', 'product-club', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display popular, recent, featured, related and similar Products clubbed from multiple sites.', 'cmsgears\widgets\club\cms\ProductWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\ProductConfig', '@breeze/templates/widget/shop/product/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/product', 'club', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-club widget-box-club-product" }', null, null ],
			[ $master->id, $master->id, 'Product Search', 'product-search', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to search Products.', 'cmsgears\widgets\club\cms\ProductWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\ProductConfig', '@breeze/templates/widget/shop/product/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/product', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-search-model widget-box-search-product" }', null, null ],
			[ $master->id, $master->id, 'Product Home', 'product-home', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to show Products specifically on landing page.', 'cmsgears\widgets\club\cms\ProductWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\ProductConfig', '@breeze/templates/widget/shop/product/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/product', 'home', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-home widget-box-home-product" }', null, null ],
			[ $master->id, $master->id, 'Product Page', 'product-page', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to show Products specifically on single Product page.', 'cmsgears\widgets\club\cms\ProductWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\ProductConfig', '@breeze/templates/widget/shop/product/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/product', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-page widget-box-page-product" }', null, null ],
			// Offer Widget - Default
			[ $master->id, $master->id, 'Offer Card', 'offer-card', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display popular, recent, and featured Offers.', 'cmsgears\widgets\club\cms\OfferWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\OfferConfig', '@breeze/templates/widget/shop/offer/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/offer', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-card widget-card-model widget-card-offer" }', null, null ],
			[ $master->id, $master->id, 'Offer Box', 'offer-box', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display related and similar Offers.', 'cmsgears\widgets\club\cms\OfferWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\OfferConfig', '@breeze/templates/widget/shop/offer/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/offer', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-model widget-box-offer" }', null, null ],
			[ $master->id, $master->id, 'Offer Club', 'offer-club', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display popular, recent, featured, related and similar Offers clubbed from multiple sites.', 'cmsgears\widgets\club\cms\OfferWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\OfferConfig', '@breeze/templates/widget/shop/offer/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/offer', 'club', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-club widget-box-club-offer" }', null, null ],
			[ $master->id, $master->id, 'Offer Search', 'offer-search', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to search Offers.', 'cmsgears\widgets\club\cms\OfferWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\OfferConfig', '@breeze/templates/widget/shop/offer/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/offer', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-search-model widget-box-search-offer" }', null, null ],
			[ $master->id, $master->id, 'Offer Home', 'offer-home', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to show Offers specifically on landing page.', 'cmsgears\widgets\club\cms\OfferWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\OfferConfig', '@breeze/templates/widget/shop/offer/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/offer', 'home', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-home widget-box-home-offer" }', null, null ],
			[ $master->id, $master->id, 'Offer Page', 'offer-page', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to show Offers specifically on single Offer page.', 'cmsgears\widgets\club\cms\OfferWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\OfferConfig', '@breeze/templates/widget/shop/offer/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/offer', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-page widget-box-page-offer" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

    public function down() {

        echo "m180611_100000_breeze_shop will be deleted with m160621_014408_core.\n";

        return true;
    }

}
