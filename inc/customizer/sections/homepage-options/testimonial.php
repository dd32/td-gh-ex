<?php
/**
 * Testimonial Section
 *
 * @package agency-x
 */

add_action( 'customize_register', 'agency_x_customize_register_testimonial_section' );

function agency_x_customize_register_testimonial_section( $wp_customize ) {

    $wp_customize->add_section( 'testimonial_section', array(
    'priority' => 4,
    'title' => esc_attr__( 'Testimonial Section', 'agency-x' ),
    'description' => esc_attr__( 'Testimonial Section', 'agency-x' ),
    'panel' => 'homepage_panel'
    ) );

    $wp_customize->add_setting( 'testimonial_display', array(
    'sanitize_callback' => 'agency_x_sanitize_checkbox',
    'default' => true
    ) );

    $wp_customize->add_control( 'testimonial_display', array(
    'label' => esc_attr__( 'Display?','agency-x' ),
    'section' => 'testimonial_section',
    'settings' => 'testimonial_display',
    'type' => 'checkbox',
    'priority' => 1
    ) );

    $wp_customize->add_setting( 'testimonial_section_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    ) );

    $wp_customize->add_control( 'testimonial_section_title', array(
        'label' => esc_attr__( 'Add a Title','agency-x' ),
        'section' => 'testimonial_section',
        'settings' => 'testimonial_section_title',
        'type' => 'text',
        'priority' => 2
    ) );


    $wp_customize->add_setting( 'testimonial_category', array(
        'sanitize_callback' => 'agency_x_sanitize_category',
        'default' => ''
    ) );

    $wp_customize->add_control( new Agency_X_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'testimonial_category', array(
        'label' => esc_attr__( 'Choose category', 'agency-x' ),
        'section' => 'testimonial_section',
        'settings' => 'testimonial_category',
        'type'=> 'dropdown-taxonomies'
    ) ) );
}