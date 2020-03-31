<?php
/**
 * Page Settings
 *
 * @package Fmi
 */

// Add new section
$wp_customize->add_section( 'page_section', array(
  'title'                => esc_html__( 'Page Settings', 'fmi' ),
  'priority'             => 29,
) );

// Sidebar
$wp_customize->add_setting( 'page_sidebar', array(
  'default'              => 'right',
  'sanitize_callback'    => 'vs_sanitize_sidebar',
) );
$wp_customize->add_control( 'page_sidebar', array(
  'label'                => esc_html__( 'Sidebar', 'fmi' ),
  'section'              => 'page_section',
  'settings'             => 'page_sidebar',
  'type'                 => 'radio',
  'choices'              => array(
    'right'              => esc_html__( 'Right Sidebar', 'fmi' ),
    'left'               => esc_html__( 'Left Sidebar', 'fmi' ),
    'disabled'           => esc_html__( 'No Sidebar', 'fmi' ),
  ),
) );
