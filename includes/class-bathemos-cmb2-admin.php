<?php
/**
 * CMB2 functionality for theme administration.
 *
 * Requires BA Book Everything plugin to be active.
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
Bathemos_CMB2_Admin::init();



//////////////////////////////////////////////////
/**
 * CMB2 functionality for theme administration.
 *
 * @since 1.0.0
 */
class Bathemos_CMB2_Admin {

	////////////////////////////////////////////////////////////
	//// Setup section.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Internal variables.
	 */
	private static $nonce_title = 'cmb2-tpl-nonce';
	
	
	//////////////////////////////////////////////////
	/**
	 * Setup function.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
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
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
    public static function load_assets() {
		
		if ( ! class_exists( 'BABE_Post_types' ) ) {
			
			return;
		}
		
		
		$path_js  = BATHEMOS_URI . apply_filters( 'bathemos_slug', null, 'js' );
		$path_css = BATHEMOS_URI . apply_filters( 'bathemos_slug', null, 'css' );
		
		
		if ( isset( $_GET['post_type'] ) && isset( $_GET['taxonomy'] ) && $_GET['post_type'] == BABE_Post_types::$booking_obj_post_type ) {
			
			// Scripts.
			wp_enqueue_script( 'bathemos-fontawesome-picker', $path_js . '/fontawesome-iconpicker.min.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'bathemos-fontawesome-picker-init', $path_js . '/fontawesome-picker-init.js', array( 'bathemos-fontawesome-picker' ), '1.0', true );
			
			// Styles.
			wp_enqueue_style( 'bathemos-bootstrap-popovers', $path_css . '/bootstrap-popovers.css' );
			wp_enqueue_style( 'bathemos-fontawesome-picker', $path_css . '/fontawesome-iconpicker.min.css', array( 'bathemos-bootstrap-popovers' ), '1.0' );
			wp_enqueue_style( 'bathemos-fontawesome-picker-fixes', $path_css . '/cmb2-fixes.css', array( 'bathemos-fontawesome-picker' ), '1.0' );
		}
	}

	
	
	////////////////////////////////////////////////////////////
	//// Meta box section.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Registers custom taxonomies extra fields.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	public static function taxonomies_metabox() {
		
		if ( ! class_exists( 'BABE_Post_types' ) ) {
			
			return;
		}
		
		
		global $pagenow;
		
		$prefix = '';
		
		
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
				//'new_term_section' => true, // Will display in the "Add New Category" section
			) );
			
			$cmb_term->add_field( array(
				'name' => __( 'Fontawesome 5 icon class', 'ba-tours-light' ),
				//'desc' => __( 'Field description (optional)', 'ba-tours-light' ),
				'id'   => $prefix . 'fa_class',
				'type' => 'fontawesome_icon',
			) );
		}
	}

	
	
	//////////////////////////////////////////////////
	/**
	 * Outputs ana dditional CMB custom field
	 * to allow the FontAwesome Icon selection.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	public static function cmb2_render_fontawesome_icon( $field, $escaped_value, $object_id, $object_type, $field_type ) {
	   
        $output = $field_type->input( array( 'type' => 'text', 'class' => 'fontawesome-icon-select regular-text' ) );
        $output = apply_filters( 'bathemos_cmb2_render_fontawesome_icon', $output, $field, $field_type );
		
		echo wp_kses_post($output);
	}

	
	
	//////////////////////////////////////////////////
	/**
	 * Sanitizes icon class name.
	 *
	 * @since 1.0.0
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