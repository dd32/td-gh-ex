<?php
/**
 * CMB2 functionality for theme administration.
 *
 * Requires BA Book Everything plugin.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
}

//////////////////////////////////////////////////
/**
 * CMB2 functionality for theme administration.
 *
 */
class batourslight_CMB2_Admin {

	//////////////////////////////////////////////////
	/**
	 * Setup function.
	 *
	 */
    public static function init() {
		
		add_action( 'cmb2_admin_init', array( __CLASS__, 'taxonomies_metabox' ), 10, 1 );
		
		add_action( 'cmb2_render_fontawesome_icon', array( __CLASS__, 'cmb2_render_fontawesome_icon' ), 10, 5 );
		add_action( 'cmb2_sanitize_fontawesome_icon', array( __CLASS__, 'cmb2_sanitize_fontawesome_icon' ), 10, 2 );
		
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'load_assets' ), 10, 1 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Init section.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Loads required styles and scripts.
	 */
    public static function load_assets() {
		
		if ( ! class_exists( 'BABE_Post_types' ) ) {
			return;
		}
		
		if ( isset( $_GET['post_type'] ) && isset( $_GET['taxonomy'] ) && $_GET['post_type'] == BABE_Post_types::$booking_obj_post_type ) {
			
			// Scripts.
			wp_enqueue_script( 'batourslight-fontawesome-picker', BATOURSLIGHT_URI . '/js/fontawesome-iconpicker.min.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'batourslight-fontawesome-picker-init', BATOURSLIGHT_URI . '/js/fontawesome-picker-init.js', array( 'batourslight-fontawesome-picker' ), '1.0', true );
			
			// Styles.
            wp_enqueue_style( 'batourslight-fontawesome' , BATOURSLIGHT_URI . '/fonts/fontawesome-free/css/all.min.css', false, '5.5.0' );
			wp_enqueue_style( 'batourslight-bootstrap-popovers', BATOURSLIGHT_URI . '/css/bootstrap-popovers.css' );
			wp_enqueue_style( 'batourslight-fontawesome-picker', BATOURSLIGHT_URI . '/admin/css/fontawesome-iconpicker.min.css', array( 'batourslight-bootstrap-popovers' ), '1.0' );
			wp_enqueue_style( 'batourslight-fontawesome-picker-fixes', BATOURSLIGHT_URI . '/admin/css/cmb2-fixes.css', array( 'batourslight-fontawesome-picker' ), '1.0' );
            
		}
	}

	//////////////////////////////////////////////////
	/**
	 * Registers custom taxonomies extra fields.
	 * 
	 * @return
	 */
	public static function taxonomies_metabox() {
		
		if ( ! class_exists( 'BABE_Post_types' ) ) {
			
			return;
		}
		
		global $pagenow;
		
		$taxonomies_arr = array();
		
        foreach( BABE_Post_types::$taxonomies_list as $taxonomy_id => $taxonomy ) {
			
			$taxonomies_arr[] = $taxonomy['slug'];
		}
		
		if ( ! empty( $taxonomies_arr ) ) {
			
			$cmb_term = new_cmb2_box( array(
				'id'               => 'custom_taxonomies_fontawesome',
				'title'            => __( 'Fontawesome Metabox', 'ba-tours-light' ), // Doesn't output for term boxes
				'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
				'taxonomies'       => $taxonomies_arr, // Tells CMB2 which taxonomies should have these fields
			) );
			
			$cmb_term->add_field( array(
				'name' => __( 'Fontawesome 5 icon class', 'ba-tours-light' ),
				'id'   => 'fa_class',
				'type' => 'fontawesome_icon',
			) );
		}
	}
	
	//////////////////////////////////////////////////
	/**
	 * Outputs ana dditional CMB custom field
	 * to allow the FontAwesome Icon selection.
	 * 
	 * @return
	 */
	public static function cmb2_render_fontawesome_icon( $field, $escaped_value, $object_id, $object_type, $field_type ) {
	   
        $output = $field_type->input( array( 'type' => 'text', 'class' => 'fontawesome-icon-select regular-text' ) );
        $output = apply_filters( 'batourslight_cmb2_render_fontawesome_icon', $output, $field, $field_type );
		
		echo wp_kses( $output, batourslight_Settings::$wp_allowedposttags );
	}
	
	//////////////////////////////////////////////////
	/**
	 * Sanitizes icon class name.
	 * 
	 * @return string
	 */
	public static function cmb2_sanitize_fontawesome_icon( $sanitized_val, $val ) {
		
		if ( ! empty( $val ) ) {
			return  sanitize_text_field( $val );
		}
		
		return $sanitized_val;
	}
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}

//////////////////////////////////////////////////
/**
 * Calling to setup class.
 */
batourslight_CMB2_Admin::init();
