<?php
/**
 * Header Settings
 *
 * @package Fmi
 */

// Add new section
$wp_customize->add_section( 'header_section', array(
  'title'                => esc_html__( 'Header Settings', 'fmi' ),
  'priority'             => 24,
) );

$wp_customize->add_setting(
  'header_title',
  array(
    'default' => false,
    'sanitize_callback' => 'vs_sanitize_checkbox',
  )
);
$wp_customize->add_control(
  'header_title',
  array(
    'label' => esc_html__('Hide Header Title Text', 'fmi'),
    'section' => 'header_section',
    'settings' => 'header_title',
    'type' => 'checkbox',
  )
);
$wp_customize->add_setting(
  'header_search',
  array(
    'default' => false,
    'sanitize_callback' => 'vs_sanitize_checkbox',
  )
);
$wp_customize->add_control(
  'header_search',
  array(
    'label' => esc_html__('Hide Header Search', 'fmi'),
    'section' => 'header_section',
    'settings' => 'header_search',
    'type' => 'checkbox',
  )
);
