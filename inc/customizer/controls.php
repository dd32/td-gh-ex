<?php 

/**
 * Customizer settings
 *
 * @package auckland
 */

if ( ! function_exists( 'auckland_theme_customizer' ) ) :
  function auckland_theme_customizer( $wp_customize ) {

    
    /* color scheme option */
    $wp_customize->add_setting( 'auckland_color_settings', array (
      'default' => '#2694d9',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'auckland_color_settings', array(
      'label'    => __( 'Primary Color Scheme', 'auckland' ),
      'section'  => 'colors',
      'settings' => 'auckland_color_settings',
    ) ) );
  
  }
endif;
add_action('customize_register', 'auckland_theme_customizer');


/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'auckland_sanitize_checkbox' ) ) :
  function auckland_sanitize_checkbox( $input ) {
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
if ( ! function_exists( 'auckland_sanitize_field_html' ) ) :
  function auckland_sanitize_field_html( $str ) {
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