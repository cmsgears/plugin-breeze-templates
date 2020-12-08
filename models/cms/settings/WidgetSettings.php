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

/**
 * WidgetSettings provide widget settings data.
 *
 * @since 1.0.0
 */
class WidgetSettings extends \cmsgears\core\common\models\forms\DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// Avatar
	public $defaultAvatar;
	public $lazyAvatar; // Lazy load model avatar
	public $resAvatar; // Responsive model avatar

	// Background
	public $defaultBanner;
	public $lazyBanner;
	public $resBanner;
	public $bkg;
	public $bkgClass;
	public $bkgVideo;

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
	public $contentRaw; // Content without purifier

	public $contentClass;
	public $contentDataClass;

	public $styles;
	public $scripts;

	// Attributes
	public $metas;
	public $metaTypes;
	public $metaWrapClass;

	// Purify
	public $purifySummary = true;
	public $purifyContent = true;

	// Files
	public $files;
	public $fileTypes;
	public $fileWrapClass;

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
			[ [ 'contentRaw', 'styles', 'scripts' ], 'safe' ],
			[ [ 'defaultAvatar', 'lazyAvatar', 'resAvatar', 'defaultBanner', 'lazyBanner', 'resBanner', 'bkg', 'texture' ], 'boolean' ],
			[ [ 'header', 'headerIcon', 'headerTitle' ], 'boolean' ],
			[ [ 'content', 'contentTitle', 'contentInfo', 'contentSummary', 'contentData', 'metas' ], 'boolean' ],
			[ [ 'bkgVideo', 'purifySummary', 'purifyContent', 'files' ], 'boolean' ],
			[ [ 'metaTypes', 'fileTypes' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ],
			[ [ 'bkgClass', 'contentClass', 'contentDataClass' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxxLargeText ],
			[ [ 'metaWrapClass', 'fileWrapClass' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxxLargeText ],
			[ 'headerIconUrl', 'string', 'min' => 1, 'max' => Yii::$app->core->xxLargeText ]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {

		return [
			'lazyAvatar' => 'Lazy Load Avatar',
			'resAvatar' => 'Responsive Avatar',
			'bkg' => 'Background',
			'bkgClass' => 'Background Class',
			'bkgVideo' => 'Background Video',
			'lazyBanner' => 'Lazy Load',
			'resBanner' => 'Responsive',
			'headerInfo' => 'Header Description',
			'headerContent' => 'Header Summary',
			'contentInfo' => 'Content Description',
			'contentRaw' => 'Raw Content',
			'metas' => 'Attributes',
			'metaTypes' => 'Attribute Type',
			'metaWrapClass' => 'Attribute Wrap Class'
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// WidgetSettings ------------------------

}
