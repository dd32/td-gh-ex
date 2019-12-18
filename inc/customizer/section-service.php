<?php 
global $wp_customize, $defaults;
/*adding sections for category section in front page*/
$wp_customize->add_section( 'appdetail-service-category', array(
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'title'          => __( 'Service Section', 'appdetail' ),
    'description'    => __( 'Select the required category for the service Recommended image for service is 70X71', 'appdetail' ),
    'panel'=>'appdetail_panel'

) );

/* service cat selection */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-service-cat]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['appdetail-service-cat'],
    'sanitize_callback' => 'absint'
) );

$wp_customize->add_control(
    new appdetail_Customize_Category_Dropdown_Control(
        $wp_customize,
        'appdetail_theme_options[appdetail-service-cat]',
        array(
            'label'		=> __( 'Select Category', 'appdetail' ),
            'section'   => 'appdetail-service-category',
            'settings'  => 'appdetail_theme_options[appdetail-service-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 10
        )
    )
);


/* service Title Text */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-service-title]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['appdetail-service-title'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-service-title]', array(
            'label'     => __( 'Title Text', 'appdetail' ),
            'section'   => 'appdetail-service-category',
            'settings'  => 'appdetail_theme_options[appdetail-service-title]',
            'type'      => 'text',
            'priority'  => 10
    )
);

/* service Decsription Text */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-service-description]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['appdetail-service-description'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-service-description]', array(
            'label'     => __( 'Decsription Text', 'appdetail' ),
            'section'   => 'appdetail-service-category',
            'settings'  => 'appdetail_theme_options[appdetail-service-description]',
            'type'      => 'text',
            'priority'  => 10
    )
);