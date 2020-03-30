<?php
/**
 * Homepage Settings
 *
 * @package Fmi
 */

// Add new panel
Kirki::add_panel( 'homepage_panel', array(
  'title'      => esc_html__( 'Homepage Settings', 'fmi' ),
  'priority'   => 26,
) );

// Add new section
Kirki::add_section( 'homepage_section', array(
  'title'        => esc_html__( 'Homepage Layout', 'fmi' ),
  'panel'        => 'homepage_panel',
  'priority'     => 10,
) );

// Sidebar
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'radio',
  'settings'   => 'homepage_sidebar',
  'label'      => esc_html__( 'Sidebar', 'fmi' ),
  'section'    => 'homepage_section',
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
  'settings'   => 'homepage_summary',
  'label'      => esc_html__( 'Post Summary', 'fmi' ),
  'section'    => 'homepage_section',
  'default'    => 'excerpt',
  'priority'   => 10,
  'choices'    => array(
    'excerpt'         => esc_html__( 'Use Excerpts', 'fmi' ),
    'content'         => esc_html__( 'Use Read More Tag', 'fmi' ),
  ),
) );

// Excerpt Length (Number Of Words)
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'number',
  'settings'   => 'homepage_excerpt_length',
  'label'      => esc_html__( 'Excerpt Length (Number Of Words)', 'fmi' ),
  'section'    => 'homepage_section',
  'default'    => 50,
  'priority'   => 10,
  'active_callback'=> array(
    array(
      'setting'           => 'homepage_summary',
      'operator'          => '==',
      'value'             => 'excerpt',
    ),
  ),
) );

/**
 * Removes default WordPress Static Front Page section
 * and re-adds it in our own panel with the same parameters.
 *
 * @param object $wp_customize Instance of the WP_Customize_Manager class.
 */
function vs_reorder_customizer_settings( $wp_customize ) {

  // Get current front page section parameters.
  $static_front_page = $wp_customize->get_section( 'static_front_page' );

  // Remove existing section, so that we can later re-add it to our panel.
  $wp_customize->remove_section( 'static_front_page' );

  // Re-add static front page section with a new name, but same description.
  $wp_customize->add_section( 'static_front_page', array(
    'title'                => esc_html__( 'Static Front Page', 'fmi' ),
    'description'          => $static_front_page->description,
    'panel'                => 'homepage_panel',
    'active_callback'      => $static_front_page->active_callback,
    'priority'             => 25,
  ) );
}
add_action( 'customize_register', 'vs_reorder_customizer_settings' );
