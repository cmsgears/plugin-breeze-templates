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
		$this->cmgPrefix	= Yii::$app->migration->cmgPrefix;

		$this->site		= Site::findBySlug( CoreGlobal::SITE_MAIN );
		$this->master	= User::findByUsername( Yii::$app->migration->getSiteMaster() );

		Yii::$app->core->setSite( $this->site );
	}

    public function up() {

		$this->insertPages();

		$this->insertForms();

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
	 * Forms
	 */
	private function insertForms() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$models = [
			// Default - Forms
		];

		$this->batchInsert( $this->cmgPrefix . 'core_form', $columns, $models );
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

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$models = [
			// Default - Sidebars
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $models );
	}

	/**
	 * Menus
	 */
	private function insertMenus() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$models = [
			// Default - Sidebars
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $models );
	}

    public function down() {

        echo "m180502_100100_breeze_cms_objects will be deleted with m160621_014408_core.\n";

        return true;
    }

}
