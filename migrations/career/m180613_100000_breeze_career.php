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
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CareerGlobal::TYPE_JOB, null, true, 'Default layout for jobs.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\career\settings\JobSettings', '@breeze/templates/career/job/default/forms', 'default', true, 'career/job/default', true, '@breeze/templates/career/job/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-job" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertInternshipTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Default Templates - Internship
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CareerGlobal::TYPE_INTERNSHIP, null, true, 'Default layout for internship.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\career\settings\InternshipSettings', '@breeze/templates/career/internship/default/forms', 'default', true, 'career/job/default', true, '@breeze/templates/career/internship/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-internship" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertWidgetTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Job Widget - Default
			[ $master->id, $master->id, 'Job Card', 'job-card', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author jobs.', 'cmsgears\widgets\club\career\JobWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\career\JobConfig', '@breeze/templates/widget/career/job/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/job', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-card widget-card-job" }', null, null ],
			[ $master->id, $master->id, 'Job Box', 'job-box', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author jobs.', 'cmsgears\widgets\club\career\JobWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\career\JobConfig', '@breeze/templates/widget/career/job/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/job', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-job" }', null, null ],
			[ $master->id, $master->id, 'Job Club', 'job-club', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, related and author jobs clubbed from multiple sites.', 'cmsgears\widgets\club\career\JobWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\career\JobConfig', '@breeze/templates/widget/career/job/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/job', 'club', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-club widget-box-club-job" }', null, null ],
			[ $master->id, $master->id, 'Job Search', 'job-search', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to search jobs.', 'cmsgears\widgets\club\career\JobWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\career\JobConfig', '@breeze/templates/widget/career/job/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/job', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-search widget-box-search-job" }', null, null ],
			[ $master->id, $master->id, 'Job Home', 'job-home', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show jobs specifically on landing page.', 'cmsgears\widgets\club\career\JobWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\career\JobConfig', '@breeze/templates/widget/career/job/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/job', 'home', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-home widget-box-home-job" }', null, null ],
			[ $master->id, $master->id, 'Job Page', 'job-page', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show jobs specifically on single post page.', 'cmsgears\widgets\club\career\JobWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\career\JobConfig', '@breeze/templates/widget/career/job/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/job', 'page', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-page widget-box-page-job" }', null, null ],
			// Internship Widget - Default
			[ $master->id, $master->id, 'Internship Card', 'internship-card', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, similar, related and author internships.', 'cmsgears\widgets\club\career\InternshipWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\career\InternshipConfig', '@breeze/templates/widget/career/internship/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/internship', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-card widget-card-internship" }', null, null ],
			[ $master->id, $master->id, 'Internship Box', 'internship-box', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, similar, related and author internships.', 'cmsgears\widgets\club\career\InternshipWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\career\InternshipConfig', '@breeze/templates/widget/career/internship/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/internship', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-internship" }', null, null ],
			[ $master->id, $master->id, 'Internship Club', 'internship-club', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to display popular, recent, similar, related and author internships clubbed from multiple sites.', 'cmsgears\widgets\club\career\InternshipWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\career\InternshipConfig', '@breeze/templates/widget/career/internship/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/internship', 'club', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-club widget-box-club-internship" }', null, null ],
			[ $master->id, $master->id, 'Internship Search', 'internship-search', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to search internships.', 'cmsgears\widgets\club\career\InternshipWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\career\InternshipConfig', '@breeze/templates/widget/career/internship/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/internship', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-search widget-box-search-internship" }', null, null ],
			[ $master->id, $master->id, 'Internship Home', 'internship-home', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show internships specifically on landing page.', 'cmsgears\widgets\club\career\InternshipWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\career\InternshipConfig', '@breeze/templates/widget/career/internship/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/internship', 'home', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-home widget-box-home-internship" }', null, null ],
			[ $master->id, $master->id, 'Internship Page', 'internship-page', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show internships specifically on single internship page.', 'cmsgears\widgets\club\career\InternshipWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\career\InternshipConfig', '@breeze/templates/widget/career/internship/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/internship', 'page', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-box widget-box-page widget-box-page-internship" }', null, null ],
			// Apply Job Widget
			[ $master->id, $master->id, 'Apply Job', 'apply-job', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show Job Application form.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/job', 'application', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-job-form" }', null, null ],
			// Apply Internship Widget
			[ $master->id, $master->id, 'Apply Internship', 'apply-internship', CmsGlobal::TYPE_WIDGET, null, null, true, 'It can be used to show Internship Application form.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/career/job', 'application', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-internship-form" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

    public function down() {

        echo "m180613_100000_breeze_career will be deleted with m160621_014408_core.\n";

        return true;
    }

}
