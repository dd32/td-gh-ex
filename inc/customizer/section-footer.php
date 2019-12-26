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

    /*go to top*/

    $wp_customize->add_setting( 'appdetail_theme_options[appdetail-footer-totop]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $appdetail_defaults['appdetail-footer-totop'],
        'sanitize_callback' => 'appdetail_sanitize_checkbox'
    ) );

    $wp_customize->add_control( 'appdetail-footer-totop', array(
        'label'     => __( 'Go To Top Option', 'appdetail' ),
        'section'   => 'appdetail-footer-option',
        'settings'  => 'appdetail_theme_options[appdetail-footer-totop]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );