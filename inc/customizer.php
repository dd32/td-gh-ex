<?php
/**
 * Aperture Theme Customizer
 *
 * @package Aperture
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aperture_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* Remove existing not used sections. */
	$wp_customize->remove_section('colors');

	/* Theme options panel */
	$wp_customize->add_panel( 'aperture_theme_options', array(
		'priority'       => 900,
		'title'          => __( 'Theme Options', 'aperture' ),
		'description'    => 'This theme supports a number of options which you can set using this panel.',
	) );

	/* Theme options slider section */
	$wp_customize->add_section( 'aperture_slider_options', array(
		'title'    => __( 'Slider Options', 'aperture' ),
		'priority' => 10,
		'panel'  => 'aperture_theme_options',
		'description'    => 'To customize the appearance of the fullscreen slider choose any of the options below.',
	) );

	/* Theme options sidebar section */
	$wp_customize->add_section( 'aperture_sidebar_options', array(
		'title'    => __( 'Sidebar Options', 'aperture' ),
		'priority' => 20,
		'panel'  => 'aperture_theme_options',
		'description'    => 'Select whether the sidebar should be displayed at the right or left side of the content.',
	) );

	/* Theme options footer section */
	$wp_customize->add_section( 'aperture_footer_options', array(
		'title'    => __( 'Footer Options', 'aperture' ),
		'priority' => 30,
		'panel'  => 'aperture_theme_options',
		'description'    => 'Add some custom text to the bottom right of the footer area.',
	) );

	/* Slider animation. */
	$wp_customize->add_setting( 'aperture_slider_animation', array(
		'default'           => 'slide',
		'sanitize_callback' => 'aperture_sanitize_slider_animation',
	) );
	$wp_customize->add_control( 'aperture_slider_animation', array(
		'label'             => __( 'Animation: ', 'aperture' ),
		'section'           => 'aperture_slider_options',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'slide'			=> __( 'Slide', 'aperture' ),
			'fade'			=> __( 'Fade', 'aperture' ),
		),
	) );

	/* Slider direction. */
	$wp_customize->add_setting( 'aperture_slider_direction', array(
		'default'           => 'horizontal',
		'sanitize_callback' => 'aperture_sanitize_slider_direction',
	) );
	$wp_customize->add_control( 'aperture_slider_direction', array(
		'label'             => __( '(Slide) Direction: ', 'aperture' ),
		'section'           => 'aperture_slider_options',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'horizontal'	=> __( 'Horizontal', 'aperture' ),
			'vertical'		=> __( 'Vertical', 'aperture' ),
		),
	) );

	/* Slider slideshow. */
	$wp_customize->add_setting( 'aperture_slider_slideshow', array(
		'default'           => 'horizontal',
		'sanitize_callback' => 'aperture_sanitize_slider_slideshow',
	) );
	$wp_customize->add_control( 'aperture_slider_slideshow', array(
		'label'             => __( 'Slideshow: ', 'aperture' ),
		'section'           => 'aperture_slider_options',
		'priority'          => 3,
		'type'              => 'radio',
		'choices'           => array(
			'true'			=> __( 'True', 'aperture' ),
			'false'			=> __( 'False', 'aperture' ),
		),
	) );

	/* Slider slideshow speed. */
	$wp_customize->add_setting( 'aperture_slider_speed', array(
		'default'           => 'horizontal',
		'sanitize_callback' => 'aperture_sanitize_slider_speed',
	) );
	$wp_customize->add_control( 'aperture_slider_speed', array(
		'label'             => __( 'Speed: ', 'aperture' ),
		'section'           => 'aperture_slider_options',
		'priority'          => 4,
		'type'              => 'radio',
		'choices'           => array(
			'20000'			=> __( 'Slowest', 'aperture' ),
			'14000'			=> __( 'Slower', 'aperture' ),
			'10000'			=> __( 'Slow', 'aperture' ),
			'7000'			=> __( 'Default', 'aperture' ),
			'5000'			=> __( 'Fast', 'aperture' ),
			'3500'			=> __( 'Faster', 'aperture' ),
			'2500'			=> __( 'Fastest', 'aperture' ),
		),
	) );

	/* Left sidebar or right sidebar */
	$wp_customize->add_setting( 'aperture_sidebar', array(
		'default'           => 'right-sidebar',
		'sanitize_callback' => 'aperture_sanitize_sidebar',
	) );
	$wp_customize->add_control( 'aperture_sidebar', array(
		'label'             => __( 'Sidebar: ', 'aperture' ),
		'section'           => 'aperture_sidebar_options',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'right-sidebar'	=> __( 'Right sidebar', 'aperture' ),
			'left-sidebar'	=> __( 'Left sidebar', 'aperture' ),
		),
	) );

	/* Footer custom text */
	$wp_customize->add_setting( 'aperture_footer_text', array(
		'default'			=> 'Some custom text here!',
		'sanitize_callback' => 'aperture_sanitize_footer_text',
	) );

	$wp_customize->add_control( 'aperture_footer_text', array(
		'label'   			=> 'Custom Footer Text: ',
		'section' 			=> 'aperture_footer_options',
		'type'    			=> 'text',
	) );
}
add_action( 'customize_register', 'aperture_customize_register' );

/**
 * Sanitize slider animation.
 *
 * @param string $input.
 * @return string (slide|fade).
 */
function aperture_sanitize_slider_animation( $input ) {
	if ( ! in_array( $input, array( 'slide', 'fade' ) ) ) {
		$input = 'slide';
	}
	return $input;
}

/**
 * Sanitize slider direction.
 *
 * @param string $input.
 * @return string (horizontal|vertical).
 */
function aperture_sanitize_slider_direction( $input ) {
	if ( ! in_array( $input, array( 'horizontal', 'vertical' ) ) ) {
		$input = 'horizontal';
	}
	return $input;
}

/**
 * Sanitize slider slideshow.
 *
 * @param string $input.
 * @return string (true|false).
 */
function aperture_sanitize_slider_slideshow( $input ) {
	if ( ! in_array( $input, array( 'true', 'false' ) ) ) {
		$input = 'true';
	}
	return $input;
}

/**
 * Sanitize slider slideshow speed.
 *
 * @param string $input.
 * @return string (2500|3500|5000|7000|10000|14000|20000).
 */
function aperture_sanitize_slider_speed( $input ) {
	if ( ! in_array( $input, array( '2500', '3500', '5000', '7000', '10000', '14000', '20000' ) ) ) {
		$input = '7000';
	}
	return $input;
}

/**
 * Sanitize sidebar selection.
 *
 * @param string $input.
 * @return string (left-sidebar|right-sidebar).
 */
function aperture_sanitize_sidebar( $input ) {
	if ( ! in_array( $input, array( 'left-sidebar', 'right-sidebar' ) ) ) {
		$input = 'right-sidebar';
	}
	return $input;
}

/**
 * Sanitize footer text.
 *
 * @param string $text.
 * @return string.
 */
function aperture_sanitize_footer_text( $text ) {
	if ( empty( $text ) ) {
		$text = 'Some custom text here!';
	}
	wp_filter_post_kses( $text );

	return $text;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aperture_customize_preview_js() {
	wp_enqueue_script( 'aperture_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'aperture_customize_preview_js' );
