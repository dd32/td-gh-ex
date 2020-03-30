<?php
/**
 * Typography
 *
 * @package Fmi
 */

// Add new section
Kirki::add_section( 'typography_section', array(
  'title'        => esc_html__( 'Typography', 'fmi' ),
  'priority'     => 22,
) );

// Base Font
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'typography',
  'settings'   => 'typography_base_font',
  'label'      => esc_html__( 'Base Font', 'fmi' ),
  'description'=> esc_html__( 'Default font: Open Sans.', 'fmi' ),
  'section'    => 'typography_section',
  'default'    => array(
    'font-family'     => 'Open Sans',
    'variant'         => 'regular',
  ),
  'priority'   => 10,
  'output'     => array(
    array(
      'element'       => 'body',
    ),
  ),
) );
