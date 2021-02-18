<?php
/**
 * Implement Theme Customizer
 *
 */

// Load Customizer Helper Functions
require( get_template_directory() . '/inc/customizer/functions/custom-controls.php' );
require( get_template_directory() . '/inc/customizer/functions/sanitize-functions.php' );

// Load Customizer Settings
require( get_template_directory() . '/inc/customizer/sections/customizer-general.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-header.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-slider.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-upgrade.php' );

// Add Theme Options section to Customizer
add_action( 'customize_register', 'anderson_customize_register_options' );

function anderson_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel
	$wp_customize->add_panel( 'anderson_panel_options', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Theme Options', 'anderson-lite' ),
		'description'    => '',
	) );
	
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Change default background section
	$wp_customize->get_control( 'background_color'  )->section   = 'background_image';
	$wp_customize->get_section( 'background_image'  )->title     = __( 'Background', 'anderson-lite' );
	
	// Add Header Tagline option
	$wp_customize->add_setting( 'anderson_theme_options[header_tagline]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'anderson_control_header_tagline', array(
        'label'    => __( 'Display Tagline below site title.', 'anderson-lite' ),
        'section'  => 'title_tagline',
        'settings' => 'anderson_theme_options[header_tagline]',
        'type'     => 'checkbox',
		'priority' => 99
		)
	);
}


// Embed JS file to make Theme Customizer preview reload changes asynchronously.
add_action( 'customize_preview_init', 'anderson_customize_preview_js' );

function anderson_customize_preview_js() {
	wp_enqueue_script( 'anderson-lite-customizer-js', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20140312', true );
}


// Embed CSS styles for Theme Customizer
add_action( 'customize_controls_print_styles', 'anderson_customize_preview_css' );

function anderson_customize_preview_css() {
	wp_enqueue_style( 'anderson-lite-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20140312' );

}


?>