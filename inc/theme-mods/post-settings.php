<?php
/**
 * Post Settings
 *
 * @package Fmi
 */

// Add new section
Kirki::add_section( 'post_section', array(
  'title'      => esc_html__( 'Post Settings', 'fmi' ),
  'priority'   => 28,
) );

// Sidebar
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'radio',
  'settings'   => 'post_sidebar',
  'label'      => esc_html__( 'Sidebar', 'fmi' ),
  'section'    => 'post_section',
  'default'    => 'right',
  'priority'   => 10,
  'choices'    => array(
    'right'    => esc_attr__( 'Right Sidebar', 'fmi' ),
    'left'     => esc_attr__( 'Left Sidebar', 'fmi' ),
    'disabled' => esc_attr__( 'No Sidebar', 'fmi' ),
  ),
) );
