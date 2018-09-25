<?php
/**
 * Current page layout composing.
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
Bathemos_Layout::init();



//////////////////////////////////////////////////
/**
 * Compose current page layout.
 *
 * @since 1.0.0
 */
class Bathemos_Layout {

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
		
		// Compose page layout.
		add_filter( 'bathemos_layout', array( __CLASS__, 'apply_defaults' ), 10, 2 );
		add_filter( 'bathemos_layout', array( __CLASS__, 'apply_active_panels' ), 15, 2 );
		add_filter( 'bathemos_layout', array( __CLASS__, 'apply_options' ), 20, 2 );
		add_filter( 'bathemos_layout', array( __CLASS__, 'apply_template_layout' ), 25, 2 );
		add_filter( 'bathemos_layout', array( __CLASS__, 'apply_active_grid' ), 30, 2 );
		
		// Provide data.
		add_filter( 'bathemos_layout_altering', array( __CLASS__, 'get_layout_altering' ), 10, 2 );
	}	
	
	////////////////////////////////////////////////////////////
	//// Compose page layout.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns default layout.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return array
	 */
	static function apply_defaults( $content = null ) {
		
		$content['components'] = apply_filters( 'bathemos_components', null );
		
		$content['panels'] = apply_filters( 'bathemos_panels', null );
		
		$content['grid'] = apply_filters( 'bathemos_grid', null );
		
		$content['styles'] = apply_filters( 'bathemos_styles', null );
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns layout altered by the theme options.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return array
	 */
	static function apply_options( $content ) {
		
		$altering = (array) apply_filters( 'bathemos_options', null );
		
		$content = apply_filters( 'bathemos_layout_altering', $content, $altering );	
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns layout altered by the template files.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return array
	 */
	static function apply_template_layout( $content ) {
		
		$altering = (array) apply_filters( 'bathemos_collected_data', '', 'layout' );
		
		$content = apply_filters( 'bathemos_layout_altering', $content, $altering );
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns layout only with that panels which have content.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return array
	 */
	static function apply_active_panels( $content ) {
		
		$content['panels'] = apply_filters( 'bathemos_active_panels', $content['panels'] );
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns layout with a valide grid for the active parts.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return array
	 */
	static function apply_active_grid( $content ) {
		
		$content['grid'] = apply_filters( 'bathemos_active_grid', $content['grid'], $content['panels'] );
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns layout altered by the gived set.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param array $altering Altering array.
	 * 
	 * @return array
	 */
	static function get_layout_altering( $content, $altering = array() ) {
		
		// Sets.
		$sets = (array) apply_filters( 'bathemos_defaults', null, 'sets' );
		
		foreach ( $sets as $set_id => $set_data ) {
			
			if ( $set_id == 'layout' ) {
				
				continue;
			}
			
			if ( isset( $altering[ $set_id ] ) ) {
				
				if ( empty( $altering['components'] ) ) {
					
					$altering['components'] = array();
				}
			
				$altering['components'][ $set_id ] = $altering[ $set_id ];
			}
		}
		
		
		// Components.
		if ( isset( $altering['components'] ) ) {
			
			$content['components'] = apply_filters( 'bathemos_components_altering', $content['components'], $altering['components'] );
		}
		
		
		// Grid.
		if ( isset( $altering['grid'] ) ) {
			
			$content['grid'] = apply_filters( 'bathemos_grid_altering', $content['grid'], $altering['grid'] );
		}
		
		
		// Panels.
		$panels_enabled  = isset( $altering['panels'] ) ? $altering['panels'] : 'default';
		$panels_enabled  = isset( $altering['panels_enabled'] ) ? $altering['panels_enabled'] : $panels_enabled;
		$panels_added    = isset( $altering['panels_added'] ) ? $altering['panels_added'] : 'none';
		$panels_disabled = isset( $altering['panels_disabled'] ) ? $altering['panels_disabled'] : 'default';
		
		$panels_altering = array(
			'enabled'  => $panels_enabled,
			'added'    => $panels_added,
			'disabled' => $panels_disabled,
		);
		
		$content['panels'] = apply_filters( 'bathemos_panels_altering', $content['panels'], $panels_altering );
		
		
		// Page components styles.
		if ( isset( $altering['styles'] ) ) {
			
			$content['styles'] = apply_filters( 'bathemos_styles_altering', $content['styles'], $altering['styles'] );
		}
		
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}