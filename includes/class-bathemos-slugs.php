<?php
/**
 * Theme and template slugs.
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
Bathemos_Slugs::init();



//////////////////////////////////////////////////
/**
 * Theme and template slugs.
 *
 * @since 1.0.0
 */
class Bathemos_Slugs {

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
		// Set slugs.
		add_action( 'after_setup_theme', array( __CLASS__, 'set_data' ), 15, 1 );
		// Filter data to the inner representation.
		add_filter( 'bathemos_slugs_tree', array( __CLASS__, 'apply_slugs_tree' ), 10, 3 );
		
		
		//////////////////////////////////////////////////
		/**
		 * Provide data.
		 */
		add_filter( 'bathemos_slugs', array( __CLASS__, 'get_data' ), 10, 1 );
		add_filter( 'bathemos_slug', array( __CLASS__, 'get_data' ), 10, 2 );
	}

	
	
	////////////////////////////////////////////////////////////
	//// Collecting data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Sets default theme options, slugs, and layout set
	 * from defines.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_data() {
		
		// Get default slugs tree.
		$defaults = apply_filters( 'bathemos_defaults', null, 'slugs' );
		
		// Convert slugs tree to an actual slugs.
		self::$data = apply_filters( 'bathemos_slugs_tree', self::$data, $defaults, $prefix = '' );
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns slugs array filled from slugs tree.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param array $slugs_tree Structured slugs.
	 * @param string $prefix Current prefix for slugs.
	 * 
	 * @return misc
	 */
	static function apply_slugs_tree( $content, $slugs_tree, $prefix = '' ) {
		
		foreach ( $slugs_tree as $item_name => $item_data ) {
			
			$content[ $item_name ] = $prefix . $item_data['slug'];
			
			if ( isset( $item_data['incl'] ) ) {
				
				$content = apply_filters( 'bathemos_slugs_tree', $content, $item_data['incl'], $prefix . $item_data['slug'] );
			}
		}
		
		
		return $content;
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