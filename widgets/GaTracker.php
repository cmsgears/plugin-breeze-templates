<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\google\analytics\widgets;

// CMG Imports
use cmsgears\google\analytics\config\GoogleAnalyticsProperties;

use cmsgears\core\common\base\Widget;

/**
 * GaTracker widget is pre-configured to add tracker code. It use the global code
 * as fallback in case the code is not provided.
 *
 * @since 1.0.0
 */
class GaTracker extends Widget {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $active;

	public $code;

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

    public function init() {

        parent::init();

        $properties 	= GoogleAnalyticsProperties::getInstance();

        $this->active	= isset( $this->active ) ? $this->active : $properties->isGlobal();

        $this->code		= isset( $this->code ) ? $this->code : $properties->getGlobalCode();
    }

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// GaTracker -----------------------------

    public function renderWidget( $config = [] ) {

    	return $this->render( $this->template, [ 'widget' => $this ] );
    }

}
