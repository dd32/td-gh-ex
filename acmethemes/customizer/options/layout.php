<?php
/*adding sections for layout theme options panel*/
$wp_customize->add_section( 'acmeblog-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Layout', 'acmeblog' ),
    'description'    => '',
    'panel'  => 'acmeblog-options',
) );

/*global layout*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-global-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-global-layout'],
    'sanitize_callback' => 'acmeblog_sanitize_select',
) );

$choices = acmeblog_global_layout();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-global-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default layout', 'acmeblog' ),
    'section'   => 'acmeblog-layout',
    'settings'  => 'acmeblog_theme_options[acmeblog-global-layout]',
    'type'	  	=> 'select',
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-sidebar-layout'],
    'sanitize_callback' => 'acmeblog_sanitize_select',
) );
$choices = acmeblog_sidebar_layout();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default sidebar layout', 'acmeblog' ),
    'section'   => 'acmeblog-layout',
    'settings'  => 'acmeblog_theme_options[acmeblog-sidebar-layout]',
    'type'	  	=> 'select',
) );


/*blog layout*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-blog-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-blog-layout'],
    'sanitize_callback' => 'acmeblog_sanitize_select',
) );
$choices = acmeblog_blog_layout();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-blog-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default blog layout', 'acmeblog' ),
    'section'   => 'acmeblog-layout',
    'settings'  => 'acmeblog_theme_options[acmeblog-blog-layout]',
    'type'	  	=> 'select',
) );