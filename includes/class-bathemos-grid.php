<?php
/**
 * Grid handling.
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
Bathemos_Grid::init();



//////////////////////////////////////////////////
/**
 * Panels data handling.
 *
 * @since 1.0.0
 */
class Bathemos_Grid {

	////////////////////////////////////////////////////////////
	//// Setup section.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Internal variables.
	 */
	// Grid.
	private static $grid = array();
	// Grid classes.
	private static $grid_classes = array();

	
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
		add_filter( 'bathemos_grid', array( __CLASS__, 'get_grid' ), 10, 1 );
		add_filter( 'bathemos_grid_classes', array( __CLASS__, 'get_grid_classes' ), 10, 1 );
		add_filter( 'bathemos_active_grid', array( __CLASS__, 'get_active_grid' ), 10, 2 );
		add_filter( 'bathemos_active_grid', array( __CLASS__, 'get_full_grid' ), 10, 2 );
		add_filter( 'bathemos_grid_altering', array( __CLASS__, 'get_grid_altering' ), 10, 2 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collecting data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Sets grid and fills it with data.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_data() {
		
		self::$grid_classes = apply_filters( 'bathemos_defaults', null, 'grid_classes' );
		
		self::$grid = apply_filters( 'bathemos_defaults', null, 'grid' );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns grid.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 *
	 * @return array
	 */
	static function get_grid( $content = null ) {
		
		return self::$grid;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns grid classes.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 *
	 * @return array
	 */
	static function get_grid_classes( $content = null ) {
		
		return self::$grid_classes;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns active grid.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param array $panels Active panels list.
	 *
	 * @return array
	 */
	static function get_active_grid( $content, $panels ) {
		
		foreach ( $content as $grid_group_name => $grid_group_data ) {
			
			foreach ( $grid_group_data as $grid_class => $grid_data ) {
				
				$rest = 12;
				
				// Calculate empty columns.
				foreach ( $grid_data as $panel_id => $panel_width ) {
					
					$width = (int) $panel_width;
					
					if ( isset( $panels[ $panel_id ] ) ) {
						
						$rest -= $width;
					}
				}
				
				$content[ $grid_group_name ][ $grid_class ]['rest'] = $rest;
			}
		}
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns grid with all classes filled.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 *
	 * @return array
	 */
	static function get_full_grid( $content ) {
		
		$grid = $content;
		$content = array();
		
		foreach ( $grid as $grid_group_name => $grid_group_data ) {
			
			// Get default grid data.
			if ( ! isset( $grid[ $grid_group_name ]['default'] ) ) {
				
				$grid[ $grid_group_name ]['default'] = reset( $grid[ $grid_group_name ] );
			}
			
			$content[ $grid_group_name ]['default'] = $grid[ $grid_group_name ]['default'];
			
			
			// Fill grid based on default.
			foreach ( self::$grid_classes as $grid_class_name ) {
				
				if ( ! isset( $grid[ $grid_group_name ][ $grid_class_name ] ) ) {
					
					$content[ $grid_group_name ][ $grid_class_name ] = $grid[ $grid_group_name ]['default'];
					
				} else {
					
					$content[ $grid_group_name ][ $grid_class_name ] = wp_parse_args(
						$grid[ $grid_group_name ][ $grid_class_name ],
						$grid[ $grid_group_name ]['default']
					);
				}
			}
		}
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns grid altered by the gived array.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param array $altering Altering array.
	 *
	 * @return array
	 */
	static function get_grid_altering( $content, $altering = array() ) {
		
		foreach ( $altering as $grid_group_name => $grid_group_data ) {
			
			if ( ( ! empty( $grid_group_data ) ) && ( is_array( $grid_group_data ) ) ) {
				
				foreach ( $grid_group_data as $grid_class_name => $grid_class_data ) {
					
					if ( $grid_class_data ) {
						
						$content[ $grid_group_name ][ $grid_class_name ] = $altering[ $grid_group_name ][ $grid_class_name ];
					}
				}
			}
		}
		
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}