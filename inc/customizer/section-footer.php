<?php 
global $wp_customize, $appdetail_defaults;
/*adding sections for footer options*/
    $wp_customize->add_section( 'appdetail-footer-option', array(
        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Footer Option', 'appdetail' ),
        'panel'          => 'appdetail_panel',
    ) );
    /*copyright*/

    $wp_customize->add_setting( 'appdetail_theme_options[appdetail-footer-copyright]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $appdetail_defaults['appdetail-footer-copyright'],
        'sanitize_callback' => 'wp_kses_post'
    ) );

    $wp_customize->add_control( 'appdetail-footer-copyright', array(
        'label'     => __( 'Copyright Text', 'appdetail' ),
        'section'   => 'appdetail-footer-option',
        'settings'  => 'appdetail_theme_options[appdetail-footer-copyright]',
        'type'      => 'text',
        'priority'  => 10

    ) );