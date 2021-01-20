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
 * NewsletterConfig provide newsletter configuration data.
 *
 * @since 1.0.0
 */
class NewsletterConfig extends \cmsgears\core\common\models\forms\DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $flip		= false;
	public $flipClass	= 'block-newsletter-flip';

	public $split		= false;
	public $splitClass	= 'block-newsletter-split';
	public $splitRight	= false;

    public $btnText	= "Join Us";

	public $labels = false;

	public $spinner = 'cmti cmti-3x cmti-spinner-10';

	public $templateDir = null;
	public $template	= 'default';

	public $ajaxUrl	= 'newsletter/site/sign-up'; // CMT App Request - Submit Path

	// CMT JS Framework to handle ajax request
	public $cmtApp			= 'core';
    public $cmtController	= 'default';
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
			[ [ 'flip', 'split', 'splitRight', 'labels' ], 'boolean' ],
			[ [ 'flipClass', 'splitClass', 'btnText', 'spinner', 'template', 'cmtApp', 'cmtController', 'cmtAction' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ],
			[ [ 'templateDir', 'ajaxUrl' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxLargeText ]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {

		return [
			'btnText' => 'Button Text',
			'spinner' => 'Spinner',
			'ajaxUrl' => 'AJAX Url',
			'cmtApp' => 'AJAX Application',
			'cmtController' => 'AJAX Controller',
			'cmtAction' => 'AJAX Action',
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// NewsletterConfig ----------------------

	public function generateConfig( $params = [] ) {

		$config[ 'btnText' ]	= $this->btnText;
		$config[ 'labels' ]		= $this->labels;
		$config[ 'spinner' ]	= $this->spinner;

		$config[ 'templateDir' ]	= $this->templateDir;
		$config[ 'template' ]		= $this->template;

		$config[ 'ajaxUrl' ]	= $this->ajaxUrl;
		$config[ 'cmtApp' ]		= $this->cmtApp;

		$config[ 'cmtController' ] = $this->cmtController;

		$config[ 'cmtAction' ] = $this->cmtAction;

		return $config;
	}

}
