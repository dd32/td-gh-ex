<?php
/*adding sections for footer options*/
$wp_customize->add_section( 'acmephoto-footer-option', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Copyright Text', 'acmephoto' ),
    'panel'          => 'acmephoto-footer-panel',
) );

/*copyright*/
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-footer-copyright]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-footer-copyright'],
    'sanitize_callback' => 'wp_kses_post'
) );
$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-footer-copyright]', array(
    'label'		=> __( 'Copyright Text', 'acmephoto' ),
    'section'   => 'acmephoto-footer-option',
    'settings'  => 'acmephoto_theme_options[acmephoto-footer-copyright]',
    'type'	  	=> 'text',
    'priority'  => 2
) );