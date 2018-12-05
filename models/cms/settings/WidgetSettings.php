<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\templates\breeze\models\cms\settings;

// Yii Imports
use Yii;

// CMG Imports
use cmsgears\core\common\models\forms\DataModel;

/**
 * WidgetSettings provide widget settings data.
 *
 * @since 1.0.0
 */
class WidgetSettings extends DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// Avatar
	public $defaultAvatar;

	// Background
	public $defaultBanner;
	public $bkg;
	public $bkgClass;

	// Texture
	public $texture;

	// Header
	public $header; // Show Header
	public $headerIcon; // Show Header Icon using Model Avatar/Icon
	public $headerTitle; // Show Header Title using Model Title
	public $headerIconUrl; // Show Header Icon using Icon Url irrespective of Model Avatar/Icon

	// Content
	public $content; // Show content
	public $contentTitle; // Show Model Title within content
	public $contentInfo; // Show Model Description within content
	public $contentSummary; // Show Model Summary within content
	public $contentData; // Show Model Content within content

	public $contentClass;
	public $contentDataClass;

	public $styles;

	// Attributes
	public $metas;
	public $metaType;

	public $metaWrapClass;

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
			[ 'styles', 'safe' ],
			[ [ 'defaultAvatar', 'defaultBanner', 'bkg', 'texture' ], 'boolean' ],
			[ [ 'header', 'headerIcon', 'headerTitle' ], 'boolean' ],
			[ [ 'content', 'contentTitle', 'contentInfo', 'contentSummary', 'contentData', 'metas' ], 'boolean' ],
			[ [ 'bkgClass', 'contentClass', 'contentDataClass', 'metaType' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxxLargeText ],
			[ 'metaWrapClass', 'string', 'min' => 1, 'max' => Yii::$app->core->xxxLargeText ],
			[ 'headerIconUrl', 'url' ]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {

		return [
			'bkg' => 'Background',
			'bkgClass' => 'Background Class',
			'metas' => 'Attributes',
			'metaType' => 'Attribute Type',
			'metaWrapClass' => 'Attribute Wrap Class'
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// WidgetSettings ------------------------

}
