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
use cmsgears\forum\common\config\ForumGlobal;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

/**
 * The breeze forum migration inserts the templates available in Breeze for Forum Module of CMSGears.
 *
 * @since 1.0.0
 */
class m190720_100000_breeze_forum extends \cmsgears\core\common\base\Migration {

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

		$this->insertTopicTemplates();

		$this->insertWidgetTemplates();
    }

	private function insertPageTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Topic Pages
			[ $master->id, $master->id, 'Forum', ForumGlobal::TEMPLATE_FORUM, CmsGlobal::TYPE_PAGE, null, null, true, false, 'Page layout to show topics on forum page.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\PageSettings', '@breeze/templates/cms/page/default/forms', 'default', true, 'page/default', false, '@breeze/templates/cms/page/search', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	/**
	 * Topic templates will be available for all the sites and themes.
	 */
	private function insertTopicTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Default Templates - Topic
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, ForumGlobal::TYPE_TOPIC, null, true, true, 'Topic layout for forum topics.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forum\settings\TopicSettings', '@breeze/templates/forum/topic/default/forms', 'default', true, 'topic/default', false, '@breeze/templates/forum/topic/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ],
			[ $master->id, $master->id, 'Category', CoreGlobal::TEMPLATE_CATEGORY, ForumGlobal::TYPE_TOPIC, null, true, true, 'Topic layout for forum topic categories.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forum\settings\TopicSettings', '@breeze/templates/forum/topic/default/forms', 'default', true, 'topic/default', false, '@breeze/templates/forum/topic/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ],
			[ $master->id, $master->id, 'Tag', CoreGlobal::TEMPLATE_TAG, ForumGlobal::TYPE_TOPIC, null, true, true, 'Topic layout for forum topic tags.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forum\settings\TopicSettings', '@breeze/templates/forum/topic/default/forms', 'default', true, 'topic/default', false, '@breeze/templates/forum/topic/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertWidgetTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Topic Widget - Default
			[ $master->id, $master->id, 'Topic Card', 'topic-card', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display popular, recent, and featured Topics.', 'cmsgears\widgets\club\cms\TopicWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\forum\TopicConfig', '@breeze/templates/widget/forum/topic/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/forum/topic', 'card', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-card widget-card-model widget-card-topic" }', null, null ],
			[ $master->id, $master->id, 'Topic Box', 'topic-box', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display related and similar Topics.', 'cmsgears\widgets\club\cms\TopicWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\forum\TopicConfig', '@breeze/templates/widget/forum/topic/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/forum/topic', 'box', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-model widget-box-topic" }', null, null ],
			[ $master->id, $master->id, 'Topic Club', 'topic-club', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to display popular, recent, featured, related and similar Topics clubbed from multiple sites.', 'cmsgears\widgets\club\cms\TopicWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\forum\TopicConfig', '@breeze/templates/widget/forum/topic/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/forum/topic', 'club', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-club widget-box-club-topic" }', null, null ],
			[ $master->id, $master->id, 'Topic Search', 'topic-search', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to search Topics.', 'cmsgears\widgets\club\cms\TopicWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\forum\TopicConfig', '@breeze/templates/widget/forum/topic/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/forum/topic', 'search', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-search-model widget-box-search-topic" }', null, null ],
			[ $master->id, $master->id, 'Topic Home', 'topic-home', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to show Topics specifically on landing page.', 'cmsgears\widgets\club\cms\TopicWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\forum\TopicConfig', '@breeze/templates/widget/forum/topic/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/forum/topic', 'home', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-home widget-box-home-topic" }', null, null ],
			[ $master->id, $master->id, 'Topic Page', 'topic-page', CmsGlobal::TYPE_WIDGET, null, null, true, false, 'It can be used to show Topics specifically on single Topic page.', 'cmsgears\widgets\club\cms\TopicWidget', null, null, null, null, 'cmsgears\templates\breeze\models\widget\forum\TopicConfig', '@breeze/templates/widget/forum/topic/forms', 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/forum/topic', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget widget-basic widget-default widget-box widget-box-page widget-box-page-topic" }', null, null ],
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

    public function down() {

        echo "m190720_100000_breeze_forum will be deleted with m160621_014408_core.\n";

        return true;
    }

}
