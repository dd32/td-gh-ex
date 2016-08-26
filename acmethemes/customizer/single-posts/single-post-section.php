<?php
/*adding sections for Single post options*/
$wp_customize->add_section( 'acmephoto-single-post', array(
    'priority'       => 200,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Single Post Options', 'acmephoto' )
) );

/*show related posts*/
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-show-related]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-show-related'],
    'sanitize_callback' => 'acmephoto_sanitize_checkbox'
) );
$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-show-related]', array(
    'label'		=> __( 'Show Related Images In Single Post', 'acmephoto' ),
    'section'   => 'acmephoto-single-post',
    'settings'  => 'acmephoto_theme_options[acmephoto-show-related]',
    'type'	  	=> 'checkbox',
    'priority'  => 3
) );
