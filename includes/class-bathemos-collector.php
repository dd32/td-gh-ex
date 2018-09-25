<?php
/**
 * Announced data collector.
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
Bathemos_Collector::init();



//////////////////////////////////////////////////
/**
 * Collects and keeps data from file announces.
 *
 * @since 1.0.0
 */
class Bathemos_Collector {

	////////////////////////////////////////////////////////////
	//// Setup section.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Internal variables.
	 */
	// Announce data.
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
		add_action( 'bathemos_collect', array( __CLASS__, 'collect_data' ), 10, 3 );
		add_action( 'bathemos_collect_data', array( __CLASS__, 'collect_data' ), 10, 3 );
		
		
		//////////////////////////////////////////////////
		/**
		 * Provide data.
		 */
		add_filter( 'bathemos_collected', array( __CLASS__, 'get_data' ), 10, 2 );
		add_filter( 'bathemos_collected_data', array( __CLASS__, 'get_data' ), 10, 2 );
		add_filter( 'bathemos_defines', array( __CLASS__, 'get_data' ), 10, 1 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collector functions.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Collects data from file announces.
	 *
	 * @since 1.0.0
	 *
	 * @param misc $data Data to collect.
	 * @param misc $data_tag Data tag.
	 * @param misc $data_id Data ID inside the data set.
	 *
	 * @return null
	 */
	static function collect_data( $data = '', $data_tag = '', $data_id = '' ) {
		
		$data = apply_filters( 'bathemos_template_input', $data );
		$data_tag = apply_filters( 'bathemos_template_input', $data_tag );
		$data_id = apply_filters( 'bathemos_template_input', $data_id );
		
		if ( ! $data_tag ) {
			
			// Try to get announce ID from the active hook.
			$data_tag = substr( current_filter(), strlen( BATHEMOS_SLUG . '_collect_' ) );
		}
		
		if ( ( ! $data_tag ) || ( $data_tag == 'data' ) ) {
			
			// If data is not specified, just collect it.
			self::$data[] = $data;
			
		} else {
			
			if ( $data_id ) {
				
				if ( ! isset( self::$data[ $data_tag ] ) ) {
					
					self::$data[ $data_tag ] = array();
				}
				
				self::$data[ $data_tag ][ $data_id ] = $data;
				
			} else {
				
				self::$data[ $data_tag ] = $data;
			}
		}
	}

	
	
	//////////////////////////////////////////////////
	/**
	 * Returns collected data.
	 *
	 * @since 1.0.0
	 * 
	 * @param array $content Content to filter.
	 * @param string $data_tag Specific data ID.
	 *
	 * @return misc
	 */
	static function get_data( $content = null, $data_tag = null ) {
		
		$data_tag = apply_filters( 'bathemos_template_input', $data_tag );
		
		
		if ( ( $data_tag ) && ( isset( self::$data[ $data_tag ] ) ) ) {
			
			$content = self::$data[ $data_tag ];
			
		} elseif ( $data_tag == 'all' ) {
			
			$content = self::$data;
			
		} elseif ( ! $data_tag ) {
			
			// Try to get ID from the current filter.
			$data_tag = substr( current_filter(), strlen( BATHEMOS_SLUG . '_' ) );
			
			if ( ( $data_tag ) && ( isset( self::$data[ $data_tag ] ) ) ) {
				
				$content = self::$data[ $data_tag ];
			}
		}
		
		
		return $content;
	}

	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}