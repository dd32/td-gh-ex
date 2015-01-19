<?php
/**
 * The template for adding Additional Header Option in Customizer
 *
 * @package Catch Themes
 * @subpackage Gridalicious
 * @since Gridalicious 0.1 
 */

if ( ! defined( 'CATCHBASE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

	// Header Options
	$wp_customize->add_setting( 'gridalicious_theme_options[enable_featured_header_image]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['enable_featured_header_image'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$gridalicious_enable_featured_header_image_options = gridalicious_enable_featured_header_image_options();
	$choices = array();
	foreach ( $gridalicious_enable_featured_header_image_options as $gridalicious_enable_featured_header_image_option ) {
		$choices[$gridalicious_enable_featured_header_image_option['value']] = $gridalicious_enable_featured_header_image_option['label'];
	}

	$wp_customize->add_control( 'gridalicious_theme_options[enable_featured_header_image]', array(
			'choices'  	=> $choices,
			'label'		=> __( 'Enable Featured Header Image on ', 'gridalicious' ),
			'section'   => 'header_image',
	        'settings'  => 'gridalicious_theme_options[enable_featured_header_image]',
	        'type'	  	=> 'select',
	) );
	

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_image_size]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_image_size'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$gridalicious_featured_image_size_options = gridalicious_featured_image_size_options();
	$choices = array();
	foreach ( $gridalicious_featured_image_size_options as $gridalicious_featured_image_size_option ) {
		$choices[$gridalicious_featured_image_size_option['value']] = $gridalicious_featured_image_size_option['label'];
	}

	$wp_customize->add_control( 'gridalicious_theme_options[featured_image_size]', array(
			'choices'  	=> $choices,
			'label'		=> __( 'Page/Post Featured Image Size', 'gridalicious' ),
			'section'   => 'header_image',
			'settings'  => 'gridalicious_theme_options[featured_image_size]',
			'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_header_image_alt]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_header_image_alt'],
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[featured_header_image_alt]', array(
			'label'		=> __( 'Featured Header Image Alt/Title Tag ', 'gridalicious' ),
			'section'   => 'header_image',
	        'settings'  => 'gridalicious_theme_options[featured_header_image_alt]',
	        'type'	  	=> 'text',
	) );

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_header_image_url]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_header_image_url'],
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[featured_header_image_url]', array(
			'label'		=> __( 'Featured Header Image Link URL', 'gridalicious' ),
			'section'   => 'header_image',
	        'settings'  => 'gridalicious_theme_options[featured_header_image_url]',
	        'type'	  	=> 'text',
	) );

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_header_image_base]', array(
		'capability'		=> 'edit_theme_options',
		'default'	=> $defaults['featured_header_image_url'],
		'sanitize_callback' => 'gridalicious_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[featured_header_image_base]', array(
		'label'    	=> __( 'Check to Open Link in New Window/Tab', 'gridalicious' ),
		'section'  	=> 'header_image',
		'settings' 	=> 'gridalicious_theme_options[featured_header_image_base]',
		'type'     	=> 'checkbox',
	) );	
// Header Options End