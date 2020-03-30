<?php
/**
 * Page Settings
 *
 * @package Fmi
 */

// Add new section
Kirki::add_section( 'page_section', array(
  'title'      => esc_html__( 'Page Settings', 'fmi' ),
  'priority'   => 29,
) );

// Sidebar
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'radio',
  'settings'   => 'page_sidebar',
  'label'      => esc_html__( 'Sidebar', 'fmi' ),
  'section'    => 'page_section',
  'default'    => 'right',
  'priority'   => 10,
  'choices'    => array(
    'right'    => esc_attr__( 'Right Sidebar', 'fmi' ),
    'left'     => esc_attr__( 'Left Sidebar', 'fmi' ),
    'disabled' => esc_attr__( 'No Sidebar', 'fmi' ),
  ),
) );
