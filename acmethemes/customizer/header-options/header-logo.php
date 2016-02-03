<?php
/*adding sections for header logo options*/
$wp_customize->add_section( 'acmeblog-header-logo', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Logo Options', 'acmeblog' ),
    'panel'          => 'acmeblog-header-panel'
) );

/*header logo*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-header-logo]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-header-logo'],
    'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'acmeblog_theme_options[acmeblog-header-logo]',
        array(
            'label'		=> __( 'Logo', 'acmeblog' ),
            'section'   => 'acmeblog-header-logo',
            'settings'  => 'acmeblog_theme_options[acmeblog-header-logo]',
            'type'	  	=> 'image',
            'priority'  => 10
        )
    )
);

/*header logo alternative*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-header-alt]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-header-alt'],
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-header-alt]', array(
    'label'		=> __( 'Logo Alt Text', 'acmeblog' ),
    'section'   => 'acmeblog-header-logo',
    'settings'  => 'acmeblog_theme_options[acmeblog-header-alt]',
    'type'	  	=> 'text',
    'priority'  => 20
) );

/*header logo/text display options*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-header-id-display-opt]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-header-id-display-opt'],
    'sanitize_callback' => 'acmeblog_sanitize_select'
) );
$choices = acmeblog_header_id_display_opt();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-header-id-display-opt]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Logo/Site Title-Tagline Display Options', 'acmeblog' ),
    'section'   => 'acmeblog-header-logo',
    'settings'  => 'acmeblog_theme_options[acmeblog-header-id-display-opt]',
    'type'	  	=> 'radio',
    'priority'  => 20
) );