<?php 
global $wp_customize, $defaults;
/*adding sections for category section in front page*/
$wp_customize->add_section( 'appdetail-testimonial-category', array(
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'title'          => __( 'Testimonial Section', 'appdetail' ),
    'description'    => __( 'Select the required category for the testimonial Recommended image for testimonial is 113X113', 'appdetail' ),
    'panel'=>'appdetail_panel'

) );

/* testimonial cat selection */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-testimonial-cat]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['appdetail-testimonial-cat'],
    'sanitize_callback' => 'absint'
) );

$wp_customize->add_control(
    new appdetail_Customize_Category_Dropdown_Control(
        $wp_customize,
        'appdetail_theme_options[appdetail-testimonial-cat]',
        array(
            'label'		=> __( 'Select Category', 'appdetail' ),
            'section'   => 'appdetail-testimonial-category',
            'settings'  => 'appdetail_theme_options[appdetail-testimonial-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 10
        )
    )
);


/* testimonial Title Text */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-testimonial-title]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['appdetail-testimonial-title'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-testimonial-title]', array(
            'label'     => __( 'Title Text', 'appdetail' ),
            'section'   => 'appdetail-testimonial-category',
            'settings'  => 'appdetail_theme_options[appdetail-testimonial-title]',
            'type'      => 'text',
            'priority'  => 10
    )
);

/* testimonial Decsription Text */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-testimonial-description]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['appdetail-testimonial-description'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-testimonial-description]', array(
            'label'     => __( 'Decsription Text', 'appdetail' ),
            'section'   => 'appdetail-testimonial-category',
            'settings'  => 'appdetail_theme_options[appdetail-testimonial-description]',
            'type'      => 'text',
            'priority'  => 10
    )
);