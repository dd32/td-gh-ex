<?php
/*adding sections for custom-css theme options panel*/
$wp_customize->add_section( 'acmeblog-custom-css', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Custom CSS', 'acmeblog' ),
    'description'    => __( 'Customize options custom-css', 'acmeblog' ),
    'panel'  => 'acmeblog-options',
) );
/*custom-css copyright*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-custom-css]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-custom-css'],
    'sanitize_callback' => 'acmeblog_sanitize_custom_css',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-custom-css]', array(
    'label'		=> __( 'Custom CSS', 'acmeblog' ),
    'section'   => 'acmeblog-custom-css',
    'settings'  => 'acmeblog_theme_options[acmeblog-custom-css]',
    'type'	  	=> 'textarea',
    'priority'  => 2,
) );