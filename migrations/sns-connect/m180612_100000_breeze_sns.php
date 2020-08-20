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

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

/**
 * The breeze sns migration inserts the templates available in Breeze for SNS Connect Module of CMSGears.
 *
 * @since 1.0.0
 */
class m180612_100000_breeze_sns extends \cmsgears\core\common\base\Migration {

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

		$this->insertWidgetTemplates();
    }

	private function insertWidgetTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// SNS Widget - Default, Icon, Text
			[ $master->id, $master->id, 'Default SNS Login', 'sns-login-default', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'Display SNS Login Widget only with icon and text.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/sns', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-sns-login" }', null, null ],
			[ $master->id, $master->id, 'Icon SNS Login', 'sns-login-icon', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'Display SNS Login Widget only with icons.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/sns', 'icon', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-sns-login" }', null, null ],
			[ $master->id, $master->id, 'Text SNS Login', 'sns-login-text', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'Display SNS Login Widget only with text.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/sns', 'text', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-sns-login" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

    public function down() {

        echo "m180612_100000_breeze_sns will be deleted with m160621_014408_core.\n";

        return true;
    }

}
