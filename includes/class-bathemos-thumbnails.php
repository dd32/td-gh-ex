<?php
/**
 * Thumbnails support.
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
Bathemos_Thumbnails::init();



//////////////////////////////////////////////////
/**
 * Thumbnails support.
 *
 * @since 1.0.0
 */
class Bathemos_Thumbnails {

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
		add_action( 'after_setup_theme', array( __CLASS__, 'set_data' ), 20, 1 );
		
		// Provide data.
		add_filter( 'bathemos_image_sizes', array( __CLASS__, 'get_data' ), 10, 1 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collect data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Temp.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_data() {
		
		self::$data = array();
		
		$sizes = apply_filters( 'bathemos_defaults', null, 'image_sizes' );
		
		foreach ( $sizes as $item_id => $item_data ) {
			
			$item_id = apply_filters( 'bathemos_valid_array_id', $item_id, $item_data );
			
			if ( ! $item_id ) {
				
				continue;
			}
			
			
			$defaults = array(
				'width' => 300,
				'height' => 200,
				'crop' => true,
			);
			
			$item_data = wp_parse_args( (array) $item_data, $defaults );
			
			
			self::$data[ $item_id ] = $item_data;
		}
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns image sizes list.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 *
	 * @return array
	 */
	static function get_data( $content = null ) {
		
		return self::$data;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}