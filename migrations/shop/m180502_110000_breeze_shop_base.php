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

use cmsgears\core\common\base\Migration;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

/**
 * The breeze shop migration inserts the templates available in Breeze for Shop Module of CMSGears.
 *
 * @since 1.0.0
 */
class m180502_110000_breeze_shop_base extends Migration {

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

		$this->insertProductTemplates();
    }

	private function insertPageTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'active', 'description', 'classPath', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Default Templates - Shop Page
			[ $master->id, $master->id, 'Cart', ShopGlobal::TEMPLATE_CART, null, CmsGlobal::TYPE_PAGE, true, 'Cart layout for shop page.', null, 'default', true, 'page/default', false, '@breeze/templates/shop/cart/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-cart" }', null, null ],
			[ $master->id, $master->id, 'Checkout', ShopGlobal::TEMPLATE_CHECKOUT, null, CmsGlobal::TYPE_PAGE, true, 'Checkout layout for shop page.', null, 'default', true, 'page/default', false, '@breeze/templates/shop/checkout/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-checkout" }', null, null ],
			[ $master->id, $master->id, 'Payment', ShopGlobal::TEMPLATE_PAYMENT, null, CmsGlobal::TYPE_PAGE, true, 'Payment layout for shop page.', null, 'default', true, 'page/default', false, '@breeze/templates/shop/payment/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-payment" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	/**
	 * Product templates will be available for all the sites and themes.
	 */
	private function insertProductTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'active', 'description', 'classPath', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Default Templates - Product
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, null, 'product', true, 'Product layout for products.', null, 'default', true, 'product/default', false, '@breeze/templates/shop/product/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-product" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

    public function down() {

        echo "m180502_110000_breeze_shop_base will be deleted with m160621_014408_core.\n";

        return true;
    }

}
