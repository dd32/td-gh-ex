<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'acmephoto-feature-page', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Feature Page', 'acmephoto' ),
    'panel'          => 'acmephoto-feature-panel'
) );

/* feature page selection */
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-feature-page]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-feature-page'],
    'sanitize_callback' => 'acmephoto_sanitize_number'
) );


$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-feature-page]', array(
    'label'		    => __( 'Select a Page', 'acmephoto' ),
    'description'	=> __( 'Recommended to write short title, short content/excerpt and use featured image 1280*610 for the selected page below', 'acmephoto' ),
    'section'       => 'acmephoto-feature-page',
    'settings'      => 'acmephoto_theme_options[acmephoto-feature-page]',
    'type'	  	    => 'dropdown-pages',
    'priority'      => 10
) );

/*Button Options*/
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-feature-button-option]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-feature-button-option'],
    'sanitize_callback' => 'acmephoto_sanitize_select'
) );
$choices = acmephoto_feature_button_options();
$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-feature-button-option]', array(
    'choices'  	    => $choices,
    'label'		    => __( 'Feature Button Options', 'acmephoto' ),
    'section'       => 'acmephoto-feature-page',
    'settings'      => 'acmephoto_theme_options[acmephoto-feature-button-option]',
    'type'	  	    => 'select'
) );