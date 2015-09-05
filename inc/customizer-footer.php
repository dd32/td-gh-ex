<?php
/**
 * Customizer footer settings
 */

if ( ! function_exists( 'araiz_customize_register_footer' ) ) :
/**
 * Register footer settings.
 */
function araiz_customize_register_footer( $wp_customize ) {
  // Section
  $wp_customize->add_section(
    'araiz_footer_info',
    array(
      'title'       => __( 'Footer Info', 'araiz' ),
      'description' => __( 'Change the footer info (copyright text).', 'araiz' ),
      // 'panel' => ''
    )
  );

  // Custom settings and controls
  $wp_customize->add_setting(
    'araiz_site_footer_info',
    array(
      'default'           => sprintf( __( 'Designed by %s %s %s', 'araiz' ), date('Y'), '<a href="http://lodse.com">', 'Lodse' ),
      'sanitize_callback' => 'araiz_sanitize_text',
    )
  );
  $wp_customize->add_control(
    'araiz_site_footer_info',
    array(
      'label'       => __( 'Site Footer Info.', 'araiz' ),
      'description' => __( 'Usually the copyirght text.', 'araiz' ),
      'section'     => 'araiz_footer_info',
      'type'        => 'textarea',
    )
  );
}
endif;
add_action( 'customize_register', 'araiz_customize_register_footer' );



if ( ! function_exists( 'araiz_footer_info_content_setting' ) ) :
/**
 * Prints footer info set by user.
 *
 * @since 1.0.0
 */
function araiz_footer_info_content_setting( $footer_info ) {
  $footer_info = get_theme_mod( 'araiz_site_footer_info', sprintf( __( 'Designed by %s %s %s', 'araiz' ), date('Y'), '<a href="http://lodse.com">', 'Lodse' ) );

  return $footer_info;
}
add_filter( 'araiz_footer_info_content', 'araiz_footer_info_content_setting');
endif;