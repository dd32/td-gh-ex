<?php 
global $wp_customize, $appdetail_defaults;
/*adding sections for category section in front page*/
$wp_customize->add_section( 'appdetail-screenshot-category', array(
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'title'          => __( 'Screenshot Section', 'appdetail' ),
    'description'    => __( 'Select the required category for the screenshot Recommended image for screenshot is 304 X 508', 'appdetail' ),
    'panel'=>'appdetail_panel'

) );

/* screenshot cat selection */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-screenshot-cat]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $appdetail_defaults['appdetail-screenshot-cat'],
    'sanitize_callback' => 'absint'
) );

$wp_customize->add_control(
    new appdetail_Customize_Category_Dropdown_Control(
        $wp_customize,
        'appdetail_theme_options[appdetail-screenshot-cat]',
        array(
            'label'		=> __( 'Select Category', 'appdetail' ),
            'section'   => 'appdetail-screenshot-category',
            'settings'  => 'appdetail_theme_options[appdetail-screenshot-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 10
        )
    )
);


/* screenshot Title Text */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-screenshot-title]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $appdetail_defaults['appdetail-screenshot-title'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-screenshot-title]', array(
            'label'     => __( 'Title Text', 'appdetail' ),
            'section'   => 'appdetail-screenshot-category',
            'settings'  => 'appdetail_theme_options[appdetail-screenshot-title]',
            'type'      => 'text',
            'priority'  => 10
    )
);

/* screenshot Decsription Text */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-screenshot-description]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $appdetail_defaults['appdetail-screenshot-description'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-screenshot-description]', array(
            'label'     => __( 'Decsription Text', 'appdetail' ),
            'section'   => 'appdetail-screenshot-category',
            'settings'  => 'appdetail_theme_options[appdetail-screenshot-description]',
            'type'      => 'text',
            'priority'  => 10
    )
);