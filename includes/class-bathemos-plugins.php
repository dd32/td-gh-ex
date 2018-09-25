<?php
/**
 * Required plugins handeling.
 *
 * @package BA Tours
 */

if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
}



//////////////////////////////////////////////////
/**
 * Calling to setup class.
 */
Bathemos_Plugins::init();



//////////////////////////////////////////////////
/**
 * Required plugins handeling.
 *
 * @since 1.0.0
 */
class Bathemos_Plugins{

	////////////////////////////////////////////////////////////
	//// Setup section.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Setup function.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function init() {
		
		// Register data.
		add_action( 'tgmpa_register', array( __CLASS__, 'register_required_plugins' ), 10, 1 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Setup data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Registers the required plugins.
	 *
	 * The variables passed to the `tgmpa()` function should be:
	 * - an array of plugin arrays;
	 * - optionally a configuration array.
	 *
	 * This function is hooked into `tgmpa_register`, which is
	 * fired on the WP `init` action on priority 10.
	 *
	 * @see http://tgmpluginactivation.com/configuration/
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function register_required_plugins() {
		
		//////////////////////////////////////////////////
		/**
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = apply_filters( 'bathemos_defaults', array(), 'plugins' );
		
		
		//////////////////////////////////////////////////
		/**
		 * Array of configuration settings.
		 */
		$config = array(
			'id'           => BATHEMOS_SLUG,              // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                         // Default absolute path to bundled plugins.
			'menu'         => 'install-required-plugins', // Menu slug.
			'has_notices'  => true,                       // Show admin notices or not.
			'dismissable'  => true,                       // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                         // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                      // Automatically activate plugins after installation or not.
			'message'      => '',                         // Message to output right before the plugins table.
		);
		
		
		//////////////////////////////////////////////////
		/**
		 * Register plugins.
		 */
		tgmpa( $plugins, $config );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}