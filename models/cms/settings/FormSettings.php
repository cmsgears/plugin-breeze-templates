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
 * FormSettings provide form settings data.
 *
 * @since 1.0.0
 */
class FormSettings extends \cmsgears\core\common\models\forms\DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// Avatar & Banner
	public $defaultAvatar;
	public $lazyAvatar; // Lazy load model avatar
	public $resAvatar; // Responsive model avatar
	public $defaultBanner;
	public $lazyBanner; // Lazy load banner
	public $resBanner;

	// Banner
	public $fixedBanner;
	public $scrollBanner;
	public $parallaxBanner;
	public $fluidBanner;
	public $background;
	public $backgroundClass;
	public $backgroundVideo;

	// Texture
	public $texture;

	// Header
	public $header; // Show Header
	public $headerIcon; // Show Header Icon using Model Avatar/Icon
	public $headerTitle; // Show Header Title using Model Title
	public $headerInfo; // Show Header Info using Model Description
	public $headerContent; // Show Header Content using Model Summary
	public $headerIconUrl; // Show Header Icon using Icon Url irrespective of Model Avatar/Icon
	public $headerFluid;
	public $headerBanner;
	public $headerGallery;
	public $headerScroller;
	public $headerElements;
	public $headerElementType;

	// Content
	public $content; // Show content
	public $contentTitle; // Show Model Title within content
	public $contentInfo; // Show Model Description within content
	public $contentSummary; // Show Model Summary within content
	public $contentData; // Show Model Content within content

	public $maxCover;

	public $contentAvatar;
	public $contentBanner;
	public $contentGallery;

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
	public $footerElements;
	public $footerElementType;

	// Form
	public $formClass;
	public $formCaptchaAction;
	public $wrapCaptcha = true;
	public $wrapActions = true;
	public $labels = true;
	public $split4060 = true;

	// Elements
	public $elements;
	public $elementsBeforeContent;
	public $elementsWithContent;
	public $elementsOrder;
	public $elementType;

	public $boxWrapClass;
	public $boxWrapper;
	public $boxClass;

	// Widgets
	public $widgets;
	public $widgetsBeforeContent;
	public $widgetsWithContent;
	public $widgetsOrder;
	public $widgetType;

	public $widgetWrapClass;
	public $widgetWrapper;
	public $widgetClass;

	// Blocks
	public $blocks;
	public $blocksBeforeContent;
	public $blocksWithContent;
	public $blocksOrder;
	public $blockType;

	// Sidebars
	public $sidebars;
	public $sidebarsBeforeContent;
	public $sidebarsWithContent;
	public $sidebarsOrder;
	public $sidebarType;

	// Fixed sidebars
	public $topSidebar;
	public $topSidebarSlugs;
	public $bottomSidebar;
	public $bottomSidebarSlugs;
	public $leftSidebar;
	public $leftSidebarSlug;
	public $rightSidebar;
	public $rightSidebarSlug;
	public $footerSidebar;
	public $footerSidebarSlug;

	// Purify
	public $purifySummary = true;
	public $purifyContent = true;

	// Files
	public $files;
	public $filesWithContent;
	public $filesOrder;
	public $fileTypes;

	public $fileWrapClass;
	public $fileWrapper;
	public $fileClass;

	// AMP
	public $amp;
	public $ampGoogleScripts;
	public $ampScriptUrl;
	public $ampStylePath;
	public $ampSchema;
	public $ampMetas;

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
			[ [ 'footerContentData', 'styles', 'scripts' ], 'safe' ],
			[ [ 'defaultAvatar', 'lazyAvatar', 'resAvatar', 'defaultBanner', 'lazyBanner', 'resBanner' ], 'boolean' ],
			[ [ 'fixedBanner', 'scrollBanner', 'parallaxBanner', 'fluidBanner', 'background', 'texture', 'maxCover' ], 'boolean' ],
			[ [ 'elements', 'widgets', 'blocks' ], 'boolean' ],
			[ [ 'header', 'headerIcon', 'headerTitle', 'headerInfo', 'headerContent', 'headerBanner', 'headerFluid', 'headerGallery', 'headerScroller', 'headerElements' ], 'boolean' ],
			[ [ 'content', 'contentTitle', 'contentInfo', 'contentSummary', 'contentData', 'contentAvatar', 'contentBanner', 'contentGallery' ], 'boolean' ],
			[ [ 'footer', 'footerIcon', 'footerTitle', 'footerInfo', 'footerContent', 'footerElements' ], 'boolean' ],
			[ [ 'sidebars', 'topSidebar', 'bottomSidebar', 'leftSidebar', 'rightSidebar' ], 'boolean' ],
			[ [ 'elementsBeforeContent', 'widgetsBeforeContent', 'blocksBeforeContent', 'sidebarsBeforeContent' ], 'boolean' ],
			[ [ 'elementsWithContent', 'widgetsWithContent', 'blocksWithContent', 'sidebarsWithContent', 'filesWithContent' ], 'boolean' ],
			[ [ 'wrapCaptcha', 'wrapActions', 'labels', 'split4060' ], 'boolean' ],
			[ [ 'amp' ], 'boolean' ],
			[ [ 'backgroundVideo', 'purifySummary', 'purifyContent', 'files' ], 'boolean' ],
			[ [ 'elementType', 'headerElementType', 'footerElementType', 'widgetType', 'blockType', 'sidebarType', 'boxWrapper', 'widgetWrapper', 'fileWrapper', 'fileTypes' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ],
			[ 'formCaptchaAction', 'string', 'min' => 1, 'max' => Yii::$app->core->xLargeText ],
			[ [ 'backgroundClass', 'contentClass', 'contentDataClass', 'boxWrapClass', 'boxClass', 'widgetWrapClass', 'widgetClass', 'fileWrapClass', 'fileClass', 'formClass' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxxLargeText ],
			[ [ 'footerIconClass', 'footerTitleData' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxxLargeText ],
			[ [ 'topSidebarSlugs', 'bottomSidebarSlugs', 'leftSidebarSlug', 'rightSidebarSlug' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxxLargeText ],
			[ 'footerInfoData' , 'string', 'min' => 1, 'max' => Yii::$app->core->xtraLargeText ],
			[ [ 'elementsOrder', 'widgetsOrder', 'blocksOrder', 'sidebarsOrder', 'filesOrder' ], 'number', 'integerOnly' => true, 'min' => 0 ],
			[ [ 'headerIconUrl', 'footerIconUrl' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxLargeText ],
			[ [ 'ampGoogleScripts', 'ampSchema', 'ampMetas' ] , 'string', 'min' => 1, 'max' => Yii::$app->core->xtraLargeText ],
			[ [ 'ampScriptUrl', 'ampStylePath' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxxLargeText ]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {

		return [
			'lazyAvatar' => 'Lazy Load Avatar',
			'resAvatar' => 'Responsive Avatar',
			'lazyBanner' => 'Lazy Load',
			'resBanner' => 'Responsive',
			'headerInfo' => 'Header Description',
			'headerContent' => 'Header Summary',
			'headerFluid' => 'Fluid Header',
			'contentInfo' => 'Content Description',
			'amp' => 'AMP Page',
			'ampGoogleScripts' => 'Google Script Tags',
			'ampScriptUrl' => 'Script URL',
			'ampStylePath' => 'Style Path',
			'ampSchema' => 'Schema Tags',
			'ampMetas' => 'Meta Tags'
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// FormSettings --------------------------

}
