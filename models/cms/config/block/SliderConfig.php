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
 * SliderConfig provide slider configuration data.
 *
 * @since 1.0.0
 */
class SliderConfig extends \cmsgears\core\common\models\forms\DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $flip		= false;
	public $flipClass	= 'block-slider-flip';

	public $split		= false;
	public $splitClass	= 'block-slider-split';
	public $splitRight	= false;

	// Controls
	public $lControlContent = '<i class="fa fa-angle-left valign-center"></i>';
	public $rControlContent = '<i class="fa fa-angle-right valign-center"></i>';

	public $circular = true;

	// Image Size
	public $mediumImage = true;

	// Callback - Content is less than slider
	public $smallerContent;

	// Listener Callback for slide click
	public $onSlideClick;

	// Listener Callback for pre and post processing
	public $preSlideChange;
	public $postSlideChange;

	// Collage
	public $collage			= false;
	public $collageClass	= 'slider-collage-5';
	public $collageLimit	= 5;
	public $collageConfig;

	// Lightbox
	public $lightbox		= false;
	public $lightboxId;
	public $lightboxPopup	= false;

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
			[ 'collageConfig', 'safe' ],
			[ [ 'flip', 'split', 'splitRight', 'circular', 'mediumImage', 'collage', 'lightbox', 'lightboxPopup' ], 'boolean' ],
			[ 'collageLimit', 'number', 'integerOnly' => true, 'min' => 1 ],
			[ [ 'flipClass', 'splitClass' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ],
			[ [ 'smallerContent', 'onSlideClick', 'preSlideChange', 'postSlideChange', 'collageClass', 'lightboxId' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ],
			[ [ 'lControlContent', 'rControlContent' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xtraLargeText ]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {

		return [
			'lControlContent' => 'Left Control Content',
			'rControlContent' => 'Right Control Content',
			'circular' => 'Circular',
			'mediumImage' => 'Use Medium Image',
			'smallerContent' => 'Low Content Callback',
			'onSlideClick' => 'Slick Click Callback',
			'preSlideChange' => 'Pre Slide Change Callback',
			'postSlideChange' => 'Post Slide Change Callback',
			'collage' => 'Form Collage',
			'collageLimit' => 'Collage Limit',
			'collageConfig' => 'Collage Configuration',
			'lightbox' => 'Use Lightbox',
			'lightboxId' => 'Lightbox Selector Id',
			'lightboxPopup' => 'Include Lightbox'
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// SliderConfig --------------------------

}
