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

// Search Form Placeholder
$wp_customize->add_setting( 'misc_search_placeholder', array(
  'default'              => esc_html__( 'Search ...', 'fmi' ),
  'sanitize_callback'    => 'esc_attr',
) );
$wp_customize->add_control( 'misc_search_placeholder', array(
  'label'                => esc_html__( 'Search Form Placeholder', 'fmi' ),
  'section'              => 'miscellaneous_section',
  'type'                 => 'text',
) );

// "Read More" Button Label
$wp_customize->add_setting( 'misc_label_readmore', array(
  'default'              => esc_html__( 'Read More', 'fmi' ),
  'sanitize_callback'    => 'esc_html',
) );
$wp_customize->add_control( 'misc_label_readmore', array(
  'label'                => esc_html__( '"Read More" Button Label', 'fmi' ),
  'section'              => 'miscellaneous_section',
  'type'                 => 'text',
) );

// Scroll To Top Button
$wp_customize->add_setting( 'misc_scroll_to_top', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'misc_scroll_to_top', array(
  'label'                => esc_html__( 'Scroll To Top Button', 'fmi' ),
  'section'              => 'miscellaneous_section',
  'type'                 => 'checkbox',
) );

// Enable hover effects when you hover on featured images
$wp_customize->add_setting( 'blog_images_hover_effects', array(
  'default'              => 0,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'blog_images_hover_effects', array(
  'label'                => esc_html__( 'Enable hover effects when you hover on featured images', 'fmi' ),
  'section'              => 'miscellaneous_section',
  'type'                 => 'checkbox',
) );

// Load Google AdSense Scripts
$wp_customize->add_setting( 'misc_adsense', array(
  'default'              => 0,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'misc_adsense', array(
  'label'                => esc_html__( 'Load Google AdSense Scripts', 'fmi' ),
  'description'          => esc_html__( 'Enable this if you\'re using Google AdSense.', 'fmi' ),
  'section'              => 'miscellaneous_section',
  'type'                 => 'checkbox',
) );
