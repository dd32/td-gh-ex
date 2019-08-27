<?php 
/*adding sections for color Option*/
    $wp_customize->add_section( 'appdetail-color-option', array(

        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => esc_html__( 'Color Options', 'appdetail' ),
        'panel'          => 'appdetail_panel',
    ) );

    /*Default Color Option */
    $wp_customize->add_setting( 'appdetail_theme_options[appdetail-default-color]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['appdetail-default-color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    $wp_customize->add_control( 'appdetail-default-color', array(
        'label'       => esc_html__( 'Primary Color', 'appdetail' ),
        'section'     => 'appdetail-color-option',
        'settings'    => 'appdetail_theme_options[appdetail-default-color]',
        'type'        => 'color',
        'priority'    => 10,
    ) );

    /*Site title and Tagline Color Option */
    $wp_customize->add_setting( 'appdetail_theme_options[appdetail-title-tagline-color]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['appdetail-title-tagline-color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    $wp_customize->add_control( 'appdetail-title-tagline-color', array(
        'label'       => esc_html__( 'Site Title Color', 'appdetail' ),
        'section'     => 'appdetail-color-option',
        'settings'    => 'appdetail_theme_options[appdetail-title-tagline-color]',
        'type'        => 'color',
        'priority'    => 10,
    ) );
    /*Site Tagline Color Option */
    $wp_customize->add_setting( 'appdetail_theme_options[appdetail-tagline-color]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['appdetail-tagline-color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    $wp_customize->add_control( 'appdetail-tagline-color', array(
        'label'       => esc_html__( 'Site Tagline Color', 'appdetail' ),
        'section'     => 'appdetail-color-option',
        'settings'    => 'appdetail_theme_options[appdetail-tagline-color]',
        'type'        => 'color',
        'priority'    => 10,
    ) );