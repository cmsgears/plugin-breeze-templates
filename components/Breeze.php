<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\templates\breeze\components;

// Yii Imports
use Yii;

/**
 * The breeze component initialize Breeze templates.
 *
 * @since 1.0.0
 */
class Breeze extends \yii\base\Component {

	// Global -----------------

	// Public -----------------

	// Protected --------------

	// Private ----------------

	// Constructor and Initialisation ------------------------------

	public function init() {

		parent::init();

		Yii::setAlias( 'breeze', dirname( __DIR__ ) );

		Yii::setAlias( 'breezeTemplates', dirname( __DIR__ ) . '/templates' );
	}

	// Instance methods --------------------------------------------

	// Yii parent classes --------------------

	// CMG parent classes --------------------

	// Breeze --------------------------------

}
