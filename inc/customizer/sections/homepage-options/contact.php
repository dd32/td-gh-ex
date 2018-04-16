<?php
/**
 * Contact Section
 *
 * @package agency-x
 */

add_action( 'customize_register', 'agency_x_customize_register_contact_section' );

function agency_x_customize_register_contact_section( $wp_customize ) {

    $wp_customize->add_section( 'contact_section', array(
    'priority' => 4,
    'title' => esc_attr__( 'Contact Section', 'agency-x' ),
    'description' => esc_attr__( 'Contact Section', 'agency-x' ),
    'panel' => 'homepage_panel'
    ) );

    $wp_customize->add_setting( 'contact_display', array(
    'sanitize_callback' => 'agency_x_sanitize_checkbox',
    'default' => true
    ) );

    $wp_customize->add_control( 'contact_display', array(
    'label' => esc_attr__( 'Display?','agency-x' ),
    'section' => 'contact_section',
    'settings' => 'contact_display',
    'type' => 'checkbox',
    'priority' => 1
    ) );

    $wp_customize->add_setting( 'contact_section_page', array(
      'default'     => '',
      'sanitize_callback' => 'agency_x_sanitize_dropdown_pages'
    ) );

    $wp_customize->add_control( 'contact_section_page', array(
      'label'                 =>  esc_attr__( 'Select Page For Contact Section', 'agency-x' ),
      'section'               => 'contact_section',
      'type'                  => 'dropdown-pages',
      'priority'              => 30,
      'settings' => 'contact_section_page'
    ) );

    $wp_customize->add_setting( 'contact_form_code', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'contact_form_code', array(
        'label'                 =>  __( 'Contact Section Use Shortcode', 'agency-x' ),
        'description'           =>  __( 'eg [contact-form-7 id="108" title="Contact form 1"]', 'agency-x' ),
        'section'               => 'contact_section',
        'type'                  => 'text',
        'priority'              => 40,
        'settings' => 'contact_form_code',
    ) );
 }