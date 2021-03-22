<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\templates\breeze\models\cms\config\element\card;

// Yii Imports
use Yii;

/**
 * TextConfig provide text configuration data.
 *
 * @since 1.0.0
 */
class TextConfig extends \cmsgears\core\common\models\forms\DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $flip		= false;
	public $flipClass	= 'card-text-flip';

	public $split		= false;
	public $splitClass	= 'card-text-split';
	public $splitRight	= false;

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
			[ [ 'flip', 'split', 'splitRight' ], 'boolean' ],
			[ [ 'flipClass', 'splitClass' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ]
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// TextConfig ----------------------------

}
