<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'acmephoto-feature-page', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Feature Slider Selection', 'acmephoto' ),
    'panel'          => 'acmephoto-feature-panel'
) );

/* feature parent page selection */
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-feature-page]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-feature-page'],
    'sanitize_callback' => 'acmephoto_sanitize_number'
) );
$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-feature-page]', array(
    'label'		    => __( 'Select Parent Page for Feature Slider', 'acmephoto' ),
    'description'   => __( 'Select parent page and its sub-pages will be shown is slider. Please note that the slider background image can be set from Header-Options -> Header Image', 'acmephoto' ),
    'section'       => 'acmephoto-feature-page',
    'settings'      => 'acmephoto_theme_options[acmephoto-feature-page]',
    'type'	  	    => 'dropdown-pages',
    'priority'      => 10
) );

/* number of slider*/
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-featured-slider-number]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-featured-slider-number'],
    'sanitize_callback' => 'acmephoto_sanitize_select'
) );
$choices = acmephoto_featured_slider_number();
$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-featured-slider-number]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Number Of Slider', 'acmephoto' ),
    'section'   => 'acmephoto-feature-page',
    'settings'  => 'acmephoto_theme_options[acmephoto-featured-slider-number]',
    'type'	  	=> 'select',
    'priority'  => 20
) );