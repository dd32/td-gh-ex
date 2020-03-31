<?php
/**
 * Miscellaneous
 *
 * @package Fmi
 */

// Add new section
$wp_customize->add_section( 'miscellaneous_section', array(
  'title'                => esc_html__( 'Miscellaneous', 'fmi' ),
  'priority'             => 30,
) );

// Scroll To Top Button
$wp_customize->add_setting( 'misc_scroll_to_top', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'misc_scroll_to_top', array(
  'label'                => esc_html__('Scroll To Top Button', 'fmi' ),
  'section'              => 'miscellaneous_section',
  'settings'             => 'misc_scroll_to_top',
  'type'                 => 'checkbox',
) );
