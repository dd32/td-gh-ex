<?php
/**
 * Miscellaneous
 *
 * @package Fmi
 */

// Add new section
Kirki::add_section( 'miscellaneous_section', array(
  'title'        => esc_html__( 'Miscellaneous', 'fmi' ),
  'priority'     => 30,
) );

// Scroll To Top Button
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'checkbox',
  'settings'   => 'misc_scroll_to_top',
  'label'      => esc_html__( 'Scroll To Top Button', 'fmi' ),
  'section'    => 'miscellaneous_section',
  'default'    => true,
  'priority'   => 10,
) );
