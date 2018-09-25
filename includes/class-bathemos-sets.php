<?php
/**
 * Template sets handeling.
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
Bathemos_Sets::init();



//////////////////////////////////////////////////
/**
 * Template sets handeling.
 *
 * @since 1.0.0
 */
class Bathemos_Sets {

	////////////////////////////////////////////////////////////
	//// Setup section.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Setup function.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function init() {
		
		// Provide data.
		add_filter( 'bathemos_formatted_set', array( __CLASS__, 'get_formatted_set' ), 10, 2 );
		add_filter( 'bathemos_custom_sets_list', array( __CLASS__, 'get_custom_sets_list' ), 10, 3 );
		add_filter( 'bathemos_custom_set_data', array( __CLASS__, 'get_custom_set_data' ), 10, 2 );
		add_filter( 'bathemos_color', array( __CLASS__, 'get_color' ), 10, 2 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns formatted set array.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return misc
	 */
	static function get_formatted_set( $content ) {
		
		$content = (array) $content;
		
		$defaults = array(
			'id' => 'default',
			'tag' => '',
			'prefix' => '',
			'name' => '',
			'desc' => '',
		);
		
		if ( empty( $content['meta'] ) ) {
			
			$content['meta'] = array();
		}
		
		$content['meta'] = wp_parse_args( $content['meta'], $defaults );
		
		
		$content['meta']['prefix'] = $content['meta']['tag'] . '_' . $content['meta']['id'] . '_';
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns sets list available by the tag filled with data.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param string $tag Set tag.
	 * @param bool $hide_default Hide default files from the list.
	 * 
	 * @return misc
	 */
	static function get_custom_sets_list( $content = null, $tag, $hide_default = false ) {
		
		$content = array();
		
		$tag = apply_filters( 'bathemos_core_input', $tag );
		
		
		// Get available sets list.
		$sources_list = (array) apply_filters( 'bathemos_sources_list', null, $tag, $hide_default );
		
		
		// Get each set data.
		foreach ( $sources_list as $set_id ) {
			
			$source = array();
			$source['tag'] = $tag;
			$source['id'] = $set_id;
			
			$data = apply_filters( 'bathemos_custom_set_data', null, $source );
			
			$content[ $set_id ] = apply_filters( 'bathemos_formatted_set', $data );
		}
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns specific set data.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param array $source Source meta data array.
	 *
	 * @return array
	 */
	static function get_custom_set_data( $content = null, $source = array() ) {
		
		$content = array();
		
		// Get source file.
		$source = apply_filters( 'bathemos_source', $source, $use_default = true );
		
		if ( ! $source['path'] ) {
			
			return $content;
		}
		
		do_action( 'bathemos_get_source', $source );
		
		
		// Get data.
		$content = (array) apply_filters( 'bathemos_collected_data', null, $source['tag'] );
		
		
		// Get meta.
		$content['meta']['id'] = $source['id'];
		$content['meta']['tag'] = $source['tag'];
		
		
		// Get format.
		$content = apply_filters( 'bathemos_formatted_set', $content );
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns color value from the current color set by ID.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param string $id Color ID in the color set.
	 * 
	 * @return misc
	 */
	static function get_color( $content = null, $id ) {
		
		$id = apply_filters( 'bathemos_core_input', $id );
		
		$options = (array) apply_filters( 'bathemos_options', null );
		$color_set = apply_filters( 'bathemos_option', null, 'color-set' );
		
		$prefix = 'color-set_' . $color_set . '_';
		
		$item_id = $prefix . $id;
		
		
		if ( isset( $options[ $item_id ] ) ) {
			
			return $options[ $item_id ];
			
		} else {
			
			$source = array();
			$source['tag'] = 'color-set';
			$source['id'] = $color_set;
			
			$data = apply_filters( 'bathemos_custom_set_data', null, $source );
			
			if ( ! empty( $data[ $id ]['value'] ) ) {
				
				return $data[ $id ]['value'];
			}
		}
		
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}