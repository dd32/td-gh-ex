<?php
/*adding sections for footer social options */
$wp_customize->add_section( 'acmephoto-footer-social', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Social Options', 'acmephoto' ),
    'panel'          => 'acmephoto-footer-panel'
) );

/*facebook url*/
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-facebook-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-facebook-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-facebook-url]', array(
    'label'		=> __( 'Facebook url', 'acmephoto' ),
    'section'   => 'acmephoto-footer-social',
    'settings'  => 'acmephoto_theme_options[acmephoto-facebook-url]',
    'type'	  	=> 'url',
    'priority'  => 10
) );

/*twitter url*/
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-twitter-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-twitter-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-twitter-url]', array(
    'label'		=> __( 'Twitter url', 'acmephoto' ),
    'section'   => 'acmephoto-footer-social',
    'settings'  => 'acmephoto_theme_options[acmephoto-twitter-url]',
    'type'	  	=> 'url',
    'priority'  => 20
) );

/*youtube url*/
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-youtube-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-youtube-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-youtube-url]', array(
    'label'		=> __( 'Youtube url', 'acmephoto' ),
    'section'   => 'acmephoto-footer-social',
    'settings'  => 'acmephoto_theme_options[acmephoto-youtube-url]',
    'type'	  	=> 'url',
    'priority'  => 30
) );

/*enable social*/
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-enable-social]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-enable-social'],
    'sanitize_callback' => 'acmephoto_sanitize_checkbox',
) );
$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-enable-social]', array(
    'label'		=> __( 'Enable social', 'acmephoto' ),
    'section'   => 'acmephoto-footer-social',
    'settings'  => 'acmephoto_theme_options[acmephoto-enable-social]',
    'type'	  	=> 'checkbox',
    'priority'  => 40
) );