<?php
/**
 * a-portfolio Theme Customizer
 *
 * @package a-portfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function a_portfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Sanitization Callback
	require_once trailingslashit( get_template_directory() ) . '/inc/sanitize.php'; 

	//Customizer Home Page Options
	require_once trailingslashit( get_template_directory() ) . '/inc/front-options-customizer.php';

	// Customizer for font family
	require_once trailingslashit( get_template_directory() ) . '/inc/typography.php';
	
	// Footer Options Cutomizer
	require_once trailingslashit( get_template_directory() ) . '/inc/socail-options-customizer.php';
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'a_portfolio_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'a_portfolio_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'a_portfolio_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function a_portfolio_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function a_portfolio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function a_portfolio_customize_preview_js() {
	wp_enqueue_script( 'a-portfolio-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'a_portfolio_customize_preview_js' );
