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
 * BlockSettings provide block settings data.
 *
 * @since 1.0.0
 */
class BlockSettings extends \cmsgears\core\common\models\forms\DataModel {

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
	public $fixedBkg;
	public $scrollBkg;
	public $parallaxBkg;
	public $bkgClass;
	public $bkgVideo;
	public $bkgHeader;

	// Texture
	public $texture;

	// Header
	public $header; // Show Header
	public $headerIcon; // Show Header Icon using Model Avatar/Icon
	public $headerTitle; // Show Header Title using Model Title
	public $headerInfo; // Show Header Info using Model Description
	public $headerContent; // Show Header Content using Model Summary
	public $headerIconUrl; // Show Header Icon using Icon Url irrespective of Model Avatar/Icon
	public $headerClass;

	// Content
	public $content; // Show content
	public $contentTitle; // Show Model Title within content
	public $contentInfo; // Show Model Description within content
	public $contentSummary; // Show Model Summary within content
	public $contentData; // Show Model Content within content
	public $contentRaw; // Content without purifier

	public $maxCover;

	public $contentAvatar;
	public $contentBanner;

	public $contentClass;
	public $contentDataClass;

	public $styles;
	public $scripts;

	// Footer
	public $footer; // Show Footer
	public $footerIcon; // Show Footer Icon using Model Avatar/Icon
	public $footerIconClass; // Show Footer Icon using css class irrespective of Model Avatar/Icon
	public $footerIconUrl; // Show Footer Icon using Icon Url irrespective of Model Avatar/Icon
	public $footerTitle; // Show Footer Title using Model Title
	public $footerTitleData; // Show Footer Title using Title Data irrespective of Model Title
	public $footerInfo; // Show Footer Info using Model Description
	public $footerInfoData; // Show Footer Info using Info Data irrespective of Model Description
	public $footerContent; // Show Footer Content using Model Summary
	public $footerContentData; // Show Footer Content using Content Data irrespective of Model Summary

	// Attributes
	public $metas;
	public $metaTypes;

	public $metaWrapClass;

	// Elements
	public $elements;
	public $elementsBeforeContent;
	public $elementType;

	public $boxWrapClass;
	public $boxWrapper;
	public $boxClass;

	// Widgets
	public $widgets;
	public $widgetsBeforeContent;
	public $widgetType;

	public $widgetWrapClass;
	public $widgetWrapper;
	public $widgetClass;

	// Purify
	public $purifySummary = true;
	public $purifyContent = true;

	// Files
	public $files = false;

	public $fileTypes;

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
			[ [ 'contentRaw', 'footerContentData', 'styles', 'scripts' ], 'safe' ],
			[ [ 'defaultAvatar', 'lazyAvatar', 'resAvatar', 'defaultBanner', 'lazyBanner', 'resBanner' ], 'boolean' ],
			[ [ 'bkg', 'fixedBkg', 'scrollBkg', 'parallaxBkg', 'texture', 'maxCover' ], 'boolean' ],
			[ [ 'elements', 'elementsBeforeContent', 'widgets', 'widgetsBeforeContent' ], 'boolean' ],
			[ [ 'header', 'headerIcon', 'headerTitle', 'headerInfo', 'headerContent' ], 'boolean' ],
			[ [ 'content', 'contentTitle', 'contentInfo', 'contentSummary', 'contentData', 'contentAvatar', 'contentBanner', 'metas' ], 'boolean' ],
			[ [ 'footer', 'footerIcon', 'footerTitle', 'footerInfo', 'footerContent' ], 'boolean' ],
			[ [ 'bkgVideo', 'bkgHeader', 'purifySummary', 'purifyContent', 'files' ], 'boolean' ],
			[ [ 'metaTypes', 'elementType', 'widgetType', 'boxWrapper', 'widgetWrapper', 'fileTypes' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ],
			[ [ 'bkgClass', 'headerClass', 'contentClass', 'contentDataClass', 'boxWrapClass', 'boxClass', 'widgetWrapClass', 'widgetClass' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxxLargeText ],
			[ [ 'metaWrapClass', 'footerIconClass', 'footerTitleData' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxxLargeText ],
			[ 'footerInfoData' , 'string', 'min' => 1, 'max' => Yii::$app->core->xtraLargeText ],
			[ [ 'headerIconUrl', 'footerIconUrl' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxLargeText ]
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
			'fixedBkg' => 'Fixed Background',
			'scrollBkg' => 'Scrollable Background',
			'parallaxBkg' => 'Parallax Background',
			'bkgClass' => 'Background Class',
			'bkgVideo' => 'Background Video',
			'bkgHeader' => 'Background In Header',
			'lazyBanner' => 'Lazy Load',
			'resBanner' => 'Responsive',
			'headerInfo' => 'Header Description',
			'headerContent' => 'Header Summary',
			'contentInfo' => 'Content Description',
			'contentRaw' => 'Raw Content',
			'metas' => 'Attributes',
			'metaTypes' => 'Attribute Types',
			'metaWrapClass' => 'Attribute Wrap Class'
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// BlockSettings -------------------------

}
