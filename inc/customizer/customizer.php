<?php
/**
 * Agensy Theme Customizer
 *
 * @package Agensy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function agensy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_section( 'background_image' )->panel = 'agensy_general_setting';
	$wp_customize->remove_control( 'display_header_text' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'agensy_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'agensy_customize_partial_blogdescription',
		) );
	}

/**
 * Theme Customizer.
 */
require get_template_directory() . '/inc/customizer/agensy-customizer.php';
}
add_action( 'customize_register', 'agensy_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function agensy_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function agensy_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function agensy_customize_preview_js() {
	wp_enqueue_script( 'agensy-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'agensy_customize_preview_js' );



