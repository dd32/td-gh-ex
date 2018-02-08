<?php
/**
 * Team Section
 *
 * @package agency-x
 */

add_action( 'customize_register', 'agency_x_customize_register_team_section' );

function agency_x_customize_register_team_section( $wp_customize ) {

    $wp_customize->add_section( 'team_section', array(
    'priority' => 4,
    'title' => esc_attr__( 'Team Section', 'agency-x' ),
    'description' => esc_attr__( 'Team Section', 'agency-x' ),
    'panel' => 'homepage_panel'
    ) );

    $wp_customize->add_setting( 'team_display', array(
    'sanitize_callback' => 'agency_x_sanitize_checkbox',
    'default' => true
    ) );

    $wp_customize->add_control( 'team_display', array(
    'label' => esc_attr__( 'Display?','agency-x' ),
    'section' => 'team_section',
    'settings' => 'team_display',
    'type' => 'checkbox',
    'priority' => 1
    ) );

    $wp_customize->add_setting( 'team_section_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    ) );

    $wp_customize->add_control( 'team_section_title', array(
        'label' => esc_attr__( 'Add a Title','agency-x' ),
        'section' => 'team_section',
        'settings' => 'team_section_title',
        'type' => 'text',
        'priority' => 2
    ) );

    $wp_customize->add_setting( 'team_section_description', array(
        'default' => '',        
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'team_section_description', array(
        'type' => 'textarea',
        'priority' => 10,
        'section' => 'team_section',
        'label' => esc_attr__( 'Short Description', 'agency-x' ),
        'description' => esc_attr__( 'Short Description', 'agency-x' ),
    ) );


    $wp_customize->add_setting( 'team_category', array(
        'sanitize_callback' => 'agency_x_sanitize_category',
        'default' => ''
    ) );

    $wp_customize->add_control( new Agency_X_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'team_category', array(
        'label' => esc_attr__( 'Choose category', 'agency-x' ),
        'section' => 'team_section',
        'settings' => 'team_category',
        'type'=> 'dropdown-taxonomies'
    ) ) );
}