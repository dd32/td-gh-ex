<?php

/**
 * Add Customizer Options
 */

/**
 * Check for WP_Customizer_Control existence before adding custom control because WP_Customize_Control
 * is loaded on customizer page only
 *
 * @see _wp_customize_include()
 */

define( 'APEX_BUSINESS_PRIMARY_COLOR', '#13aff0' );
define( 'APEX_BUSINESS_TEXT_COLOR', '#2b3948' );
define( 'APEX_BUSINESS_WHITE_COLOR', '#fff' );
define( 'APEX_BUSINESS_DEEP_COLOR', '#2b3948' );
define( 'APEX_BUSINESS_OPACITY_BG_COLOR', 'rgba( 0, 0, 0, 0.6 )' );

define( 'APEX_BUSINESS_DEFAULT1_COLOR', 'rgb(150, 50, 220)' );
define( 'APEX_BUSINESS_DEFAULT2_COLOR', 'rgba(50,50,50,0.8)' );
define( 'APEX_BUSINESS_DEFAULT3_COLOR', 'rgba( 255, 255, 255, 0.2 )' );
define( 'APEX_BUSINESS_DEFAULT4_COLOR', '#00CC99' );



if ( class_exists( 'WP_Customize_Control' ) ) {
  get_template_part( '/inc/customizer/customizer-toggle/class-customizer-toggle' );
}

function apex_business_load_customize_classes( $wp_customize ) {
    get_template_part( '/inc/customizer/customizer-font-selector/functions' );
    get_template_part( '/inc/customizer/customizer-alpha-color-picker/class-customizer-alpha-color-control' );
    get_template_part( '/inc/customizer/customizer-radio-image/class/class-customize-control-radio-image' );
    get_template_part( '/inc/customizer/customizer-range-control/class/class-customizer-range-value-control' );
    get_template_part( '/inc/customizer/customizer-sections-order/class/customizer-sections-order' );
    get_template_part( '/inc/customizer/customizer-select-multiple/class/class-customizer-select-multiple' );
    get_template_part( '/inc/customizer/customizer-tabs/class/class-customizer-tabs-control' );
    get_template_part( '/inc/customizer/customizer-icon-picker/icon-picker-control' );
    get_template_part( '/inc/customizer/customizer-page-editor/customizer-page-editor' );

    $wp_customize->register_control_type( 'Apex_Business_Customizer_Select_Multiple' );
    $wp_customize->register_control_type( 'Apex_Business_Customizer_Range_Value_Control' );
}
add_action( 'customize_register', 'apex_business_load_customize_classes', 0 );

function apex_business_customizer_live_previw() {
  wp_enqueue_script( 'apex-business-customize-preview', get_template_directory_uri() . '/inc/customizer/js/theme-customizer.js', array( 'jquery','customize-preview' ), '1.0.0' , true );
  wp_enqueue_script( 'apex-business-typography-customize-preview', get_template_directory_uri() . '/inc/customizer/js/typography-theme-customizer.js', array( 'jquery','customize-preview' ), '1.0.0' , true );
}
add_action('customize_preview_init','apex_business_customizer_live_previw');

/*******************************************************************************
 * Register Panels
 ******************************************************************************/
function apex_business_register_panels_setup( $wp_customize ) {
  $wp_customize->add_panel( 'apex_business_general_panel', array(
    'title' => __( 'General Settings', 'apex-business' ),
    'priority' => 10,
  ) );
}

add_action( 'customize_register', 'apex_business_register_panels_setup');

function apex_business_register_header_navigation_panels_setup( $wp_customize ) {
  $wp_customize->add_panel( 'apex_business_header_panel', array(
    'title' => __( 'Header', 'apex-business' ),
    'priority' => 10,
  ) );
}

add_action( 'customize_register', 'apex_business_register_header_navigation_panels_setup');

function apex_business_register_footer_panels_setup( $wp_customize ) {
  $wp_customize->add_panel( 'apex_business_footer_panel', array(
    'title' => __( 'Footer & Bottom Bar', 'apex-business' ),
    'priority' => 10,
  ) );
}

add_action( 'customize_register', 'apex_business_register_footer_panels_setup');

function apex_business_register_blog_panels_setup( $wp_customize ) {
  $wp_customize->add_panel( 'apex_business_blog_panel', array(
    'title' => __( 'Blog', 'apex-business' ),
    'priority' => 10,
  ) );
}

add_action( 'customize_register', 'apex_business_register_blog_panels_setup');

/*******************************************************************************
 * Accent Color
 ******************************************************************************/

function apex_business_accent_color_setup( $wp_customize ) {

  /******************************** Primary Color *****************************/
    $wp_customize->add_setting( 'apex_business_primary_color_setting', array(
      'default'   => '#145c99',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'apex_business_primary_color_control', array(
      'section'  => 'colors',
      'label'    => esc_html__( 'Primary Color', 'apex-business' ),
      'settings' =>  'apex_business_primary_color_setting',
    ) ) );

    /******************************** Secondary Color *****************************/
    $wp_customize->add_setting( 'apex_business_secondary_color_setting', array(
      'default'   => '#f6f163',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'apex_business_secondary_color_control', array(
      'section'  => 'colors',
      'label'    => esc_html__( 'Secondary Color', 'apex-business' ),
      'settings' =>  'apex_business_secondary_color_setting',
    ) ) );

  /******************************** Site Description Switch *****************************/
  $wp_customize->add_setting( 'apex_business_site_description_switch_setting', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'absint',
    'default'           => false
  ) );

  $wp_customize->add_control( new Apex_Business_Customizer_Toggle_Control( $wp_customize, 'apex_business_site_description_switch_control', array(
    'label'       => __( 'Enable Site Desctiption?', 'apex-business' ),
    'section'     => 'title_tagline',
    'settings'    => 'apex_business_site_description_switch_setting',
    'type'        => 'ios',
  ) ) );
}

add_action( 'customize_register', 'apex_business_accent_color_setup');

get_template_part( 'inc/customizer/sections/topbar-settings' );
get_template_part( 'inc/customizer/sections/layout-settings' );
get_template_part( 'inc/customizer/sections/typography-settings' );
get_template_part( 'inc/customizer/sections/header-navigation-settings' );
get_template_part( 'inc/customizer/sections/button-settings' );
get_template_part( 'inc/customizer/sections/sidebar-settings' );
get_template_part( 'inc/customizer/sections/footer-settings' );
get_template_part( 'inc/customizer/sections/banner-settings' );
get_template_part( 'inc/customizer/sections/blog-settings' );

get_template_part( 'inc/customizer/active-callbacks' );

get_template_part( 'inc/customizer/sanitization-callbacks' );


