<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\templates\breeze\models\forms\widget;

// Yii Imports
use Yii;

/**
 * PageConfig provide widget config data.
 *
 * @since 1.0.0
 */
class PageConfig extends PagingConfig {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $wrapperOptions	= '{ "class": "box-page-wrap row max-cols-50" }';
	public $singleOptions	= '{ "class": "box box-default box-page col col12x6 row" }';

	public $excludeParams = '{"params": [ "slug" ] }';

	// Widget to render
	public $widget = 'recent'; // featured, popular, recent, related, similar, category, tag

	// Single Model - Texture & Banner
	public $texture;
	public $defaultBanner = false;

	// Author, Category & Tag
	public $authorParam		= false;
	public $categoryParam	= false;
	public $tagParam		= false;

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

		$rules[] = [ [ 'widget', 'texture' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ];
		$rules[] = [ [ 'defaultBanner', 'authorParam', 'categoryParam', 'tagParam' ], 'boolean' ];

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

		$config = parent::generateConfig( $params );

		$config[ 'widget' ]			= $this->widget;
		$config[ 'texture' ]		= $this->texture;
		$config[ 'defaultBanner' ]	= $this->defaultBanner;
		$config[ 'authorParam' ]	= $this->authorParam;
		$config[ 'categoryParam' ]	= $this->categoryParam;
		$config[ 'tagParam' ]		= $this->tagParam;

		return $config;
	}

}
