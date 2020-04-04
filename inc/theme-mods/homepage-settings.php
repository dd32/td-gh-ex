<?php
/**
 * Homepage Settings
 *
 * @package Fmi
 */

// Add new panel
$wp_customize->add_panel( 'homepage_panel', array(
  'title'              => esc_html__( 'Homepage Settings', 'fmi' ),
  'priority'           => 26,
) );

// Add new section
$wp_customize->add_section( 'slider_section', array(
  'title'                => esc_html__( 'Slider', 'fmi' ),
  'panel'                => 'homepage_panel',
  'priority'             => 10,
) );

// Check to activate slider
$wp_customize->add_setting( 'activate_slider', array(
  'default'              => false,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'activate_slider', array(
  'label'                => esc_html__( 'Check to activate slider', 'fmi' ),
  'section'              => 'slider_section',
  'type'                 => 'checkbox',
) );

// Image Upload #1
$wp_customize->add_setting( 'slider_image1', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image1', array(
  'label'                => esc_html__( 'Image Upload #1', 'fmi' ),
  'description'          => esc_html__( 'Upload slider image', 'fmi' ),
  'section'              => 'slider_section',
) ) );

// Enter title for your slider
$wp_customize->add_setting( 'slider_title1', array(
  'default'              => '',
  'sanitize_callback'    => 'sanitize_text_field',
) );
$wp_customize->add_control( 'slider_title1', array(
  'description'          => esc_html__( 'Enter title for your slider', 'fmi' ),
  'section'              => 'slider_section',
  'type'                 => 'text',
) );

// Enter your slider description
$wp_customize->add_setting( 'slider_text1', array(
  'default'              => '',
  'sanitize_callback'    => 'sanitize_text_field',
) );
$wp_customize->add_control( 'slider_text1', array(
  'description'          => esc_html__( 'Enter your slider description', 'fmi' ),
  'section'              => 'slider_section',
  'type'                 => 'text',
) );

// Enter link to redirect slider when clicked
$wp_customize->add_setting( 'slider_link1', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'slider_link1', array(
  'description'          => esc_html__( 'Enter link to redirect slider when clicked', 'fmi' ),
  'section'              => 'slider_section',
  'type'                 => 'text',
) );

// Image Upload #2
$wp_customize->add_setting( 'slider_image2', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image2', array(
  'label'                => esc_html__( 'Image Upload #2', 'fmi' ),
  'description'          => esc_html__( 'Upload slider image', 'fmi' ),
  'section'              => 'slider_section',
) ) );

// Enter title for your slider
$wp_customize->add_setting( 'slider_title2', array(
  'default'              => '',
  'sanitize_callback'    => 'sanitize_text_field',
) );
$wp_customize->add_control( 'slider_title2', array(
  'description'          => esc_html__( 'Enter title for your slider', 'fmi' ),
  'section'              => 'slider_section',
  'type'                 => 'text',
) );

// Enter your slider description
$wp_customize->add_setting( 'slider_text2', array(
  'default'              => '',
  'sanitize_callback'    => 'sanitize_text_field',
) );
$wp_customize->add_control( 'slider_text2', array(
  'description'          => esc_html__( 'Enter your slider description', 'fmi' ),
  'section'              => 'slider_section',
  'type'                 => 'text',
) );

// Enter link to redirect slider when clicked
$wp_customize->add_setting( 'slider_link2', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'slider_link2', array(
  'description'          => esc_html__( 'Enter link to redirect slider when clicked', 'fmi' ),
  'section'              => 'slider_section',
  'type'                 => 'text',
) );

// Image Upload #3
$wp_customize->add_setting( 'slider_image3', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image3', array(
  'label'                => esc_html__( 'Image Upload #3', 'fmi' ),
  'description'          => esc_html__( 'Upload slider image', 'fmi' ),
  'section'              => 'slider_section',
) ) );

// Enter title for your slider
$wp_customize->add_setting( 'slider_title3', array(
  'default'              => '',
  'sanitize_callback'    => 'sanitize_text_field',
) );
$wp_customize->add_control( 'slider_title3', array(
  'description'          => esc_html__( 'Enter title for your slider', 'fmi' ),
  'section'              => 'slider_section',
  'type'                 => 'text',
) );

// Enter your slider description
$wp_customize->add_setting( 'slider_text3', array(
  'default'              => '',
  'sanitize_callback'    => 'sanitize_text_field',
) );
$wp_customize->add_control( 'slider_text3', array(
  'description'          => esc_html__( 'Enter your slider description', 'fmi' ),
  'section'              => 'slider_section',
  'type'                 => 'text',
) );

// Enter link to redirect slider when clicked
$wp_customize->add_setting( 'slider_link3', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'slider_link3', array(
  'description'          => esc_html__( 'Enter link to redirect slider when clicked', 'fmi' ),
  'section'              => 'slider_section',
  'type'                 => 'text',
) );

// Image Upload #4
$wp_customize->add_setting( 'slider_image4', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image4', array(
  'label'                => esc_html__( 'Image Upload #4', 'fmi' ),
  'description'          => esc_html__( 'Upload slider image', 'fmi' ),
  'section'              => 'slider_section',
) ) );

