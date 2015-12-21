<?php
/*adding sections for Single post options*/
$wp_customize->add_section( 'acmeblog-single-post', array(
    'priority'       => 200,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Single Post Options', 'acmeblog' )
) );

/*show rlated posts*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-show-related]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-show-related'],
    'sanitize_callback' => 'acmeblog_sanitize_checkbox'
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-show-related]', array(
    'label'		=> __( 'Show Related Posts In Single Post', 'acmeblog' ),
    'section'   => 'acmeblog-single-post',
    'settings'  => 'acmeblog_theme_options[acmeblog-show-related]',
    'type'	  	=> 'checkbox',
    'priority'  => 3
) );
