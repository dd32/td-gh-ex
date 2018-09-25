<?php
/**
 * Flags handler.
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
Bathemos_Flags::init();



//////////////////////////////////////////////////
/**
 * Flags handler.
 *
 * @since 1.0.0
 */
class Bathemos_Flags {

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
		
		// Collect data.
		add_action( 'bathemos_set_flag', array( __CLASS__, 'set_data' ), 10, 2 );
		
		// Provide data.
		add_filter( 'bathemos_flag', array( __CLASS__, 'get_data' ), 10, 2 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collecting data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Sets current flag.
	 *
	 * @since 1.0.0
	 *
	 * @param string $flag Flag name.
	 * @param misc $value Flag value.
	 *
	 * @return null
	 */
	static function set_data( $flag, $value = null ) {
		
		$flag = apply_filters( 'bathemos_core_input', $flag );
		$value = apply_filters( 'bathemos_core_input', $value );
		
		if ( $flag ) {
			
			self::$data[ $flag ] = $value;
		}
		
		return null;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Providing data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Gets flag value.
	 *
	 * @since 1.0.0
	 *
	 * @param misc $content Content to filter.
	 * @param misc $flag Flag name.
	 *
	 * @return misc
	 */
	static function get_data( $content, $flag ) {
		
		$flag = apply_filters( 'bathemos_core_input', $flag );
		
		if ( isset( self::$data[ $flag ] ) ) {
			
			return self::$data[ $flag ];
		}
		
		return null;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}