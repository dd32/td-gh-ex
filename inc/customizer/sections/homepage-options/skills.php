<?php
/**
 * Skills Section
 *
 * @package agency-x
 */

add_action( 'customize_register', 'agency_x_customize_register_skills_section' );

function agency_x_customize_register_skills_section( $wp_customize ) {

    $wp_customize->add_section( 'skills_section', array(
    'priority' => 4,
    'title' => esc_attr__( 'Skills Section', 'agency-x' ),
    'description' => esc_attr__( 'Skills Section', 'agency-x' ),
    'panel' => 'homepage_panel'
    ) );

    $wp_customize->add_setting( 'skills_display', array(
    'sanitize_callback' => 'agency_x_sanitize_checkbox',
    'default' => true
    ) );

    $wp_customize->add_control( 'skills_display', array(
    'label' => esc_attr__( 'Display?','agency-x' ),
    'section' => 'skills_section',
    'settings' => 'skills_display',
    'type' => 'checkbox',
    'priority' => 1
    ) );

    $wp_customize->add_setting( 'skills_section_page', array(
      'default'     => '',
      'sanitize_callback' => 'agency_x_sanitize_dropdown_pages'
    ) );

    $wp_customize->add_control( 'skills_section_page', array(
      'label'                 =>  esc_attr__( 'Select Page For Skills Section', 'agency-x' ),
      'section'               => 'skills_section',
      'type'                  => 'dropdown-pages',
      'priority'              => 30,
      'settings' => 'skills_section_page'
    ) );

}