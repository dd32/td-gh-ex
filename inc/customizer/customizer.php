<?php
/**
 * beetech Theme Customizer.
 *
 * @package beetech
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function beetech_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'beetech_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function beetech_customize_preview_js() {
	wp_enqueue_script( 'beetech_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20160714', true );
}
add_action( 'customize_preview_init', 'beetech_customize_preview_js' );

/**
 *
 */
function beetech_customize_backend_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/library/font-awesome/css/font-awesome.min.css', array(), '4.6.3' );
	wp_enqueue_style( 'beetech_admin_customizer_style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );
	wp_enqueue_script( 'beetech_admin_customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-scripts.js', array( 'jquery', 'customize-controls' ), '20160714', true );
}
add_action( 'customize_controls_enqueue_scripts', 'beetech_customize_backend_scripts', 10 );
