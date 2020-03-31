<?php
/**
 * Post Settings
 *
 * @package Fmi
 */

// Add new section
$wp_customize->add_section( 'post_section', array(
  'title'                => esc_html__( 'Post Settings', 'fmi' ),
  'priority'             => 28,
) );

// Sidebar
$wp_customize->add_setting( 'post_sidebar', array(
  'default'              => 'right',
  'sanitize_callback'    => 'vs_sanitize_sidebar',
) );
$wp_customize->add_control( 'post_sidebar', array(
  'label'                => esc_html__( 'Sidebar', 'fmi' ),
  'section'              => 'post_section',
  'settings'             => 'post_sidebar',
  'type'                 => 'radio',
  'choices'              => array(
    'right'              => esc_html__( 'Right Sidebar', 'fmi' ),
    'left'               => esc_html__( 'Left Sidebar', 'fmi' ),
    'disabled'           => esc_html__( 'No Sidebar', 'fmi' ),
  ),
) );

$wp_customize->add_setting(
  'single_show_post_nav',
  array(
    'default' => 1,
    'sanitize_callback' => 'vs_sanitize_checkbox',
  )
);
$wp_customize->add_control(
  'single_show_post_nav',
  array(
    'type' => 'checkbox',
    'label' => esc_html__('Show post navigation (single post page)', 'fmi'),
    'section' => 'post_section',
  )
);
$wp_customize->add_setting(
  'single_show_about_author',
  array(
    'default' => 0,
    'sanitize_callback' => 'vs_sanitize_checkbox',
  )
);
$wp_customize->add_control(
  'single_show_about_author',
  array(
    'type' => 'checkbox',
    'label' => esc_html__('Show "About the author" block (single post page)', 'fmi'),
    'section' => 'post_section',
  )
);
  