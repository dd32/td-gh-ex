<?php
/*adding sections for blog layout options*/
$wp_customize->add_section( 'acmeblog-design-blog-layout-option', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Default Blog Layout', 'acmeblog' ),
    'panel'          => 'acmeblog-design-panel'
) );

/*blog layout*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-blog-archive-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-blog-archive-layout'],
    'sanitize_callback' => 'acmeblog_sanitize_select'
) );
$choices = acmeblog_blog_layout();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-blog-archive-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default Blog Layout', 'acmeblog' ),
    'section'   => 'acmeblog-design-blog-layout-option',
    'settings'  => 'acmeblog_theme_options[acmeblog-blog-archive-layout]',
    'type'	  	=> 'select'
) );