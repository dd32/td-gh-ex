<?php
/**
 * Archive Settings
 *
 * @package Fmi
 */

// Add new section
$wp_customize->add_section( 'archive_section', array(
  'title'                => esc_html__( 'Archive Settings', 'fmi' ),
  'priority'             => 27,
) );

// Sidebar
$wp_customize->add_setting( 'archive_sidebar', array(
  'default'              => 'right',
  'sanitize_callback'    => 'vs_sanitize_sidebar',
) );
$wp_customize->add_control( 'archive_sidebar', array(
  'label'                => esc_html__( 'Sidebar', 'fmi' ),
  'section'              => 'archive_section',
  'settings'             => 'archive_sidebar',
  'type'                 => 'radio',
  'choices'              => array(
    'right'              => esc_html__( 'Right Sidebar', 'fmi' ),
    'left'               => esc_html__( 'Left Sidebar', 'fmi' ),
    'disabled'           => esc_html__( 'No Sidebar', 'fmi' ),
  ),
) );

// Post Summary
$wp_customize->add_setting( 'archive_summary', array(
  'default'              => 'excerpt',
  'sanitize_callback'    => 'vs_sanitize_summary',
) );
$wp_customize->add_control( 'archive_summary', array(
  'label'                => esc_html__( 'Post Summary', 'fmi' ),
  'section'              => 'archive_section',
  'settings'             => 'archive_summary',
  'type'                 => 'radio',
  'choices'              => array(
    'excerpt'            => esc_html__( 'Use Excerpts', 'fmi' ),
    'content'            => esc_html__( 'Use Read More Tag', 'fmi' ),
  ),
) );

// Excerpt Length (Number Of Words)
$wp_customize->add_setting( 'archive_excerpt_length', array(
  'default'              => 50,
  'sanitize_callback'    => 'vs_sanitize_number',
) );
$wp_customize->add_control( new vs_customize_number_control( $wp_customize, 'archive_excerpt_length', array(
  'label'                => esc_html__( 'Excerpt Length (Number of Words)', 'fmi' ),
  'section'              => 'archive_section',
  'settings'             => 'archive_excerpt_length',
) ) );
