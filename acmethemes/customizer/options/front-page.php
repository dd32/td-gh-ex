<?php

/*adding sections for front-page theme options panel*/
$wp_customize->add_section( 'acmeblog-front', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Front Page/ Home Page', 'acmeblog' ),
    'description'    => __( 'Customize options front page slider', 'acmeblog' ),
    'panel'  => 'acmeblog-options',
) );
/*acmeblog-front start*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-front-cat]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-front-cat'],
    'sanitize_callback' => 'acmeblog_sanitize_number',
) );
$wp_customize->add_control(
    new Acmeblog_Customize_Category_Dropdown_Control(
        $wp_customize,
        'acmeblog_theme_options[acmeblog-front-cat]',
        array(
            'label'		=> __( 'Select category for slider', 'acmeblog' ),
            'section'   => 'acmeblog-front',
            'settings'  => 'acmeblog_theme_options[acmeblog-front-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 5,
        )
    )
);

/*front acmeblog post number*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-post-number]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-post-number'],
    'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-post-number]', array(
    'label'		=> __( 'Enter slider number', 'acmeblog' ),
    'section'   => 'acmeblog-front',
    'settings'  => 'acmeblog_theme_options[acmeblog-post-number]',
    'type'	  	=> 'number',
) );