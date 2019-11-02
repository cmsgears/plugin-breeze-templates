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

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Default Templates - Shop Page
			[ $master->id, $master->id, 'Cart', ShopGlobal::TEMPLATE_CART, CmsGlobal::TYPE_PAGE, null, true, 'Cart layout for shop page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\PageSettings', '@breeze/templates/cms/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/shop/cart/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-cart" }', null, null ],
			[ $master->id, $master->id, 'Checkout', ShopGlobal::TEMPLATE_CHECKOUT, CmsGlobal::TYPE_PAGE, null, true, 'Checkout layout for shop page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\PageSettings', '@breeze/templates/cms/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/shop/checkout/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-checkout" }', null, null ],
			[ $master->id, $master->id, 'Payment', ShopGlobal::TEMPLATE_PAYMENT, CmsGlobal::TYPE_PAGE, null, true, 'Payment layout for shop page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\PageSettings', '@breeze/templates/cms/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/shop/payment/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-payment" }', null, null ],
			[ $master->id, $master->id, 'Shop', ShopGlobal::TEMPLATE_SHOP, CmsGlobal::TYPE_PAGE, null, true, 'Shop shows products with filters.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\PageSettings', '@breeze/templates/cms/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/shop/page/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-payment" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	/**
	 * Product templates will be available for all the sites and themes.
	 */
	private function insertProductTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Default Templates - Product
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, ShopGlobal::TYPE_PRODUCT, null, true, 'Product layout for shop products.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\shop\settings\ProductSettings', '@breeze/templates/shop/product/default/forms', 'default', true, 'product/default', false, '@breeze/templates/shop/product/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-product" }', null, null ],
			// Default Templates - Offer
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, ShopGlobal::TYPE_OFFER, null, true, 'Offer layout for product offers.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\shop\settings\OfferSettings', '@breeze/templates/shop/offer/default/forms', 'default', true, 'offer/default', false, '@breeze/templates/shop/offer/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-offer" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertWidgetTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Product Widget - Default
			[ $master->id, $master->id, 'Product Card', 'product-card', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author products.', 'cmsgears\widgets\club\shop\ProductWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\ProductConfig', '@breeze/templates/widget/shop/product/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/product', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-card widget-card-product" }', null, null ],
			[ $master->id, $master->id, 'Product Box', 'product-box', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author products.', 'cmsgears\widgets\club\shop\ProductWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\ProductConfig', '@breeze/templates/widget/shop/product/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/product', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-product" }', null, null ],
			[ $master->id, $master->id, 'Product Club', 'product-club', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author products clubbed from multiple sites.', 'cmsgears\widgets\club\shop\ProductWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\ProductConfig', '@breeze/templates/widget/shop/product/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/product', 'club', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-club widget-box-club-product" }', null, null ],
			[ $master->id, $master->id, 'Product Search', 'product-search', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to search products.', 'cmsgears\widgets\club\shop\ProductWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\ProductConfig', '@breeze/templates/widget/shop/product/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/product', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-search widget-box-search-product" }', null, null ],
			[ $master->id, $master->id, 'Product Home', 'product-home', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show products specifically on landing page.', 'cmsgears\widgets\club\shop\ProductWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\ProductConfig', '@breeze/templates/widget/shop/product/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/product', 'home', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-home widget-box-home-product" }', null, null ],
			[ $master->id, $master->id, 'Product Page', 'product-page', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show products specifically on single post page.', 'cmsgears\widgets\club\shop\ProductWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\ProductConfig', '@breeze/templates/widget/shop/product/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/product', 'page', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-page widget-box-page-product" }', null, null ],
			// Offer Widget - Default
			[ $master->id, $master->id, 'Offer Card', 'offer-card', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author offers.', 'cmsgears\widgets\club\shop\OfferWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\OfferConfig', '@breeze/templates/widget/shop/offer/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/offer', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-card widget-card-offer" }', null, null ],
			[ $master->id, $master->id, 'Offer Box', 'offer-box', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author offers.', 'cmsgears\widgets\club\shop\OfferWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\OfferConfig', '@breeze/templates/widget/shop/offer/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/offer', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-offer" }', null, null ],
			[ $master->id, $master->id, 'Offer Club', 'offer-club', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author offers clubbed from multiple sites.', 'cmsgears\widgets\club\shop\OfferWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\OfferConfig', '@breeze/templates/widget/shop/offer/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/offer', 'club', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-club widget-box-club-offer" }', null, null ],
			[ $master->id, $master->id, 'Offer Search', 'offer-search', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to search offers.', 'cmsgears\widgets\club\shop\OfferWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\OfferConfig', '@breeze/templates/widget/shop/offer/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/offer', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-search widget-box-search-offer" }', null, null ],
			[ $master->id, $master->id, 'Offer Home', 'offer-home', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show offers specifically on landing page.', 'cmsgears\widgets\club\shop\OfferWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\OfferConfig', '@breeze/templates/widget/shop/offer/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/offer', 'home', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-home widget-box-home-offer" }', null, null ],
			[ $master->id, $master->id, 'Offer Page', 'offer-page', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show offers specifically on single post page.', 'cmsgears\widgets\club\shop\OfferWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\shop\OfferConfig', '@breeze/templates/widget/shop/offer/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/shop/offer', 'page', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-page widget-box-page-offer" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

    public function down() {

        echo "m180611_100000_breeze_shop will be deleted with m160621_014408_core.\n";

        return true;
    }

}
