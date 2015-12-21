<?php
/*adding sections for breadcrumb */
$wp_customize->add_section( 'acmeblog-breadcrumb-options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Options', 'acmeblog' ),
    'panel'          => 'acmeblog-options'
) );

/*show breadcrumb*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-show-breadcrumb]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-show-breadcrumb'],
    'sanitize_callback' => 'acmeblog_sanitize_checkbox'
) );

$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-show-breadcrumb]', array(
    'label'		=> __( 'Enable Breadcrumb', 'acmeblog' ),
    'section'   => 'acmeblog-breadcrumb-options',
    'settings'  => 'acmeblog_theme_options[acmeblog-show-breadcrumb]',
    'type'	  	=> 'checkbox',
    'priority'  => 7
) );