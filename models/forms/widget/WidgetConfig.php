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

// CMG Imports
use cmsgears\core\common\models\forms\DataModel;

/**
 * WidgetConfig provide widget config data.
 *
 * @since 1.0.0
 */
class WidgetConfig extends DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// HTML Wrapper
	public $wrap	= false;
	public $wrapper = 'div';
	public $options = '{}';

	// Assets
	public $loadAssets = false;

	// Template
	public $templateDir = null;
	public $template	= 'default';

	// Service Factory
	public $factory = true;

	// Cache
	public $cache		= false;
	public $cacheDb		= false;
	public $cacheFile	= false;

	// Ajax Loading
	public $autoload			= false;
	public $autoloadTemplate	= 'autoload';

	// Autoload Handler - Velocity Framework
	public $autoloadApp			= 'autoload';
	public $autoloadController	= 'autoload';
	public $autoloadAction		= 'autoload';
	public $autoloadUrl			= null;

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

		$rules = [
			// Text Limits
			[ [ 'wrapper', 'templateDir', 'template', 'autoloadTemplate' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ],
			[ [ 'autoloadApp', 'autoloadController', 'autoloadAction' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ],
			[ [ 'templateDir', 'autoloadUrl' ], 'string', 'min' => 1, 'max' => Yii::$app->core->largeText ],
			[ [ 'options' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xtraLargeText ],
			// Others
			[ [ 'wrap', 'loadAssets', 'factory', 'cache', 'cacheDb', 'cacheFile', 'autoload' ], 'boolean' ]
		];

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

	// WidgetConfig --------------------------

	/**
	 * Generate the actual configuration passed to the widget while calling it's render.
	 */
	public function generateConfig( $params = [] ) {

		if( property_exists( $this, 'model' ) ) {

			$this->model = isset( $params[ 'model' ] ) ? $params[ 'model' ] : null;
		}

		$config = [
			// HTML Wrapper
			'wrap' => $this->wrap,
			'wrapper' => $this->wrapper,
			'options' => json_decode( $this->options, true ),
			// Assets
			'loadAssets' => $this->loadAssets,
			// Template
			'templateDir' => $this->templateDir,
			'template' => $this->template,
			// Service Factory
			'factory' => $this->factory,
			// Cache
			'cache' => $this->cache,
			'cacheDb' => $this->cacheDb,
			'cacheFile' => $this->cacheFile,
			// Ajax Loading
			'autoload' => $this->autoload,
			'autoloadTemplate' => $this->autoloadTemplate,
			// Autoload Handler - Velocity Framework
			'autoloadApp' => $this->autoloadApp,
			'autoloadController' => $this->autoloadController,
			'autoloadAction' => $this->autoloadAction,
			'autoloadUrl' => $this->autoloadUrl
		];

		return $config;
	}

}
