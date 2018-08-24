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
use cmsgears\core\common\models\entities\Template;
use cmsgears\cms\common\models\entities\Page;

/**
 * The breeze cms migration inserts the default objects.
 *
 * @since 1.0.0
 */
class m180811_100100_breeze_shop_data extends Migration {

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

    public function down() {

        echo "m180811_100100_breeze_shop_data will be deleted with m160621_014408_core.\n";

        return true;
    }

}
