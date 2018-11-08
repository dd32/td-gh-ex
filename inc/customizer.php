<?php
/**
 * aperture-portfolio Theme Customizer
 *
 * @package aperture-portfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aperture_portfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'aperture_portfolio_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'aperture_portfolio_customize_partial_blogdescription',
		) );
	}



	$wp_customize->add_setting( 'link_color' , array(
	    'default' => '#e74c3c',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'link_color', 
		array(
		'label'      => esc_html__( 'Link Color', 'aperture-portfolio' ),
		'section'    => 'colors',
		'settings'   => 'link_color',
	) ) 
);
}
add_action( 'customize_register', 'aperture_portfolio_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function aperture_portfolio_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function aperture_portfolio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aperture_portfolio_customize_preview_js() {
	wp_enqueue_script( 'aperture-portfolio-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'aperture_portfolio_customize_preview_js' );

