<?php
/**
 * Works Section
 *
 * @package agency-x
 */

add_action( 'customize_register', 'agency_x_customize_register_works_section' );

function agency_x_customize_register_works_section( $wp_customize ) {

    $wp_customize->add_section( 'works_section', array(
    'priority' => 4,
    'title' => esc_attr__( 'Works Section', 'agency-x' ),
    'description' => esc_attr__( 'Works Section', 'agency-x' ),
    'panel' => 'homepage_panel'
    ) );

    $wp_customize->add_setting( 'works_display', array(
    'sanitize_callback' => 'agency_x_sanitize_checkbox',
    'default' => true
    ) );

    $wp_customize->add_control( 'works_display', array(
    'label' => esc_attr__( 'Display?','agency-x' ),
    'section' => 'works_section',
    'settings' => 'works_display',
    'type' => 'checkbox',
    'priority' => 1
    ) );

    $wp_customize->add_setting( 'works_section_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    ) );

    $wp_customize->add_control( 'works_section_title', array(
        'label' => esc_attr__( 'Add a Title','agency-x' ),
        'section' => 'works_section',
        'settings' => 'works_section_title',
        'type' => 'text',
        'priority' => 2
    ) );

    $wp_customize->add_setting( 'works_section_description', array(
        'default' => '',        
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'works_section_description', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'works_section',
        'label' => esc_attr__( 'Short Description', 'agency-x' ),
        'description' => esc_attr__( 'Short Description', 'agency-x' ),
    ) );


    $wp_customize->add_setting( 'works_category', array(
        'sanitize_callback' => 'agency_x_sanitize_category',
        'default' => ''
    ) );

    $wp_customize->add_control( new Agency_X_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'works_category', array(
        'label' => esc_attr__( 'Choose category', 'agency-x' ),
        'section' => 'works_section',
        'settings' => 'works_category',
        'type'=> 'dropdown-taxonomies'
    ) ) );
}