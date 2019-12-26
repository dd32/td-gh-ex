<?php 
global $wp_customize, $appdetail_defaults;
/*adding sections for Typography Option*/
    $wp_customize->add_section( 'appdetail-typography-option', array(

        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Typography Option', 'appdetail' ),
        'panel'          => 'appdetail_panel',
    ) );

    /*Typography Option For URL*/
    $wp_customize->add_setting( 'appdetail_theme_options[appdetail-font-family-url]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $appdetail_defaults['appdetail-font-family-url'],
        'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'appdetail-font-family-url', array(
        'label'       => __( 'Paragraph Font Family URL Text', 'appdetail' ),
        'section'     => 'appdetail-typography-option',
        'settings'    => 'appdetail_theme_options[appdetail-font-family-url]',
        'type'        => 'url',
        'priority'    => 10,
        'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
                __( 'Insert', 'appdetail' ),
                esc_url('https://www.google.com/fonts'),
                __('Enter Google Font URL' , 'appdetail'),
                __('to add google Font.' ,'appdetail')
                ),
    ) );



    /*Font Family Name*/

    $wp_customize->add_setting( 'appdetail_theme_options[appdetail-font-family-name]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $appdetail_defaults['appdetail-font-family-name'],
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'appdetail-font-family-name', array(
        'label'       => __( 'Paragraph Font Family Name', 'appdetail' ),
        'section'     => 'appdetail-typography-option',
        'settings'    => 'appdetail_theme_options[appdetail-font-family-name]',
        'type'        => 'text',
        'priority'    => 10,
        'description' => __( 'Insert Google Font Family Name.', 'appdetail' ),
    ) );