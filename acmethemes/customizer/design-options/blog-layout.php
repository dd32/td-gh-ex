<?php
/*adding sections for blog layout options*/
$wp_customize->add_section( 'acmephoto-design-blog-layout-option', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Default Blog/Archive Layout', 'acmephoto' ),
    'panel'          => 'acmephoto-design-panel'
) );

/*blog layout*/
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-blog-archive-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-blog-archive-layout'],
    'sanitize_callback' => 'acmephoto_sanitize_select'
) );
$choices = acmephoto_blog_layout();
$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-blog-archive-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default Blog/Archive Layout', 'acmephoto' ),
    'description'=> __( 'Image display options', 'acmephoto' ),
    'section'   => 'acmephoto-design-blog-layout-option',
    'settings'  => 'acmephoto_theme_options[acmephoto-blog-archive-layout]',
    'type'	  	=> 'select'
) );