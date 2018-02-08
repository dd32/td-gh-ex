<?php
/**
 * Clients Section
 *
 * @package agency-x
 */

add_action( 'customize_register', 'agency_x_customize_register_clients_section' );

function agency_x_customize_register_clients_section( $wp_customize ) {

    $wp_customize->add_section( 'clients_section', array(
    'priority' => 4,
    'title' => esc_attr__( 'Clients Section', 'agency-x' ),
    'description' => esc_attr__( 'Clients Section', 'agency-x' ),
    'panel' => 'homepage_panel'
    ) );

    $wp_customize->add_setting( 'clients_display', array(
    'sanitize_callback' => 'agency_x_sanitize_checkbox',
    'default' => true
    ) );

    $wp_customize->add_control( 'clients_display', array(
    'label' => esc_attr__( 'Display?','agency-x' ),
    'section' => 'clients_section',
    'settings' => 'clients_display',
    'type' => 'checkbox',
    'priority' => 1
    ) );
    
    $wp_customize->add_setting( 'clients_category', array(
        'sanitize_callback' => 'agency_x_sanitize_category',
        'default' => ''
    ) );

    $wp_customize->add_control( new Agency_X_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'clients_category', array(
        'label' => esc_attr__( 'Choose category', 'agency-x' ),
        'section' => 'clients_section',
        'settings' => 'clients_category',
        'type'=> 'dropdown-taxonomies'
    ) ) );
}