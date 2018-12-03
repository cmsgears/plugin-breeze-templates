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
use cmsgears\career\common\config\CareerGlobal;

use cmsgears\core\common\base\Migration;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

/**
 * The breeze shop migration inserts the templates available in Breeze for Shop Module of CMSGears.
 *
 * @since 1.0.0
 */
class m180613_100000_breeze_career extends Migration {

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

		$this->insertJobTemplates();

		$this->insertInternshipTemplates();

		$this->insertWidgetTemplates();
    }

	private function insertJobTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Default Templates - Job
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CareerGlobal::TYPE_JOB, null, true, 'Default layout for jobs.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\JobSettings', '@breeze/templates/career/job/default/forms', 'default', true, 'career/job/default', false, '@breeze/templates/career/job/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-job" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertInternshipTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Default Templates - Internship
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CareerGlobal::TYPE_INTERNSHIP, null, true, 'Default layout for internship.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\InternshipSettings', '@breeze/templates/career/internship/default/forms', 'default', true, 'career/job/default', false, '@breeze/templates/career/job/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-internship" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertWidgetTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Job Widget - Default
			[ $master->id, $master->id, 'Job Card', 'job-card', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author jobs.', 'cmsgears\widgets\blog\JobWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\JobConfig', '@breeze/templates/widget/job/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/job', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-card widget-card-job" }', null, null ],
			[ $master->id, $master->id, 'Job Box', 'job-box', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author jobs.', 'cmsgears\widgets\blog\JobWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\JobConfig', '@breeze/templates/widget/job/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/job', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-job" }', null, null ],
			[ $master->id, $master->id, 'Job Club', 'job-club', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author jobs clubbed from multiple sites.', 'cmsgears\widgets\blog\JobWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\JobConfig', '@breeze/templates/widget/job/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/job', 'club', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-club widget-box-club-job" }', null, null ],
			[ $master->id, $master->id, 'Job Search', 'job-search', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to search jobs.', 'cmsgears\widgets\blog\JobWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\JobConfig', '@breeze/templates/widget/job/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/job', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-search widget-box-search-job" }', null, null ],
			[ $master->id, $master->id, 'Job Home', 'job-home', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show jobs specifically on landing page.', 'cmsgears\widgets\blog\JobWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\JobConfig', '@breeze/templates/widget/job/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/job', 'home', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-home widget-box-home-job" }', null, null ],
			[ $master->id, $master->id, 'Job Page', 'job-page', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show jobs specifically on single post page.', 'cmsgears\widgets\blog\JobWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\JobConfig', '@breeze/templates/widget/job/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/job', 'page', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-page widget-box-page-job" }', null, null ],
			// Internship Widget - Default
			[ $master->id, $master->id, 'Internship Card', 'internship-card', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, similar, related and author internships.', 'cmsgears\widgets\blog\InternshipWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\InternshipConfig', '@breeze/templates/widget/internship/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/internship', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-card widget-card-internship" }', null, null ],
			[ $master->id, $master->id, 'Internship Box', 'internship-box', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, similar, related and author internships.', 'cmsgears\widgets\blog\InternshipWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\InternshipConfig', '@breeze/templates/widget/internship/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/internship', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-internship" }', null, null ],
			[ $master->id, $master->id, 'Internship Club', 'internship-club', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, similar, related and author internships clubbed from multiple sites.', 'cmsgears\widgets\blog\InternshipWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\InternshipConfig', '@breeze/templates/widget/internship/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/internship', 'club', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-club widget-box-club-internship" }', null, null ],
			[ $master->id, $master->id, 'Internship Search', 'internship-search', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to search internships.', 'cmsgears\widgets\blog\InternshipWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\InternshipConfig', '@breeze/templates/widget/internship/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/internship', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-search widget-box-search-internship" }', null, null ],
			[ $master->id, $master->id, 'Internship Home', 'internship-home', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show internships specifically on landing page.', 'cmsgears\widgets\blog\InternshipWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\InternshipConfig', '@breeze/templates/widget/internship/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/internship', 'home', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-home widget-box-home-internship" }', null, null ],
			[ $master->id, $master->id, 'Internship Page', 'internship-page', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show internships specifically on single internship page.', 'cmsgears\widgets\blog\InternshipWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\InternshipConfig', '@breeze/templates/widget/internship/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/internship', 'page', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-page widget-box-page-internship" }', null, null ],
			// Apply Job Widget
			[ $master->id, $master->id, 'Apply Job', 'apply-job', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show Job Application form.', 'cmsgears\widgets\newsletter\FollowMeWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\NewsletterConfig', '@breeze/templates/widget/form/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/newsletter', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-job" }', null, null ],
			// Apply Internship Widget
			[ $master->id, $master->id, 'Apply Internship', 'apply-internship', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show Internship Application form.', 'cmsgears\widgets\newsletter\FollowMeWidget', null, null, null, null, 'cmsgears\templates\breeze\models\forms\widget\NewsletterConfig', '@breeze/templates/widget/form/forms', 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/newsletter', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-internship" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

    public function down() {

        echo "m180613_100000_breeze_career will be deleted with m160621_014408_core.\n";

        return true;
    }

}
