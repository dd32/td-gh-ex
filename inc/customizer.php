<?php
/**
 * beka Theme Customizer.
 *
 * @package beka
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function beka_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    
    
    /* --
        -- Header Section -- 
    -- */
	$wp_customize->add_section('header_section', array(
		'title' => __('Header', 'beka'),
		'priority' => 30,
	));
    
    // Header text
	$wp_customize->add_setting('header_text', array(
		'default' => 'Welcome to Awesome Blog Design perfact blog',
		'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_post_kses',
	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'header_text',
		array(
			'label'    => __('Header Text', 'beka'),
			'section'  => 'header_section',
			'settings' => "header_text",
			'type'     => 'textarea',
		)
	));
    
    // Show Social Button
	$wp_customize->add_setting('social_button', array(
		'default' => '',
        'sanitize_callback' => 'beka_sanitize_checkbox',
		'transport' => 'refresh',
	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'social_button',
		array(
			'label'    => __('Show Social Button', 'beka'),
			'section'  => 'header_section',
			'settings' => "social_button",
			'type'     => 'checkbox',
		)
	));
    
    
    /* --
        -- Social Section --
    -- */
	$wp_customize->add_section('social_section', array(
		'title' => __('Social', 'beka'),
		'priority' => 34,
	));
    
    // Facebook
	$wp_customize->add_setting('facebook_url', array(
		'default' => '',
        'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'facebook_url',
		array(
			'label'    => __('Facebook URL', 'beka'),
			'section'  => 'social_section',
			'settings' => "facebook_url",
			'type'     => 'text',
		)
	));
    // twitter
	$wp_customize->add_setting('twitter_url', array(
		'default' => '',
        'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'twitter_url',
		array(
			'label'    => __('Twitter URL', 'beka'),
			'section'  => 'social_section',
			'settings' => "twitter_url",
			'type'     => 'text',
		)
	));
    // Google Plus
	$wp_customize->add_setting('gp_url', array(
		'default' => '',
        'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'gp_url',
		array(
			'label'    => __('Google Plus URL', 'beka'),
			'section'  => 'social_section',
			'settings' => "gp_url",
			'type'     => 'text',
		)
	));
    // Tumbler
	$wp_customize->add_setting('tumblr_url', array(
		'default' => '',
        'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'tumblr_url',
		array(
			'label'    => __('Tumblr URL', 'beka'),
			'section'  => 'social_section',
			'settings' => "tumblr_url",
			'type'     => 'text',
		)
	));
    // Instagram
	$wp_customize->add_setting('instagram_url', array(
		'default' => '',
        'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'instagram_url',
		array(
			'label'    => __('Instagram URL', 'beka'),
			'section'  => 'social_section',
			'settings' => "instagram_url",
			'type'     => 'text',
		)
	));
    
}
add_action( 'customize_register', 'beka_customize_register' );

/**
 * Checkbox Sanitization
 */
function beka_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function beka_customize_preview_js() {
	wp_enqueue_script( 'beka_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'beka_customize_preview_js' );
