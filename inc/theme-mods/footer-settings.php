<?php
/**
 * Footer Settings
 *
 * @package Fmi
 */

// Add new section
$wp_customize->add_section( 'footer_section', array(
  'title'                => esc_html__( 'Footer Settings', 'fmi' ),
  'priority'             => 25,
) );

// Display Footer Text
$wp_customize->add_setting( 'footer_text_display', array(
  'default'              => 0,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'footer_text_display', array(
  'label'                => esc_html__( 'Display Footer Text', 'fmi' ),
  'section'              => 'footer_section',
  'type'                 => 'checkbox',
) );

// Footer Text
$wp_customize->add_setting( 'footer_text', array(
  'default'              => '',
  'sanitize_callback'    => 'wp_kses_post',
) );
$wp_customize->add_control( 'footer_text', array(
  'label'                => esc_attr__( 'Footer Text', 'fmi' ),
  'section'              => 'footer_section',
  'type'                 => 'textarea',
) );

// Display Footer Menu
$wp_customize->add_setting( 'footer_menu_display', array(
  'default'              => 0,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'footer_menu_display', array(
  'label'                => esc_html__( 'Display Footer Menu', 'fmi' ),
  'section'              => 'footer_section',
  'type'                 => 'checkbox',
) );

// Display Social Links
$wp_customize->add_setting( 'footer_social_display', array(
  'default'              => 0,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'footer_social_display', array(
  'label'                => esc_html__( 'Display Social Links', 'fmi' ),
  'section'              => 'footer_section',
  'type'                 => 'checkbox',
) );
