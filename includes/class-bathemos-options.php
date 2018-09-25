<?php
/**
 * Theme options.
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
Bathemos_Options::init();



//////////////////////////////////////////////////
/**
 * Keeps and provides theme options.
 *
 * @since 1.0.0
 */
class Bathemos_Options {

	////////////////////////////////////////////////////////////
	//// Setup section.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Internal variables.
	 */
	private static $data = array();
	
	
	//////////////////////////////////////////////////
	/**
	 * Setup function.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function init() {
		
		//////////////////////////////////////////////////
		/**
		 * Collect data.
		 */
		add_action( 'after_setup_theme', array( __CLASS__, 'set_data' ), 20, 1 );
		
		//////////////////////////////////////////////////
		/**
		 * Provide data.
		 */
		add_filter( 'bathemos_settings', array( __CLASS__, 'get_data' ), 10, 1 );
		add_filter( 'bathemos_options', array( __CLASS__, 'get_data' ), 10, 1 );
		add_filter( 'bathemos_option', array( __CLASS__, 'get_data' ), 10, 2 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collect data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Sets from defines default theme options, slugs, and layout set.
	 *
	 * @since 1.0.0
	 *
	 * @param array $defines List of defines.
	 * 
	 * @return null
	 */
	static function set_data() {
		
		// Get default options.
		$defaults = (array) apply_filters( 'bathemos_defaults', null, 'options' );
		
		// Get stored options.
		$options = (array) get_option( BATHEMOS_SETTINGS );
		
		// Merge them with ones from storage.
		self::$data = wp_parse_args( $options, $defaults );
		//echo '<pre>'; print_r( self::$data ); echo '</pre>'; exit();
		
		// Update option.
		if ( is_admin() ) {
			
			update_option( BATHEMOS_SETTINGS, self::$data );
		}
	}
	
	
	
	/////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns specific theme option.
	 *
	 * Returns all options as an array if no specific option was stated.
	 *
	 * @since 1.0.0
	 * 
	 * @param string $content Content to filter.
	 * @param string $data_id Data to find.
	 *
	 * @return misc
	 */
	static function get_data( $content = null, $data_id = null ) {
		
		$data_id = apply_filters( 'bathemos_core_input', $data_id );
		
		
		if ( ( $data_id ) && ( isset( self::$data[ $data_id ] ) ) ) {
			
			$content = self::$data[ $data_id ];
			
		} elseif ( ! $data_id ) {
			
			$content = self::$data;
		}
		
		
		return $content;
	}
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}