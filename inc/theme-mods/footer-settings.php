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

// Display footer meny
$wp_customize->add_setting( 'footer_menu_display', array(
  'default'              => 0,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'footer_menu_display', array(
  'label'                => esc_html__( 'Display footer menu', 'fmi' ),
  'section'              => 'footer_section',
  'settings'             => 'footer_menu_display',
  'type'                 => 'checkbox',
) );

// Display social links
$wp_customize->add_setting( 'footer_social_display', array(
  'default'              => 0,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'footer_social_display', array(
  'label'                => esc_html__( 'Display social links', 'fmi' ),
  'section'              => 'footer_section',
  'settings'             => 'footer_social_display',
  'type'                 => 'checkbox',
) );
