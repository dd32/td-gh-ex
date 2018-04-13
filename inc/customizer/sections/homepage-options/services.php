<?php
/**
 * Services Section
 *
 * @package agency-x
 */

add_action( 'customize_register', 'agency_x_customize_register_services_section' );

function agency_x_customize_register_services_section( $wp_customize ) {

    $wp_customize->add_section( 'services_section', array(
    'priority' => 4,
    'title' => esc_attr__( 'Services Section', 'agency-x' ),
    'description' => esc_attr__( 'Services Section', 'agency-x' ),
    'panel' => 'homepage_panel'
    ) );

    $wp_customize->add_setting( 'services_display', array(
    'sanitize_callback' => 'agency_x_sanitize_checkbox',
    'default' => true
    ) );

    $wp_customize->add_control( 'services_display', array(
    'label' => esc_attr__( 'Display?','agency-x' ),
    'section' => 'services_section',
    'settings' => 'services_display',
    'type' => 'checkbox',
    'priority' => 1
    ) );

    $wp_customize->add_setting( 'services_section_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    ) );

    $wp_customize->add_control( 'services_section_title', array(
        'label' => esc_attr__( 'Add a Title','agency-x' ),
        'section' => 'services_section',
        'settings' => 'services_section_title',
        'type' => 'text',
        'priority' => 2
    ) );

    $wp_customize->add_setting( 'services_section_description', array(
        'default' => '',        
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'services_section_description', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'services_section',
        'label' => esc_attr__( 'Short Description', 'agency-x' ),
        'description' => esc_attr__( 'Short Description', 'agency-x' ),
    ) );


    $wp_customize->add_setting( 'services_category', array(
        'sanitize_callback' => 'agency_x_sanitize_category',
        'default' => ''
    ) );

    $wp_customize->add_control( new Agency_X_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'services_category', array(
        'label' => esc_attr__( 'Choose category', 'agency-x' ),
        'section' => 'services_section',
        'settings' => 'services_category',
        'type'=> 'dropdown-taxonomies'
    ) ) );
}