<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\templates\breeze\models\widget;

// Yii Imports
use Yii;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

/**
 * PagingConfig provide widget config data.
 *
 * @since 1.0.0
 */
class PagingConfig extends WidgetConfig {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// HTML Wrapper
	public $wrap	= true;
	public $wrapper = 'div';

	// HTML Options - Widget Wrapper
	public $options	= '{ "class": "widget widget-page" }';

	// HTML Options - Models Wrapper
	public $wrapperOptions = '{ "class": "row" }';

	// HTML Wrapper - Single
	public $wrapSingle		= true;
	public $singleWrapper	= 'div';
	public $singleOptions	= '{ "class": "row" }';

	// Auto columns
	public $autoCols = false;
	public $autoColsCount = 4;

	// Path to form Url
	public $basePath	= null;
	public $allPath		= 'all';
	public $showAllPath = false;
	public $singlePath	= 'single';
	public $route		= null;

	// Pagination
	public $pagination	= true;
	public $paging		= true;
    public $nextLabel	= '&raquo;';
	public $prevLabel	= '&laquo;';
	public $limit		= 5;
	public $excludeParams = '{"params": [] }';

	// Ajax Pagination
	public $ajaxPagination		= false;
	public $ajaxPageApp			= 'pagination';
	public $ajaxPageController	= 'page';
	public $ajaxPageAction		= 'getPage';
	public $ajaxUrl				= null;

	// Text
	public $textLimit = CoreGlobal::TEXT_SMALL;

	// Multisite
	public $excludeMain	= false;
	public $siteModels	= false;

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

	// yii\base\Model ---------

	/**
	 * @inheritdoc
	 */
	public function rules() {

		$rules = parent::rules();

		$rules[] = [ [ 'singleWrapper', 'basePath', 'allPath', 'singlePath' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ];
		$rules[] = [ [ 'ajaxPageApp', 'ajaxPageController', 'ajaxPageAction' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ];
		$rules[] = [ [ 'route', 'nextLabel', 'prevLabel', 'excludeParams' ], 'string', 'min' => 1, 'max' => Yii::$app->core->largeText ];
		$rules[] = [ [ 'wrapperOptions', 'singleOptions', 'ajaxUrl' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xtraLargeText ];
		$rules[] = [ [ 'wrap', 'wrapSingle', 'showAllPath', 'pagination', 'paging', 'ajaxPagination', 'autoCols' ], 'boolean' ];
		$rules[] = [ [ 'excludeMain', 'siteModels' ], 'boolean' ];
		$rules[] = [ [ 'limit', 'textLimit', 'autoColsCount' ], 'number', 'integerOnly' => true, 'min' => 1 ];

		return $rules;
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {

		return [

		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// PagingConfig --------------------------

	public function generateConfig( $params = [] ) {

		$config = parent::generateConfig();

		$config[ 'wrapperOptions' ] = json_decode( $this->wrapperOptions, true );
		$config[ 'wrapSingle' ]		= $this->wrapSingle;
		$config[ 'singleWrapper' ]	= $this->singleWrapper;
		$config[ 'singleOptions' ]	= json_decode( $this->singleOptions, true );
		$config[ 'basePath' ]		= $this->basePath;
		$config[ 'allPath' ]		= $this->allPath;
		$config[ 'showAllPath' ]	= $this->showAllPath;
		$config[ 'singlePath' ]		= $this->singlePath;
		$config[ 'route' ]			= $this->route;
		$config[ 'pagination' ]		= $this->pagination;
		$config[ 'paging' ]			= $this->paging;
		$config[ 'nextLabel' ]		= $this->nextLabel;
		$config[ 'prevLabel' ]		= $this->prevLabel;
		$config[ 'limit' ]			= $this->limit;
		$config[ 'excludeParams' ]	= json_decode( $this->excludeParams, true )[ 'params' ];
		$config[ 'ajaxPagination' ]	= $this->ajaxPagination;
		$config[ 'ajaxPageApp' ]	= $this->ajaxPageApp;
		$config[ 'ajaxPageController' ]	= $this->ajaxPageController;
		$config[ 'ajaxPageAction' ]	= $this->ajaxPageAction;
		$config[ 'ajaxUrl' ]		= $this->ajaxUrl;
		$config[ 'textLimit' ]		= $this->textLimit;
		$config[ 'excludeMain' ]	= $this->excludeMain;
		$config[ 'siteModels' ]		= $this->siteModels;

		return $config;
	}

}
