<?php
/**
 * Archive Settings
 *
 * @package Fmi
 */

// Add new section
Kirki::add_section( 'archive_section', array(
  'title'      => esc_html__( 'Archive Settings', 'fmi' ),
  'priority'   => 27,
) );

// Sidebar
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'radio',
  'settings'   => 'archive_sidebar',
  'label'      => esc_html__( 'Sidebar', 'fmi' ),
  'section'    => 'archive_section',
  'default'    => 'right',
  'priority'   => 10,
  'choices'    => array(
    'right'    => esc_attr__( 'Right Sidebar', 'fmi' ),
    'left'     => esc_attr__( 'Left Sidebar', 'fmi' ),
    'disabled' => esc_attr__( 'No Sidebar', 'fmi' ),
  ),
) );

// Post Summary
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'radio',
  'settings'   => 'archive_summary',
  'label'      => esc_html__( 'Post Summary', 'fmi' ),
  'section'    => 'archive_section',
  'default'    => 'excerpt',
  'priority'   => 10,
  'choices'    => array(
    'excerpt'  => esc_html__( 'Use Excerpts', 'fmi' ),
    'content'  => esc_html__( 'Use Read More Tag', 'fmi' ),
  ),
) );

// Excerpt Length (Number Of Words)
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'number',
  'settings'   => 'archive_excerpt_length',
  'label'      => esc_html__( 'Excerpt Length (Number Of Words)', 'fmi' ),
  'section'    => 'archive_section',
  'default'    => 50,
  'priority'   => 10,
  'active_callback'=> array(
    array(
      'setting'=> 'archive_summary',
      'operator'=> '==',
      'value'  => 'excerpt',
    ),
  ),
) );
