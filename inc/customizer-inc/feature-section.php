<?php 
/*adding sections for category section in front page*/
$wp_customize->add_section( 'appdetail-feature-category', array(
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'title'          => __( 'Slider Section', 'appdetail' ),
    'description'    => __( 'Select the required category for the slider Recommended image for slider is 250*444', 'appdetail' ),
    'panel'=>'appdetail_panel'

) );

/* feature cat selection */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-feature-cat]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['appdetail-feature-cat'],
    'sanitize_callback' => 'absint'
) );

$wp_customize->add_control(
    new appdetail_Customize_Category_Dropdown_Control(
        $wp_customize,
        'appdetail_theme_options[appdetail-feature-cat]',
        array(
            'label'		=> __( 'Select Category', 'appdetail' ),
            'section'   => 'appdetail-feature-category',
            'settings'  => 'appdetail_theme_options[appdetail-feature-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 10
        )
    )
);

/* Slider Image URL */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-slider-background-image]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['appdetail-slider-background-image'],
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-slider-background-image]', array(
            'label'     => __( 'Slider Image URL', 'appdetail' ),
            'section'   => 'appdetail-feature-category',
            'settings'  => 'appdetail_theme_options[appdetail-slider-background-image]',
            'type'      => 'text',
            'priority'  => 10
    )
);

/* Slider Title Text */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-slider-title]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['appdetail-slider-title'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-slider-title]', array(
            'label'     => __( 'Title Text', 'appdetail' ),
            'section'   => 'appdetail-feature-category',
            'settings'  => 'appdetail_theme_options[appdetail-slider-title]',
            'type'      => 'text',
            'priority'  => 10
    )
);

/* Slider Decsription Text */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-slider-description]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['appdetail-slider-description'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-slider-description]', array(
            'label'     => __( 'Decsription Text', 'appdetail' ),
            'section'   => 'appdetail-feature-category',
            'settings'  => 'appdetail_theme_options[appdetail-slider-description]',
            'type'      => 'text',
            'priority'  => 10
    )
);

/* Slider Video URL */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-slider-video-url]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['appdetail-slider-video-url'],
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-slider-video-url]', array(
            'label'     => __( 'Slider Video URL', 'appdetail' ),
            'section'   => 'appdetail-feature-category',
            'settings'  => 'appdetail_theme_options[appdetail-slider-video-url]',
            'type'      => 'text',
            'priority'  => 10
    )
);
/* Slider Read More Text */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-slider-read-more]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['appdetail-slider-read-more'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-slider-read-more]', array(
            'label'		=> __( 'Read More Text', 'appdetail' ),
            'section'   => 'appdetail-feature-category',
            'settings'  => 'appdetail_theme_options[appdetail-slider-read-more]',
            'type'	  	=> 'text',
            'priority'  => 10
    )
);