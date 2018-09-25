<?php
/**
 * Template components handling.
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
Bathemos_Components::init();



//////////////////////////////////////////////////
/**
 * Template components handling:
 * page parts, styles sets, styles templates, etc.
 *
 * @since 1.0.0
 */
class Bathemos_Components {

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
		add_filter( 'bathemos_components', array( __CLASS__, 'get_data' ), 10, 1 );
		add_filter( 'bathemos_component', array( __CLASS__, 'get_component' ), 10, 2 );
		add_filter( 'bathemos_components_altering', array( __CLASS__, 'get_components_altering' ), 10, 2 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collecting data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Sets components list filled with data.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_data() {
		
		self::$data = array();
		
		$sources = apply_filters( 'bathemos_defaults', null, 'components' );
		
		foreach ( $sources as $item_id => $item_data ) {
			
			$item_id = apply_filters( 'bathemos_valid_array_id', $item_id, $item_data );
			
			if ( ! $item_id ) {
				
				continue;
			}
			
			
			// Format data.
			$source = apply_filters( 'bathemos_formatted_source', $item_data );
			
			$source['tag'] = $item_id;
			
			if ( ! $source['id'] ) {
				
				$source['id'] = $source['default'];
			}
			
			
			// Get item source.
			$source = apply_filters( 'bathemos_source', $source, $use_default = true );
			
			
			self::$data[ $item_id ] = $source;
		}
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns components list.
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
	 * Returns specific component data.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param string $tag Component tag.
	 *
	 * @return array
	 */
	static function get_component( $content, $tag ) {
		
		$tag = apply_filters( 'bathemos_core_input', $tag );
		
		if ( isset( self::$data[ $tag ] ) ) {
			
			return self::$data[ $tag ];
		}
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns components list altered by the gived array.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param array $altering Altering array.
	 *
	 * @return array
	 */
	static function get_components_altering( $content, $altering = array() ) {
		
		foreach ( $altering as $item_tag => $item_id ) {
			
			$source = array();
			$source['tag'] = $item_tag;
			$source['id'] = $item_id;
			
			$source = apply_filters( 'bathemos_source', $source, $use_default = false );
			
			if ( ( $source['path'] ) || ( $item_id == 'custom' ) ) {
				
				$content[ $item_tag ] = $source;
			}
		}
		
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}