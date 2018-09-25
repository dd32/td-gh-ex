<?php
/**
 * Menus handling.
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
Bathemos_Menus::init();



//////////////////////////////////////////////////
/**
 * Menus handling.
 *
 * @since 1.0.0
 */
class Bathemos_Menus {

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
		add_filter( 'bathemos_menus', array( __CLASS__, 'get_data' ), 10, 1 );
		add_filter( 'bathemos_theme_menus', array( __CLASS__, 'get_data' ), 10, 1 );
		add_filter( 'bathemos_admin_menu', array( __CLASS__, 'get_data' ), 10, 1 );
		add_filter( 'bathemos_admin_menus', array( __CLASS__, 'get_data' ), 10, 1 );
		add_filter( 'bathemos_menu_location', array( __CLASS__, 'get_menu_location' ), 10, 2 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collecting data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Sets menus lists.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_data() {
		
		$menus = apply_filters( 'bathemos_defaults', null, 'menus' );
		
		self::$data = array(
			'theme' => $menus['theme'],
			'admin' => $menus['admin'],
		);
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns menus list.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param string $data_tag Menus list tag.
	 *
	 * @return array
	 */
	static function get_data( $content = null, $data_tag = null ) {
		
		$data_tag = apply_filters( 'bathemos_core_input', $data_tag );
		
		if ( ! $data_tag ) {
			
			// Try to get menus tag from the current filter.
			$data_tag = substr( current_filter(), strlen( BATHEMOS_SLUG . '_' ) );
		}
		
		if ( ! $data_tag ) {
			
			return self::$data;
		}
		
		switch ( $data_tag ) {
			
			case 'theme':
			case 'menus':
			case 'theme_menus':
				return self::$data['theme'];
				break;
			
			case 'admin':
			case 'admin_menu':
			case 'admin_menus':
				return self::$data['admin'];
				break;
			
			default:
				return self::$data;
		}
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns menu theme location name.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Content to filter.
	 * 
	 * @return string
	 */
	static function get_menu_location( $content = null ) {
		
		$content = apply_filters( 'bathemos_core_input', $content );
		
		$menus = array_keys( self::$data['theme'] );
		
		if ( ( ! $content ) || ( ! in_array( $content, $menus ) ) ) {
			
			$content = $menus[0];
		}
		
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}