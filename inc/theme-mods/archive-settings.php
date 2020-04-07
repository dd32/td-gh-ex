<?php
/**
 * Archive Settings
 *
 * @package Fmi
 */

// Add new section
$wp_customize->add_section( 'archive_section', array(
  'title'                => esc_html__( 'Archive Settings', 'fmi' ),
  'priority'             => 27,
) );

// Sidebar
$wp_customize->add_setting( 'archive_sidebar', array(
  'default'              => 'right',
  'sanitize_callback'    => 'vs_sanitize_sidebar',
) );
$wp_customize->add_control( 'archive_sidebar', array(
  'label'                => esc_html__( 'Sidebar', 'fmi' ),
  'section'              => 'archive_section',
  'type'                 => 'radio',
  'choices'              => array(
    'right'              => esc_html__( 'Right Sidebar', 'fmi' ),
    'left'               => esc_html__( 'Left Sidebar', 'fmi' ),
    'disabled'           => esc_html__( 'No Sidebar', 'fmi' ),
  ),
) );

// Display preview images
$wp_customize->add_setting( 'archive_preview_image', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'archive_preview_image', array(
  'label'                => esc_html__( 'Display preview images', 'fmi' ),
  'section'              => 'archive_section',
  'type'                 => 'checkbox',
) );

// Post Summary
$wp_customize->add_setting( 'archive_summary', array(
  'default'              => 'excerpt',
  'sanitize_callback'    => 'vs_sanitize_summary',
) );
$wp_customize->add_control( 'archive_summary', array(
  'label'                => esc_html__( 'Post Summary', 'fmi' ),
  'section'              => 'archive_section',
  'type'                 => 'radio',
  'choices'              => array(
    'excerpt'            => esc_html__( 'Use Excerpts', 'fmi' ),
    'content'            => esc_html__( 'Use Read More Tag', 'fmi' ),
  ),
) );

// Excerpt Length (Number Of Words)
$wp_customize->add_setting( 'archive_excerpt_length', array(
  'default'              => 50,
  'sanitize_callback'    => 'vs_sanitize_number',
) );
$wp_customize->add_control( new vs_customize_number_control( $wp_customize, 'archive_excerpt_length', array(
  'label'                => esc_html__( 'Excerpt Length (Number of Words)', 'fmi' ),
  'section'              => 'archive_section',
) ) );

// Heading
$wp_customize->add_setting( 'archive_heading_post_meta', array(
  'sanitize_callback'    => 'esc_html',
) );
$wp_customize->add_control( new vs_customize_control_heading( $wp_customize, 'archive_heading_post_meta', array(
  'label'                => esc_html__( 'Post Meta', 'fmi' ),
  'section'              => 'archive_section',
) ) );

// Display Author
$wp_customize->add_setting( 'archive_author', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'archive_author', array(
  'label'                => esc_html__( 'Display Author', 'fmi' ),
  'section'              => 'archive_section',
  'type'                 => 'checkbox',
) );

// Display Date
$wp_customize->add_setting( 'archive_date', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'archive_date', array(
  'label'                => esc_html__( 'Display Date', 'fmi' ),
  'section'              => 'archive_section',
  'type'                 => 'checkbox',
) );

// Display Categorys
$wp_customize->add_setting( 'archive_categorys', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'archive_categorys', array(
  'label'                => esc_html__( 'Display Categorys', 'fmi' ),
  'section'              => 'archive_section',
  'type'                 => 'checkbox',
) );

// Display Comments
$wp_customize->add_setting( 'archive_comments', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'archive_comments', array(
  'label'                => esc_html__( 'Display Comments', 'fmi' ),
  'section'              => 'archive_section',
  'type'                 => 'checkbox',
) );

// Display Tags
$wp_customize->add_setting( 'archive_tags', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'archive_tags', array(
  'label'                => esc_html__( 'Display Tags', 'fmi' ),
  'section'              => 'archive_section',
  'type'                 => 'checkbox',
) );

// Display Read More
$wp_customize->add_setting( 'archive_read_more', array(
  'default'              => 0,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'archive_read_more', array(
  'label'                => esc_html__( 'Display Read More', 'fmi' ),
  'section'              => 'archive_section',
  'type'                 => 'checkbox',
) );
