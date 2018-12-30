<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\google\analytics\config;

// CMG Imports
use cmsgears\core\common\config\Properties;

/**
 * GoogleAnalyticsProperties provide methods to access the properties specific to Google Analytics.
 *
 * The global code will be used if Google Analytics is enabled on global level.
 *
 * @since 1.0.0
 */
class GoogleAnalyticsProperties extends Properties {

	// Variables ---------------------------------------------------

	// Globals ----------------

	const CONFIG_GOOGLE_ANALYTICS	= 'google-analytics';

	const PROP_GLOGAL				= 'global';

	const PROP_GLOGAL_CODE			= 'global_code';

	// Public -----------------

	// Protected --------------

	// Private ----------------

	private static $instance;

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	/**
	 * Return Singleton instance.
	 */
	public static function getInstance() {

		if( !isset( self::$instance ) ) {

			self::$instance	= new GoogleAnalyticsProperties();

			self::$instance->init( self::CONFIG_GOOGLE_ANALYTICS );
		}

		return self::$instance;
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// GoogleAnalyticsProperties -------------

	/**
	 * Check whether Google Analytics is enabled on global level.
	 *
	 * @return boolean
	 */
	public function isGlobal() {

		return $this->properties[ self::PROP_GLOGAL ];
	}

	/**
	 * Returns the global code.
	 * 
	 * @return boolean
	 */
	public function getGlobalCode() {

		return $this->properties[ self::PROP_GLOGAL_CODE ];
	}

}
