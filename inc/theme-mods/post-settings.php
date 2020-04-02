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
  'type'                 => 'radio',
  'choices'              => array(
    'right'              => esc_html__( 'Right Sidebar', 'fmi' ),
    'left'               => esc_html__( 'Left Sidebar', 'fmi' ),
    'disabled'           => esc_html__( 'No Sidebar', 'fmi' ),
  ),
) );

// Show post navigation (single post page)
$wp_customize->add_setting( 'single_show_post_nav', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'single_show_post_nav', array(
  'label'                => esc_html__( 'Show post navigation (single post page)', 'fmi' ),
  'section'              => 'post_section',
  'type'                 => 'checkbox',
) );

// Show "About the author" block (single post page)
$wp_customize->add_setting( 'single_show_about_author', array(
  'default'              => 0,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'single_show_about_author', array(
  'label'                => esc_html__( 'Show "About the author" block (single post page)', 'fmi' ),
  'section'              => 'post_section',
  'type'                 => 'checkbox',
) );

// Heading
$wp_customize->add_setting( 'post_heading_post_meta', array(
  'sanitize_callback'    => 'esc_html',
) );
$wp_customize->add_control( new vs_customize_control_heading( $wp_customize, 'post_heading_post_meta', array(
  'label'                => esc_html__( 'Post Meta', 'fmi' ),
  'section'              => 'post_section',
) ) );

// Display Author
$wp_customize->add_setting( 'post_author', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'post_author', array(
  'label'                => esc_html__( 'Display Author', 'fmi' ),
  'section'              => 'post_section',
  'type'                 => 'checkbox',
) );

// Display Date
$wp_customize->add_setting( 'post_date', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'post_date', array(
  'label'                => esc_html__( 'Display Date', 'fmi' ),
  'section'              => 'post_section',
  'type'                 => 'checkbox',
) );

// Display Categorys
$wp_customize->add_setting( 'post_categorys', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'post_categorys', array(
  'label'                => esc_html__( 'Display Categorys', 'fmi' ),
  'section'              => 'post_section',
  'type'                 => 'checkbox',
) );

// Display Comments
$wp_customize->add_setting( 'post_comments', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'post_comments', array(
  'label'                => esc_html__( 'Display Comments', 'fmi' ),
  'section'              => 'post_section',
  'type'                 => 'checkbox',
) );

// Display Tags
$wp_customize->add_setting( 'post_tags', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'post_tags', array(
  'label'                => esc_html__( 'Display Tags', 'fmi' ),
  'section'              => 'post_section',
  'type'                 => 'checkbox',
) );
