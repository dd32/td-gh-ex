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
  'type'                 => 'radio',
  'choices'              => array(
    'right'              => esc_html__( 'Right Sidebar', 'fmi' ),
    'left'               => esc_html__( 'Left Sidebar', 'fmi' ),
    'disabled'           => esc_html__( 'No Sidebar', 'fmi' ),
  ),
) );

// Heading
$wp_customize->add_setting( 'page_heading_post_meta', array(
  'sanitize_callback'    => 'esc_html',
) );
$wp_customize->add_control( new vs_customize_control_heading( $wp_customize, 'page_heading_post_meta', array(
  'label'                => esc_html__( 'Page Meta', 'fmi' ),
  'section'              => 'page_section',
) ) );

// Display Comments
$wp_customize->add_setting( 'page_comments', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'page_comments', array(
  'label'                => esc_html__( 'Display Comments', 'fmi' ),
  'section'              => 'page_section',
  'type'                 => 'checkbox',
) );
