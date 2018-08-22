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
 * The breeze sns migration inserts the default objects for SNS Connect Module of CMSGears.
 *
 * @since 1.0.0
 */
class m180818_100100_breeze_sns_objects extends Migration {

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

		$this->insertWidgets();
    }

	/**
	 * Widgets
	 */
	private function insertWidgets() {

		$site	= $this->site;
		$master	= $this->master;

		$defaultWidget	= Template::findGlobalBySlugType( 'sns-login-default', CmsGlobal::TYPE_WIDGET );
		$iconWidget		= Template::findGlobalBySlugType( 'sns-login-icon', CmsGlobal::TYPE_WIDGET );
		$textWidget		= Template::findGlobalBySlugType( 'sns-login-text', CmsGlobal::TYPE_WIDGET );

		$columns = [ 'siteId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$models = [
			// Widgets
			[$site->id, $defaultWidget->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'SNS Login', 'sns-login', 'widget', 'icon', 'texture', 'SNS Login with text and icon', NULL, NULL, NULL, 16000, 1500, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL, NULL, 0, NULL ],
			[$site->id, $iconWidget->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'SNS Login Icons', 'sns-login-icons', 'widget', 'icon', 'texture', 'SNS Login with icons', NULL, NULL, NULL, 16000, 1500, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL, NULL, 0, NULL ],
			[$site->id, $textWidget->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'SNS Login Text', 'sns-login-text', 'widget', 'icon', 'texture', 'SNS Login with text', NULL, NULL, NULL, 16000, 1500, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL, NULL, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $models );
	}

    public function down() {

        echo "m180818_100100_breeze_sns_objects will be deleted with m160621_014408_core.\n";

        return true;
    }

}
