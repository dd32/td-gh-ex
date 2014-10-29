<?php
/**
 * Customizer
 *
 * Please do not edit this file. This file is part of the CyberChimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function altitude_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Theme Options
	$wp_customize->add_section( 'altitude_theme_options', array(
		'title'    => __( 'Theme Options', 'altitude' ),
		'priority' => 30
	) );
	
	// Sidebar Location
	$wp_customize->add_setting( 'altitude_sidebar', array(
		'default'   => 'right',
		'sanitize_callback'	=> 'altitude_sanitize_sidebar'
	) );

	$wp_customize->add_control( 'altitude_sidebar', array(
		'label'    => __( 'Sidebar Location', 'altitude' ),
		'section'  => 'altitude_theme_options',
		'type'     => 'select',
		'choices'  => array(
			'left'  => __( 'Left', 'altitude' ),
			'right' => __( 'Right', 'altitude' )
		),
		'settings' => 'altitude_sidebar'
	) );

	// Add Logo Image Support
	$wp_customize->add_section( 'altitude_logo_image_options', array(
		'title'    => __( 'Logo Image', 'altitude' ),
		'priority' => 45
	) );

	$wp_customize->add_setting( 'altitude_logo_image', array(
		'default'  => get_template_directory_uri() . '/images/default_logo.png',
		'sanitize_callback'	=> 'altitude_sanitize_logo'
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'altitude_logo_image',
			array(
				'label'      => __( 'Upload Logo Image (size 126x28 pixels)', 'altitude' ),
				'section'    => 'altitude_logo_image_options',
				'settings'   => 'altitude_logo_image',
			)
		)
	);

	/**
	 * This will create a footer section in customizer.
	 * It will create two text boxes for take value to both left and right section of footer.
	 */
	$wp_customize->add_section(
		'altitude_footer_section',
		array(
			'title'       => __( 'Footer Section', 'altitude' ),
			'description' => 'This is a settings section for footer.',
			'priority'    => 100,
		)
	);

	$wp_customize->add_setting(
		'altitude_copyright_textbox',
		array(
			'default' => '',
			'sanitize_callback' => 'altitude_text_sanitization'
		)
	);

	$wp_customize->add_control(
		'altitude_copyright_textbox',
		array(
			'label'   => __( 'Copyright text', 'altitude' ),
			'section' => 'altitude_footer_section',
			'settings' => 'altitude_copyright_textbox',
			'type'    => 'text'
		)
	);

}
add_action( 'customize_register', 'altitude_customize_register' );

/**
 * Text field sanitization
 *
 * @param $text
 *
 * @return string
 */
function altitude_text_sanitization( $text ) {
	return sanitize_text_field( $text );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function altitude_customize_preview_js() {
	wp_enqueue_script( 'altitude_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'altitude_customize_preview_js' );

// Sanitization for sidebar option.
function altitude_sanitize_sidebar( $input ){
	if( $input )
		return $input;
	else
		return 'right';
}

// Sanitization for logo option.
function altitude_sanitize_logo( $input ) {
	return esc_url( $input );
}