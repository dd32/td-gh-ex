<?php
/*adding sections for header theme options panel*/
$wp_customize->add_section( 'acmeblog-single', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Related posts options', 'acmeblog' ),
    'description'    => __( 'Manage related posts', 'acmeblog' ),
    'panel'  => 'acmeblog-options',
) );

/*control for acmeblog image*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-show-image]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-show-image'],
    'sanitize_callback' => 'acmeblog_sanitize_checkbox',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-show-image]', array(
    'label'		=> __( 'Show image', 'acmeblog' ),
    'section'   => 'acmeblog-single',
    'settings'  => 'acmeblog_theme_options[acmeblog-show-image]',
    'type'	  	=> 'checkbox',
    'priority'  => 3,
    'active_callback'  => ''
) );

/*control for acmeblog image*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-hide-related]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-hide-related'],
    'sanitize_callback' => 'acmeblog_sanitize_checkbox',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-hide-related]', array(
    'label'		=> __( 'Hide related posts', 'acmeblog' ),
    'section'   => 'acmeblog-single',
    'settings'  => 'acmeblog_theme_options[acmeblog-hide-related]',
    'type'	  	=> 'checkbox',
    'priority'  => 3,
    'active_callback'  => ''
) );
