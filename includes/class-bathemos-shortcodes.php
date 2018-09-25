<?php
/**
 * Shortcodes classes handling.
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
Bathemos_Shortcodes::init();



//////////////////////////////////////////////////
/**
 * Shortcodes classes handling.
 *
 * @since 1.0.0
 */
class Bathemos_Shortcodes {

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
		add_action( 'after_setup_theme', array( __CLASS__, 'set_data' ), 25, 1 );
		
		// Provide data.
		add_filter( 'bathemos_shortcodes', array( __CLASS__, 'get_data' ), 10, 1 );
		add_filter( 'bathemos_shortcodes_list', array( __CLASS__, 'get_list' ), 50, 1 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collecting data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Sets active shortcodes sources and data.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_data() {
		
		self::$data = array();
		
		// Get default data.
		$sources = apply_filters( 'bathemos_defaults', null, 'shortcodes' );
		
		foreach ( $sources as $item ) {
			
			$item = (string) $item;
			
			// Format data.
			$source = apply_filters( 'bathemos_formatted_source', null );
			
			$source['tag'] = 'shortcodes';
			$source['id'] = $item;
			
			
			// Get item source.
			$source = apply_filters( 'bathemos_source', $source, $use_default = false );
			
			if ( ! $source['path'] ) {
				
				continue;
			}
			
			
			self::$data[ $item ] = $source;
		}
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns shortcodes classes list.
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
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns active shortcodes list.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 *
	 * @return array
	 */
	static function get_list( $content = null ) {
		
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}