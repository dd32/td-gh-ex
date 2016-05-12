<?php
/**
 * Free theme Theme Customizer.
 *
 * @package Basic Shop
 */
//CUSTOM HEADER
function igthemes_custom_header_setup() {
    add_theme_support( 'custom-header', apply_filters( 'igthemes_custom_header_args', array(
	           'default-image' => '',
				'header-text'   => false,
				'width'         => 1170,
				'height'        => 300,
				'flex-width'    => true,
				'flex-height'   => true,
    ) ) );
}
add_action( 'after_setup_theme', 'igthemes_custom_header_setup' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function igthemes_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'igthemes_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function igthemes_customize_preview_js() {
	wp_enqueue_script( 'igthemes_customizer', get_template_directory_uri() . '/core/options/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'igthemes_customize_preview_js' );

/**
 * Required files
 */
require get_template_directory() . '/core/options/inc/customizer-sanitization.php';
require get_template_directory() . '/core/options/inc/customizer-custom-controls.php';
require get_template_directory() . '/core/options/inc/customizer-settings.php';
require get_template_directory() . '/core/options/inc/customizer-functions.php';
require get_template_directory() . '/core/options/inc/customizer-reset.php';

/**
 * Get the optiions
 */
function igthemes_option_name() {
    global $igthemes_option;
    return $igthemes_option;
}
function igthemes_option( $name, $default = false ) {
    $option_name = '';
    // Gets option name as defined in the theme
    if ( function_exists( 'igthemes_option_name' ) ) {
        $option_name = igthemes_option_name();
    }
    // Get option settings from database
    $options = get_option( $option_name );
    // Return specific option
    if ( isset( $options[$name] ) ) {
        return $options[$name];
    }
    return $default;
}
