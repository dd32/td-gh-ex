<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'acmeblog-feature-category', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Category Slider Selection', 'acmeblog' ),
    'panel'          => 'acmeblog-feature-panel'
) );

/* feature cat selection */
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-feature-cat]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-feature-cat'],
    'sanitize_callback' => 'acmeblog_sanitize_number'
) );

$wp_customize->add_control(
    new Acmeblog_Customize_Category_Dropdown_Control(
        $wp_customize,
        'acmeblog_theme_options[acmeblog-feature-cat]',
        array(
            'label'		=> __( 'Select Category For Slider', 'acmeblog' ),
            'section'   => 'acmeblog-feature-category',
            'settings'  => 'acmeblog_theme_options[acmeblog-feature-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 5
        )
    )
);
