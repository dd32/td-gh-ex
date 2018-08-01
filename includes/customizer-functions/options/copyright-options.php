<?php
$prefix = atlast_agency_get_prefix();
$wp_customize->add_section( $prefix . '_copyright_section', array(
    'priority'       => 17,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Copyright section', 'atlast-agency' ),
    'description'    => '',
    'panel'          => $prefix . '_theme_panel',
) );

/*== Copyright section settings ==*/

$wp_customize->add_setting( $prefix . '_copyright_layout', array(
    'default'           => 1,
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'atlast_agency_sanitize_number_absint',
) );

$wp_customize->add_setting( $prefix . '_copyright_text', array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( $prefix . '_copyright_layout', array(
    'type'        => 'select',
    'priority'    => 10,
    'section'     => $prefix . '_copyright_section',
    'label'       => esc_html__( 'Select the copyright section style', 'atlast-agency' ),
    'description' => esc_html__( 'There are more than one to choose from. Please refer to the documentation to view the available layouts.', 'atlast-agency' ),
    'choices'     => array(
        1 => esc_html__( 'Style 1', 'atlast-agency' ),
        2 => esc_html__( 'Style 2', 'atlast-agency' ),
        3 => esc_html__( 'Style 3', 'atlast-agency' ),
        4 => esc_html__( 'Style 4', 'atlast-agency' ),
    )
) );

$wp_customize->add_control( $prefix . '_copyright_text', array(
    'type'        => 'text',
    'priority'    => 11,
    'section'     => $prefix . '_copyright_section',
    'label'       => esc_html__( 'Copyright', 'atlast-agency' ),
    'description' => esc_html__( 'Add your copyright text here. You can use this text with the available copyright layouts.', 'atlast-agency' ),
) );