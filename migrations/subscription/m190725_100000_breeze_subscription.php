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
use cmsgears\subscription\common\config\SubscriptionGlobal;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

/**
 * The breeze shop migration inserts the templates available in Breeze for Shop Module of CMSGears.
 *
 * @since 1.0.0
 */
class m190725_100000_breeze_subscription extends \cmsgears\core\common\base\Migration {

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

		$this->insertPlanTemplates();

		$this->insertWidgetTemplates();
    }

	private function insertPageTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Subscription Plans Page
			[ $master->id, $master->id, 'Subscriptions', SubscriptionGlobal::TEMPLATE_PLANS, CmsGlobal::TYPE_PAGE, null, null, true, false, 'Page layout to show Subscription Plans on Plans page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\PageSettings', '@breeze/templates/cms/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/cms/page/search', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertPlanTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Default Templates - Subscription Plan
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, SubscriptionGlobal::TYPE_PLAN, null, true, true, 'Default layout for subscription plans.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\subscription\settings\PlanSettings', '@breeze/templates/subscription/plan/default/forms', 'default', true, 'subscription/plan/default', true, '@breeze/templates/subscription/plan/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertWidgetTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Subscription Plan Widget - Default
			[ $master->id, $master->id, 'Subscription Plan Card', 'subscription-plan-card', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display popular, recent, and featured Subscription Plans.', 'cmsgears\widgets\club\subscription\PlanWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\subscription\PlanConfig', '@breeze/templates/widget/subscription/plan/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/subscription/plan', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-card widget-card-model widget-card-subs-plan" }', null, null ],
			[ $master->id, $master->id, 'Subscription Plan Box', 'subscription-plan-box', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display related and similar Subscription Plans.', 'cmsgears\widgets\club\subscription\PlanWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\subscription\PlanConfig', '@breeze/templates/widget/subscription/plan/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/subscription/plan', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-model widget-box-subs-plan" }', null, null ],
			[ $master->id, $master->id, 'Subscription Plan Club', 'subscription-plan-club', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display popular, recent, featured, related and similar Subscription Plans clubbed from multiple sites.', 'cmsgears\widgets\club\subscription\PlanWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\subscription\PlanConfig', '@breeze/templates/widget/subscription/plan/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/subscription/plan', 'club', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-club widget-box-club-subs-plan" }', null, null ],
			[ $master->id, $master->id, 'Subscription Plan Search', 'subscription-plan-search', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to search Subscription Plans.', 'cmsgears\widgets\club\subscription\PlanWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\subscription\PlanConfig', '@breeze/templates/widget/subscription/plan/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/subscription/plan', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-search-model widget-box-search-subs-plan" }', null, null ],
			[ $master->id, $master->id, 'Subscription Plan Home', 'subscription-plan-home', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to show Subscription Plans specifically on landing page.', 'cmsgears\widgets\club\subscription\PlanWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\subscription\PlanConfig', '@breeze/templates/widget/subscription/plan/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/subscription/plan', 'home', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-home widget-box-home-subs-plan" }', null, null ],
			[ $master->id, $master->id, 'Subscription Plan Page', 'subscription-plan-page', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to show Subscription Plans specifically on single Subscription Plan page.', 'cmsgears\widgets\club\subscription\PlanWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\subscription\PlanConfig', '@breeze/templates/widget/subscription/plan/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/subscription/plan', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-page widget-box-page-subs-plan" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

    public function down() {

        echo "m190725_100000_breeze_subscription will be deleted with m160621_014408_core.\n";

        return true;
    }

}
