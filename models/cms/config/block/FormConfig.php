<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\templates\breeze\models\cms\config\block;

// Yii Imports
use Yii;

/**
 * FormConfig provide text configuration data.
 *
 * @since 1.0.0
 */
class FormConfig extends \cmsgears\core\common\models\forms\DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $flip		= false;
	public $flipClass	= 'block-form-flip';

	public $split		= false;
	public $splitClass	= 'widget-form-split';

	public $wrap	= true;
	public $wrapper = 'div';

	public $formName = 'GenericForm'; // Form Name used to collect the data

	public $labels = true; // Flag to show/hide field labels

	public $slug;

	public $type = CoreGlobal::TYPE_FORM;

	public $spinner = 'cmti cmti-3x cmti-spinner-10';

	public $ajaxUrl;

	public $cmtApp			= 'forms';
	public $cmtController	= 'form';
	public $cmtAction		= 'default';

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

		return [
			[ [ 'flip', 'split', 'labels' ], 'boolean' ],
			[ [ 'flipClass', 'splitClass', 'formName', 'slug', 'type', 'cmtApp', 'cmtController', 'cmtAction' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ],
			[ [ 'spinner' ], 'string', 'min' => 1, 'max' => Yii::$app->core->largeText ],
			[ [ 'ajaxUrl' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxLargeText ]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {

		return [
			'spinner' => 'Spinner',
			'ajaxUrl' => 'AJAX Url',
			'cmtApp' => 'AJAX Application',
			'cmtController' => 'AJAX Controller',
			'cmtAction' => 'AJAX Action'
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// FormConfig ----------------------------

	public function generateConfig( $params = [] ) {

		$config = parent::generateConfig();

		$config[ 'formName' ]	= $this->formName;
		$config[ 'labels' ]		= $this->labels;
		$config[ 'slug' ]		= $this->slug;
		$config[ 'type' ]		= $this->type;
		$config[ 'spinner' ]	= $this->spinner;
		$config[ 'ajaxUrl' ]	= $this->ajaxUrl;
		$config[ 'cmtApp' ]		= $this->cmtApp;

		$config[ 'cmtController' ] = $this->cmtController;

		$config[ 'cmtAction' ] = $this->cmtAction;

		return $config;
	}

}
