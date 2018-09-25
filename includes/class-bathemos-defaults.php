<?php
/**
 * Theme's defaults.
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
Bathemos_Defaults::init();



//////////////////////////////////////////////////
/**
 * Collects and provides theme's default data.
 *
 * @since 1.0.0
 */
class Bathemos_Defaults {

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
		add_action( 'after_setup_theme', array( __CLASS__, 'set_data' ), 10, 1 );
		
		
		//////////////////////////////////////////////////
		/**
		 * Provide data.
		 */
		add_filter( 'bathemos_defaults', array( __CLASS__, 'get_data' ), 10, 2 );
	}

	
	
	////////////////////////////////////////////////////////////
	//// Collecting data.
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
		
		// Get data from the defines.
		self::$data = apply_filters( 'bathemos_defines', self::$data );
		
		
		// Format data.
		$components = array(
			'assets',
			'components',
			'custom_styles',
			'grid',
			'grid_classes',
			'image_sizes',
			'layouts',
			'menus',
			'options',
			'panels',
			'post_types',
			'root_sources',
			'shortcodes',
			'slugs',
			'styles',
			'texts',
		);
		
		foreach ( $components as $component ) {
			
			if ( ( ! isset( self::$data[ $component ] ) ) || ( ! is_array( self::$data[ $component ] ) ) ) {
				
				self::$data[ $component ] = array();
			}
		}
		
		
		// Sanitize data.
		self::$data = apply_filters( 'bathemos_template_input', self::$data );
		//echo '<pre>'; print_r( self::$data ); echo '</pre>';
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Providing data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Returns specific default data.
	 *
	 * @since 1.0.0
	 * 
	 * @param string $content Content to filter.
	 * @param string $data_id Data to find.
	 *
	 * @return array
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