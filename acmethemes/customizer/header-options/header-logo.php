<?php
/*adding sections for header logo options*/
$wp_customize->add_section( 'acmephoto-header-logo', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Logo Options', 'acmephoto' ),
    'panel'          => 'acmephoto-header-panel',
) );

/*header logo*/
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-header-logo]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-header-logo'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'acmephoto_theme_options[acmephoto-header-logo]',
        array(
            'label'		=> __( 'Logo', 'acmephoto' ),
            'section'   => 'acmephoto-header-logo',
            'settings'  => 'acmephoto_theme_options[acmephoto-header-logo]',
            'type'	  	=> 'image',
            'priority'  => 10
        )
    )
);

/*header logo alternative*/
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-header-alt]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-header-alt'],
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-header-alt]', array(
    'label'		=> __( 'Logo Alt Text', 'acmephoto' ),
    'section'   => 'acmephoto-header-logo',
    'settings'  => 'acmephoto_theme_options[acmephoto-header-alt]',
    'type'	  	=> 'text',
    'priority'  => 20
) );

/*header logo/text display options*/
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-header-id-display-opt]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-header-id-display-opt'],
    'sanitize_callback' => 'acmephoto_sanitize_select'
) );
$choices = acmephoto_header_id_display_opt();
$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-header-id-display-opt]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Logo/Site Title-Tagline Display Options', 'acmephoto' ),
    'section'   => 'acmephoto-header-logo',
    'settings'  => 'acmephoto_theme_options[acmephoto-header-id-display-opt]',
    'type'	  	=> 'radio',
    'priority'  => 30
) );