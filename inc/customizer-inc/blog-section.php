<?php 
/*adding sections for category section in front page*/
$wp_customize->add_section( 'appdetail-blog-category', array(
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'blog Section', 'appdetail' ),
    'description'    => esc_html__( 'Select the required category for the blog Recommended image for blog is 70X71', 'appdetail' ),
    'panel'=>'appdetail_panel'

) );

/* blog cat selection */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-blog-cat]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['appdetail-blog-cat'],
    'sanitize_callback' => 'absint'
) );

$wp_customize->add_control(
    new appdetail_Customize_Category_Dropdown_Control(
        $wp_customize,
        'appdetail_theme_options[appdetail-blog-cat]',
        array(
            'label'		=> esc_html__( 'Select Category', 'appdetail' ),
            'section'   => 'appdetail-blog-category',
            'settings'  => 'appdetail_theme_options[appdetail-blog-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 10
        )
    )
);


/* blog Title Text */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-blog-title]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['appdetail-blog-title'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-blog-title]', array(
            'label'     => esc_html__( 'Title Text', 'appdetail' ),
            'section'   => 'appdetail-blog-category',
            'settings'  => 'appdetail_theme_options[appdetail-blog-title]',
            'type'      => 'text',
            'priority'  => 10
    )
);

/* blog Decsription Text */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-blog-description]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['appdetail-blog-description'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-blog-description]', array(
            'label'     => esc_html__( 'Decsription Text', 'appdetail' ),
            'section'   => 'appdetail-blog-category',
            'settings'  => 'appdetail_theme_options[appdetail-blog-description]',
            'type'      => 'text',
            'priority'  => 10
    )
);