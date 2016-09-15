<?php

//Theme Customizer

function ascreen_customize_register( $wp_customize ) {
	/*
	 * ascreen social url Set
	*/
	$wp_customize->add_section('ascreen_social_url' , array(
		'title' => __('Social URL', 'ascreen'),
		'priority' => 120,
	));
		
	//facebook_url
	$wp_customize->add_setting( 'ascreen_option[facebook_url]', array(
		'default' => '#',
		'sanitize_callback' => 'ascreen_sanitize_url',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		//'type' => 'option'
	) );

	$wp_customize->add_control( 'ascreen_option[facebook_url]', array(
		'label'		=> __( 'Facebook URL:', 'ascreen' ),
		'section'	=> 'ascreen_social_url',
		'settings'	=> 'ascreen_option[facebook_url]',
		'type'		=> 'url',
	) );
	
	//google_plus_url
	$wp_customize->add_setting( 'ascreen_option[google_plus_url]', array(
		'default' => '#',
		'sanitize_callback' => 'ascreen_sanitize_url',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		//'type' => 'option'
	) );


	$wp_customize->add_control( 'ascreen_option[google_plus_url]', array(
		'label'		=> __( 'Google Plus URL:', 'ascreen' ),
		'section'	=> 'ascreen_social_url',
		'settings'	=> 'ascreen_option[google_plus_url]',
		'type'		=> 'url',
	) );

	//twitter_url
	$wp_customize->add_setting( 'ascreen_option[twitter_url]', array(
		'default' => '#',
		'sanitize_callback' => 'ascreen_sanitize_url',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		//'type' => 'option'
	) );


	$wp_customize->add_control( 'ascreen_option[twitter_url]', array(
		'label'		=> __( 'Twitter URL:', 'ascreen' ),
		'section'	=> 'ascreen_social_url',
		'settings'	=> 'ascreen_option[twitter_url]',
		'type'		=> 'url',
	) );	
}
add_action( 'customize_register', 'ascreen_customize_register' );

function ascreen_sanitize_url( $value ) {
      $value = esc_url_raw( $value);
      return $value;
}

