<?php 

/**
 * Customizer settings
 *
 * @package affidavit
 */

if ( ! function_exists( 'affidavit_theme_customizer' ) ) :
  function affidavit_theme_customizer( $wp_customize ) {

    /* Homepage Sections */
    $wp_customize->add_section( 'affidavit_homepage' , array(
      'title'       => __( 'Homepage Sections', 'affidavit' ),
      'priority'    => 30,
      'description' => __( 'Select a page to be assigned for each section', 'affidavit' ),
    ) );

    $wp_customize->add_setting( 'affidavit_section_1', array (
      'sanitize_callback' => 'affidavit_sanitize_field_html',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'affidavit_section_1', array(
      'label'    => __( 'Insert Meta Slider Shortcode', 'affidavit' ),
      'section'  => 'affidavit_homepage',
      'settings' => 'affidavit_section_1',
    ) ) );

    $wp_customize->add_setting( 'affidavit_section_2', array (
      'sanitize_callback' => 'affidavit_sanitize_dropdown_pages',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'affidavit_section_2', array(
      'label'    => __( 'Section 1', 'affidavit' ),
      'section'  => 'affidavit_homepage',
      'settings' => 'affidavit_section_2',
      'type'     => 'dropdown-pages'
    ) ) );

    $wp_customize->add_setting( 'affidavit_section_3', array (
      'sanitize_callback' => 'affidavit_sanitize_dropdown_pages',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'affidavit_section_3', array(
      'label'    => __( 'Section 2', 'affidavit' ),
      'section'  => 'affidavit_homepage',
      'settings' => 'affidavit_section_3',
      'type'     => 'dropdown-pages'
    ) ) );

    $wp_customize->add_setting( 'affidavit_section_4', array (
      'sanitize_callback' => 'affidavit_sanitize_dropdown_pages',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'affidavit_section_4', array(
      'label'    => __( 'Half Section 3', 'affidavit' ),
      'section'  => 'affidavit_homepage',
      'settings' => 'affidavit_section_4',
      'type'     => 'dropdown-pages'
    ) ) );

    $wp_customize->add_setting( 'affidavit_section_5', array (
      'sanitize_callback' => 'affidavit_sanitize_dropdown_pages',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'affidavit_section_5', array(
      'label'    => __( 'Half Section 4', 'affidavit' ),
      'section'  => 'affidavit_homepage',
      'settings' => 'affidavit_section_5',
      'type'     => 'dropdown-pages'
    ) ) );

    $wp_customize->add_setting( 'affidavit_section_6', array (
      'sanitize_callback' => 'affidavit_sanitize_dropdown_pages',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'affidavit_section_6', array(
      'label'    => __( 'Section 5', 'affidavit' ),
      'section'  => 'affidavit_homepage',
      'settings' => 'affidavit_section_6',
      'type'     => 'dropdown-pages'
    ) ) );
    
    $wp_customize->add_setting( 'affidavit_section_7', array (
      'sanitize_callback' => 'affidavit_sanitize_dropdown_pages',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'affidavit_section_7', array(
      'label'    => __( 'Section 7', 'affidavit' ),
      'section'  => 'affidavit_homepage',
      'settings' => 'affidavit_section_7',
      'type'     => 'dropdown-pages'
    ) ) );
    

    /* color scheme option */
    $wp_customize->add_setting( 'affidavit_color_settings', array (
      'default' => '#55396e',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'affidavit_color_settings', array(
      'label'    => __( 'Color Scheme 1', 'affidavit' ),
      'section'  => 'colors',
      'settings' => 'affidavit_color_settings',
    ) ) );

    $wp_customize->add_setting( 'affidavit_color_settings_2', array (
      'default' => '#ff8500',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'affidavit_color_settings_2', array(
      'label'    => __( 'Color Scheme 2', 'affidavit' ),
      'section'  => 'colors',
      'settings' => 'affidavit_color_settings_2',
    ) ) );
  
  }
endif;
add_action('customize_register', 'affidavit_theme_customizer');


/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'affidavit_sanitize_checkbox' ) ) :
  function affidavit_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
      return 1;
    } else {
      return '';
    }
  }
endif;

/**
 * Sanitize text field html
 */
if ( ! function_exists( 'affidavit_sanitize_field_html' ) ) :
  function affidavit_sanitize_field_html( $str ) {
    $allowed_html = array(
    'a' => array(
    'href' => array(),
    ),
    'br' => array(),
    'span' => array(),
    );
    $str = wp_kses( $str, $allowed_html );
    return $str;
  }
endif;

if ( ! function_exists( 'affidavit_sanitize_dropdown_pages' ) ) :
  function affidavit_sanitize_dropdown_pages( $page_id, $setting ) {
    // Ensure $input is an absolute integer.
    $page_id = absint( $page_id );

    // If $page_id is an ID of a published page, return it; otherwise, return the default.
    return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
  }
endif;