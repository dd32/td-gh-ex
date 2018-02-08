<?php
/**
 * Welcome Section
 *
 * @package agency-x
 */

add_action( 'customize_register', 'agency_x_customize_register_welcome_section' );

function agency_x_customize_register_welcome_section( $wp_customize ) {

    $wp_customize->add_section( 'welcome_section', array(
    'priority' => 4,
    'title' => esc_attr__( 'Welcome Section', 'agency-x' ),
    'description' => esc_attr__( 'Welcome Section', 'agency-x' ),
    'panel' => 'homepage_panel'
    ) );

    $wp_customize->add_setting( 'welcome_section_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    ) );

    $wp_customize->add_control( 'welcome_section_title', array(
        'label' => esc_attr__( 'Add a Title','agency-x' ),
        'section' => 'welcome_section',
        'settings' => 'welcome_section_title',
        'type' => 'text',
        'priority' => 2
    ) );

    $wp_customize->add_setting( 'welcome_section_description', array(
        'default' => '',        
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'welcome_section_description', array(
        'type' => 'textarea',
        'priority' => 10,
        'section' => 'welcome_section',
        'label' => esc_attr__( 'Section Description', 'agency-x' ),
        'description' => esc_attr__( 'Section Short Description', 'agency-x' ),
    ) );

    $wp_customize->add_setting( 'welcome_section_page', array(
      'default'     => '',
      'sanitize_callback' => 'agency_x_sanitize_dropdown_pages'
    ) );

    $wp_customize->add_control( 'welcome_section_page', array(
      'label'                 =>  esc_attr__( 'Select Page For Welcome Section', 'agency-x' ),
      'section'               => 'welcome_section',
      'type'                  => 'dropdown-pages',
      'priority'              => 30,
      'settings' => 'welcome_section_page'
    ) );

}