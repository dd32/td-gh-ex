<?php
/*adding sections for footer theme options panel*/
$wp_customize->add_section( 'acmeblog-footer', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Footer', 'acmeblog' ),
    'description'    => __( 'Customize options footer', 'acmeblog' ),
    'panel'  => 'acmeblog-options',
) );
/*footer copyright*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-footer-copyright]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-footer-copyright'],
    'sanitize_callback' => 'wp_kses_post',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-footer-copyright]', array(
    'label'		=> __( 'Copyright text', 'acmeblog' ),
    'section'   => 'acmeblog-footer',
    'settings'  => 'acmeblog_theme_options[acmeblog-footer-copyright]',
    'type'	  	=> 'text',
    'priority'  => 2,
) );

/*go to top checkbox*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-footer-up-enable]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-footer-up-enable'],
    'sanitize_callback' => 'wp_kses_post',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-footer-up-enable]', array(
    'label'		=> __( ' Show Back To Top', 'acmeblog' ),
    'section'   => 'acmeblog-footer',
    'settings'  => 'acmeblog_theme_options[acmeblog-footer-up-enable]',
    'type'	  	=> 'checkbox',
    'priority'  => 2,
) );