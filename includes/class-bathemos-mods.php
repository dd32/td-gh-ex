<?php
/**
 * Mods manager.
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
Bathemos_Mods::init();



//////////////////////////////////////////////////
/**
 * Keeps search paths.
 * Keeps mods info.
 * Arranges mods accordingly to their priority.
 *
 * @since 1.0.0
 */
class Bathemos_Mods {

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
		add_action( 'after_setup_theme', array( __CLASS__, 'set_data' ), 10, 1 );
		
		// Provide data.
		add_filter( 'bathemos_mods_list', array( __CLASS__, 'get_mods_list' ), 10, 2 );
		add_filter( 'bathemos_mods_paths', array( __CLASS__, 'get_mods_paths' ), 10, 2 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collecting data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Sets mods list and paths.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_data() {
		
		// Collect mods info.
		self::$data['list'] = (array) apply_filters( 'bathemos_mods', null );
		
		
		// Arrange mods accordingly to their priority.
		$arranged_mods = self::$data['list'];
		
		uasort( $arranged_mods, array( __CLASS__, 'compare_priority' ) );
		
		
		// Set mods paths.
		self::$data['paths'] = array();
		
		foreach ( $arranged_mods as $mod ) {
			
			$path['id'] = isset( $mod['id'] ) ? $mod['id'] : 'unidentified';
			$path['dir'] = isset( $mod['dir'] ) ? $mod['dir'] : '';
			$path['url'] = isset( $mod['url'] ) ? $mod['url'] : '';
			
			if ( ( ! $path['dir'] ) && ( ! $path['url'] ) ) {
				
				continue;
			}
			
			self::$data['paths'][ $mod['id'] ] = $path;
		}
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Providing data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns mods list.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return array
	 */
	static function get_mods_list( $content ) {
		
		$content = self::$data['list'];
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns arranged mods paths.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return array
	 */
	static function get_mods_paths( $content ) {
		
		$content = self::$data['paths'];
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns comparison of the two array elements.
	 *
	 * Elements must have the 'priority' attr.
	 *
	 * @since 1.0.0
	 *
	 * @param array $a First element to compare.
	 * @param array $b Second element to compare.
	 * 
	 * @return bool
	 */
	static function compare_priority( $a, $b ) {
		
		if ( ( isset( $a['priority'] ) ) && ( isset( $b['priority'] ) ) ) {
			
			return strnatcmp( $a['priority'], $b['priority'] );
			
		} else {
			
			return 0;
		}
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}