// Enter title for your slider
$wp_customize->add_setting( 'slider_title4', array(
  'default'              => '',
  'sanitize_callback'    => 'sanitize_text_field',
) );
$wp_customize->add_control( 'slider_title4', array(
  'description'          => esc_html__( 'Enter title for your slider', 'fmi' ),
  'section'              => 'slider_section',
  'type'                 => 'text',
) );

// Enter your slider description
$wp_customize->add_setting( 'slider_text4', array(
  'default'              => '',
  'sanitize_callback'    => 'sanitize_text_field',
) );
$wp_customize->add_control( 'slider_text4', array(
  'description'          => esc_html__( 'Enter your slider description', 'fmi' ),
  'section'              => 'slider_section',
  'type'                 => 'text',
) );

// Enter link to redirect slider when clicked
$wp_customize->add_setting( 'slider_link4', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'slider_link4', array(
  'description'          => esc_html__( 'Enter link to redirect slider when clicked', 'fmi' ),
  'section'              => 'slider_section',
  'type'                 => 'text',
) );

// Add new section
$wp_customize->add_section( 'homepage_section', array(
  'title'                => esc_html__( 'Homepage Layout', 'fmi' ),
  'panel'                => 'homepage_panel',
  'priority'             => 15,
) );

// Sidebar
$wp_customize->add_setting( 'homepage_sidebar', array(
  'default'              => 'right',
  'sanitize_callback'    => 'vs_sanitize_sidebar',
) );
$wp_customize->add_control( 'homepage_sidebar', array(
  'label'                => esc_html__( 'Sidebar', 'fmi' ),
  'section'              => 'homepage_section',
  'type'                 => 'radio',
  'choices'              => array(
    'right'              => esc_html__( 'Right Sidebar', 'fmi' ),
    'left'               => esc_html__( 'Left Sidebar', 'fmi' ),
    'disabled'           => esc_html__( 'No Sidebar', 'fmi' ),
  ),
) );

// Post Summary
$wp_customize->add_setting( 'homepage_summary', array(
  'default'              => 'excerpt',
  'sanitize_callback'    => 'vs_sanitize_summary',
) );
$wp_customize->add_control( 'homepage_summary', array(
  'label'                => esc_html__( 'Post Summary', 'fmi' ),
  'section'              => 'homepage_section',
  'type'                 => 'radio',
  'choices'              => array(
    'excerpt'            => esc_html__( 'Use Excerpts', 'fmi' ),
    'content'            => esc_html__( 'Use Read More Tag', 'fmi' ),
  ),
) );

// Excerpt Length (Number Of Words)
$wp_customize->add_setting( 'homepage_excerpt_length', array(
  'default'              => 50,
  'sanitize_callback'    => 'vs_sanitize_number',
) );
$wp_customize->add_control( new vs_customize_number_control( $wp_customize, 'homepage_excerpt_length', array(
  'label'                => esc_html__( 'Excerpt Length (Number of Words)', 'fmi' ),
  'section'              => 'homepage_section',
) ) );

// Heading
$wp_customize->add_setting( 'homepage_heading_post_meta', array(
  'sanitize_callback'    => 'esc_html',
) );
$wp_customize->add_control( new vs_customize_control_heading( $wp_customize, 'homepage_heading_post_meta', array(
  'label'                => esc_html__( 'Post Meta', 'fmi' ),
  'section'              => 'homepage_section',
) ) );

// Display Author
$wp_customize->add_setting( 'homepage_author', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'homepage_author', array(
  'label'                => esc_html__( 'Display Author', 'fmi' ),
  'section'              => 'homepage_section',
  'type'                 => 'checkbox',
) );

// Display Date
$wp_customize->add_setting( 'homepage_date', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'homepage_date', array(
  'label'                => esc_html__( 'Display Date', 'fmi' ),
  'section'              => 'homepage_section',
  'type'                 => 'checkbox',
) );

// Display Categorys
$wp_customize->add_setting( 'homepage_categorys', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'homepage_categorys', array(
  'label'                => esc_html__( 'Display Categorys', 'fmi' ),
  'section'              => 'homepage_section',
  'type'                 => 'checkbox',
) );

// Display Comments
$wp_customize->add_setting( 'homepage_comments', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'homepage_comments', array(
  'label'                => esc_html__( 'Display Comments', 'fmi' ),
  'section'              => 'homepage_section',
  'type'                 => 'checkbox',
) );

// Display Tags
$wp_customize->add_setting( 'homepage_tags', array(
  'default'              => 1,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'homepage_tags', array(
  'label'                => esc_html__( 'Display Tags', 'fmi' ),
  'section'              => 'homepage_section',
  'type'                 => 'checkbox',
) );

// Display Read More
$wp_customize->add_setting( 'homepage_read_more', array(
  'default'              => 0,
  'sanitize_callback'    => 'vs_sanitize_checkbox',
) );
$wp_customize->add_control( 'homepage_read_more', array(
  'label'                => esc_html__( 'Display Read More', 'fmi' ),
  'section'              => 'homepage_section',
  'type'                 => 'checkbox',
) );

// Static Front Page
$static_front_page = $wp_customize->get_section( 'static_front_page' );
$wp_customize->remove_section( 'static_front_page' );
$wp_customize->add_section( 'static_front_page', array(
  'title'                => esc_html__( 'Static Front Page', 'fmi' ),
  'description'          => $static_front_page->description,
  'panel'                => 'homepage_panel',
  'active_callback'      => $static_front_page->active_callback,
  'priority'             => 25,
) );
