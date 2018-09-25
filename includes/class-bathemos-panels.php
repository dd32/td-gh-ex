<?php
/**
 * Panels data handling.
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
Bathemos_Panels::init();



//////////////////////////////////////////////////
/**
 * Panels data handling.
 *
 * @since 1.0.0
 */
class Bathemos_Panels {

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
		add_filter( 'bathemos_panels', array( __CLASS__, 'get_data' ), 10, 1 );
		add_filter( 'bathemos_active_panels', array( __CLASS__, 'get_active_panels' ), 10, 1 );
		add_filter( 'bathemos_panels_altering', array( __CLASS__, 'get_panels_altering' ), 10, 2 );
		add_filter( 'bathemos_widget_wrap', array( __CLASS__, 'get_widget_wrap' ), 10, 1 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collecting data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Sets panels list filled with data.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_data() {
		
		self::$data = array();
		
		$sources = apply_filters( 'bathemos_defaults', null, 'panels' );
		
		foreach ( $sources as $item_id => $item_data ) {
			
			$item_id = apply_filters( 'bathemos_valid_array_id', $item_id, $item_data );
			
			if ( ! $item_id ) {
				
				continue;
			}
			
			
			// Format data.
			$source = apply_filters( 'bathemos_formatted_source', $item_data );
			
			$source['tag'] = 'panel';
			$source['id'] = $item_id;
			
			
			// Get item source.
			$source = apply_filters( 'bathemos_source', $source, $use_default = true );
			
			if ( ! $source['path'] ) {
				
				continue;
			}
			
			
			// Get description for the register_sidebar().
			if ( ( ! $source['description'] ) && ( $source['desc'] ) ) {
				
				$source['description'] = $source['desc'];
			}
			
			
			// Get widget wrap.
			$source = apply_filters( 'bathemos_widget_wrap', $source );
		
			
			self::$data[ $item_id ] = $source;
		}
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns panels list.
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
	 * Returns active panels list.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 *
	 * @return array
	 */
	static function get_active_panels( $content = null ) {
		
		$panels = ( $content ) ? $content : self::$data;
		$content = array();
		
		
		foreach ( $panels as $panel ) {
			
			if ( is_active_sidebar( $panel['id'] ) ) {
				
				$content[ $panel['id'] ] = $panel;
			}
		}
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns panels list altered by the gived arrays.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param array $panels_altering Altering lists of panels.
	 *
	 * @return array
	 */
	static function get_panels_altering( $content, $panels_altering = array() ) {
		
		$defaults = array(
			'enabled'  => 'default',
			'added'    => 'default',
			'disabled' => 'default',
		);
		
		$panels_altering = wp_parse_args( (array) $panels_altering, $defaults );
		
		
		//////////////////////////////////////////////////
		/**
		 * Enabling panels.
		 */
		if ( is_array( $panels_altering['enabled'] ) ) {
			
			$panels = $content;
			$content = array();
			
			foreach ( $panels_altering['enabled'] as $item_id ) {
				
				// If enabled panel is already listed.
				if ( in_array( $item_id, $panels ) ) {
					
					$content[ $item_id ] = $panels[ $item_id ];
					
					continue;
				}
				
				// If its not listed but may exist.
				$source = array();
				$source['tag'] = 'panel';
				$source['id'] = $item_id;
				
				$source = apply_filters( 'bathemos_source', $source, $use_default = true );
				
				if ( $source['path'] ) {
				
					$content[ $item_id ] = $source;
				}
			}
			
		} elseif ( $panels_altering['enabled'] == 'none' ) {
			
			$content = array();
		}
		
		
		//////////////////////////////////////////////////
		/**
		 * Adding panels.
		 */
		if ( is_array( $panels_altering['added'] ) ) {
			
			foreach ( $panels_altering['added'] as $item_id ) {
				
				$source = array();
				$source['tag'] = 'panel';
				$source['id'] = $item_id;
				
				$source = apply_filters( 'bathemos_source', $source, $use_default = true );
				
				if ( $source['path'] ) {
				
					$content[ $item_id ] = $source;
				}
			}
			
		}
		
		
		//////////////////////////////////////////////////
		/**
		 * Disabling panels.
		 */
		if ( is_array( $panels_altering['disabled'] ) ) {
			
			$panels = $content;
			$content = array();
			
			foreach ( $panels as $panel ) {
				
				if ( ! in_array( $panel['id'], $panels_altering['disabled'] ) ) {
					
					$content[ $panel['id'] ] = $panel;
				}
			}
			
		} elseif ( $panels_altering['disabled'] == 'all' ) {
			
			$content = array();
		}
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns panel with widget html wrap.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 *
	 * @return array
	 */
	static function get_widget_wrap( $content ) {
		
		if ( ! is_array( $content ) ) {
			
			$content = array();
		}
		
		if ( ! isset( $content['id'] ) ) {
			
			$content['id'] = 'default';
		}
		
		// Find wrap source.
		$source = array();
		$source['id'] = $content['id'];
		$source['tag'] = 'widget-wrap';
		$source = apply_filters( 'bathemos_source', $source, $use_default = true );
		
		// Get wrap source.
		do_action( 'bathemos_get_source', $source );
		
		// Extract data from the source.
		$wrap = (array) apply_filters( 'bathemos_collected_data', null, 'widget-wrap' );
		
		
		// Give the wrap to the panel.
		$content = array_merge( $content, $wrap );
		
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}