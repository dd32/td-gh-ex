<?php
/**
 * Add Customizer Options
 * [Topbar Settings]
 */

function apex_business_topbar_settings_setup( $wp_customize ) {

    // Top Bar Section
    $wp_customize->add_section( 'apex_business_topbar_section', array(
        'title'       =>  __( 'Topbar Setup', 'apex-business' ),
        'capability'  => 'edit_theme_options',
        'priority'    =>  1
    ) );

    // Headline Setting
    $wp_customize->add_setting( 'apex_business_topbar_description_setting', array(
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'apex_business_topbar_description_control', array(
      'description'     => __( 'Goto Widgets section and add widgets for topbar contents. For Social Media links, goto Menus and create a menu and add your social media links and set the menu location as Social Menu.', 'apex-business' ),
      'section'         => 'apex_business_topbar_section',
      'settings'        => 'apex_business_topbar_description_setting',
      'type'            => 'hidden',
    ) ) );

    /******************************** Topbar Background Color *****************************/
    $wp_customize->add_setting( 'apex_business_introduction_background_color_setting', array(
        'default'           => APEX_BUSINESS_PRIMARY_COLOR,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'apex_business_introduction_background_color_control',
            array(
                'section'  => 'apex_business_topbar_section',
                'label'    => esc_html__( 'Background Color', 'apex-business' ),
                'settings' => 'apex_business_introduction_background_color_setting',
            )
        )
    );

    /******************************** Topbar Text Color *****************************/
    $wp_customize->add_setting( 'apex_business_introduction_text_color_setting', array(
    'default'           => APEX_BUSINESS_WHITE_COLOR,
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'apex_business_introduction_text_color_control',
            array(
                'section'  => 'apex_business_topbar_section',
                'label'    => esc_html__( 'Text Color', 'apex-business' ),
                'settings' => 'apex_business_introduction_text_color_setting',
            )
        )
    );
    $wp_customize->add_setting(
        'apex_business_topbar_vertical_spacing_control', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'apex_business_sanitize_range_value',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Apex_Business_Customizer_Range_Value_Control(
            $wp_customize, 'apex_business_topbar_vertical_spacing_control', array(
                'label'         => esc_html__( 'Header Vertical Spacing (px)','apex-business' ),
                'section'       => 'apex_business_topbar_section',
                'type'          => 'range-value',
                'priority'      => 25,
                'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 200,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 300,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 500,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
                ),
            )
        )
    );
}

add_action( 'customize_register', 'apex_business_topbar_settings_setup');
