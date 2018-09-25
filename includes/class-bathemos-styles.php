<?php
/**
 * Page components styles handeling.
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
Bathemos_Styles::init();



//////////////////////////////////////////////////
/**
 * Page components styles handeling.
 *
 * @since 1.0.0
 */
class Bathemos_Styles {

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
		add_action( 'bathemos_set_styles', array( __CLASS__, 'set_styles' ), 10, 1 );
		
		// Provide data.
		add_filter( 'bathemos_styles', array( __CLASS__, 'get_data' ), 10, 2 );
		add_filter( 'bathemos_style', array( __CLASS__, 'get_style' ), 10, 2 );
		add_action( 'bathemos_styles_altering', array( __CLASS__, 'get_styles_altering' ), 10, 2 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collect data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Sets default styles for the page components.
	 *
	 * @since 1.0.0
	 *
	 * @param array $data Styles data.
	 *
	 * @return null
	 */
	static function set_data( $data = array() ) {
		
		self::$data = (array) apply_filters( 'bathemos_defaults', null, 'styles' );
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Sets styles from input.
	 *
	 * @since 1.0.0
	 *
	 * @param array $data Styles data.
	 *
	 * @return null
	 */
	static function set_styles( $data = array() ) {
		
		self::$data = (array) $data;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns styles array.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	static function get_data() {
		
		return self::$data;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns styles for the specific page component.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param string $tag Page component tag.
	 *
	 * @return array
	 */
	static function get_style( $content = null, $tag ) {
		
		$tag = apply_filters( 'bathemos_template_input', $tag );
		
		
		if ( ( isset( self::$data[ $tag ] ) ) && ( self::$data[ $tag ] ) ) {
			
			$content = self::$data[ $tag ];
		}
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns altered styles array.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param array $altering Altering array.
	 *
	 * @return array
	 */
	static function get_styles_altering( $content = array(), $altering = array() ) {
		
		$content = (array) $content;
		$altering = (array) $altering;
		
		
		foreach ( $altering as $style_id => $style_data ) {
			
			$content[ $style_id ] = $style_data;
		}
		
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}