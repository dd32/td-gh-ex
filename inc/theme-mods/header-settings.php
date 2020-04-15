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

// Hide Header Title Text
$wp_customize->add_setting( 'header_title', array(
  'default'              => 0,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'header_title', array(
  'label'                => esc_html__( 'Hide Header Title Text', 'fmi' ),
  'section'              => 'header_section',
  'type'                 => 'checkbox',
) );

// Hide Header Search
$wp_customize->add_setting( 'header_search', array(
  'default'              => 0,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'header_search', array(
  'label'                => esc_html__( 'Hide Header Search', 'fmi' ),
  'section'              => 'header_section',
  'type'                 => 'checkbox',
) );
