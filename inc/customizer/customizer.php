<?php
/**
 * Implement theme options in the Customizer
 *
 * @package Beetle
 */

// Load Customizer Helper Functions.
require( get_template_directory() . '/inc/customizer/functions/custom-controls.php' );
require( get_template_directory() . '/inc/customizer/functions/sanitize-functions.php' );
require( get_template_directory() . '/inc/customizer/functions/callback-functions.php' );

// Load Customizer Section Files.
require( get_template_directory() . '/inc/customizer/sections/customizer-general.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-slider.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-upgrade.php' );

/**
 * Registers Theme Options panel and sets up some WordPress core settings
 *
 * @param object $wp_customize / Customizer Object.
 */
function beetle_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel.
	$wp_customize->add_panel( 'beetle_options_panel', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'beetle' ),
		'description'    => '',
	) );

	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Change default background section.
	$wp_customize->get_control( 'background_color' )->section   = 'background_image';
	$wp_customize->get_section( 'background_image' )->title     = esc_html__( 'Background', 'beetle' );

	// Add Display Site Title Setting.
	$wp_customize->add_setting( 'beetle_theme_options[site_title]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'beetle_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'beetle_theme_options[site_title]', array(
		'label'    => esc_html__( 'Display Site Title', 'beetle' ),
		'section'  => 'title_tagline',
		'settings' => 'beetle_theme_options[site_title]',
		'type'     => 'checkbox',
		'priority' => 10,
		)
	);

	// Add Header Image Link.
	$wp_customize->add_setting( 'beetle_theme_options[custom_header_link]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url',
		)
	);
	$wp_customize->add_control( 'beetle_control_custom_header_link', array(
		'label'    => esc_html__( 'Header Image Link', 'beetle' ),
		'section'  => 'header_image',
		'settings' => 'beetle_theme_options[custom_header_link]',
		'type'     => 'url',
		'priority' => 10,
		)
	);

	// Add Custom Header Hide Checkbox.
	$wp_customize->add_setting( 'beetle_theme_options[custom_header_hide]', array(
		'default'           => false,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'beetle_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'beetle_control_custom_header_hide', array(
		'label'    => esc_html__( 'Hide header image on front page', 'beetle' ),
		'section'  => 'header_image',
		'settings' => 'beetle_theme_options[custom_header_hide]',
		'type'     => 'checkbox',
		'priority' => 15,
		)
	);

} // beetle_customize_register_options()
add_action( 'customize_register', 'beetle_customize_register_options' );


/**
 * Embed JS file to make Theme Customizer preview reload changes asynchronously.
 */
function beetle_customize_preview_js() {
	wp_enqueue_script( 'beetle-customizer-preview', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151202', true );
}
add_action( 'customize_preview_init', 'beetle_customize_preview_js' );


/**
 * Embed JS file for Customizer Controls
 */
function beetle_customize_controls_js() {

	wp_enqueue_script( 'beetle-customizer-controls', get_template_directory_uri() . '/js/customizer-controls.js', array(), '20151202', true );

	// Localize the script.
	wp_localize_script( 'beetle-customizer-controls', 'beetle_theme_links', array(
		'title'	=> esc_html__( 'Theme Links', 'beetle' ),
		'themeURL'	=> esc_url( __( 'https://themezee.com/themes/beetle/', 'beetle' ) . '?utm_source=customizer&utm_medium=textlink&utm_campaign=beetle&utm_content=theme-page' ),
		'themeLabel'	=> esc_html__( 'Theme Page', 'beetle' ),
		'docuURL'	=> esc_url( __( 'https://themezee.com/docs/beetle-documentation/', 'beetle' ) . '?utm_source=customizer&utm_medium=textlink&utm_campaign=beetle&utm_content=documentation' ),
		'docuLabel'	=> esc_html__( 'Theme Documentation', 'beetle' ),
		'rateURL'	=> esc_url( 'http://wordpress.org/support/view/theme-reviews/beetle?filter=5' ),
		'rateLabel'	=> esc_html__( 'Rate this theme', 'beetle' ),
		)
	);

}
add_action( 'customize_controls_enqueue_scripts', 'beetle_customize_controls_js' );


/**
 * Embed CSS styles for the theme options in the Customizer
 */
function beetle_customize_preview_css() {
	wp_enqueue_style( 'beetle-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20151202' );
}
add_action( 'customize_controls_print_styles', 'beetle_customize_preview_css' );
