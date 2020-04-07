<?php
/**
 * Design
 *
 * @package Fmi
 */

// Add new section
$wp_customize->add_section( 'design_section', array(
  'title'                => esc_html__( 'Design', 'fmi' ),
  'priority'             => 21,
) );

// Primary color
$wp_customize->add_setting( 'design_primary_color', array(
  'default'              => '#23b2dd',
  'sanitize_callback'    => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'design_primary_color', array(
  'label'                => esc_html__( 'Primary Color', 'fmi' ),
  'section'              => 'design_section',
) ) );

// Background color
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
  'label'                => esc_html__( 'Background Color', 'fmi' ),
  'section'              => 'design_section',
) ) );
