<?php
/**
 * Template Functions
 *
 * @package Fmi
 */

if ( ! function_exists( 'vs_get_theme_data' ) ) {
  /**
   * Get data about the theme.
   *
   * @param mixed $name The name of param.
   */
  function vs_get_theme_data( $name ) {
    $theme = wp_get_theme( get_template() );

    return $theme->get( $name );
  }
}

if ( ! function_exists( 'vs_site_info_center' ) ) {
  /**
   * Centers the text
   */
  function vs_site_info_center() {
    $footer_menu_display = get_theme_mod( 'footer_menu_display', 0 );
    $footer_social_display = get_theme_mod( 'footer_social_display', 0 );
    if ( 0 === $footer_menu_display && 0 === $footer_social_display ) {
      return 'site-info-center';
    }
  }
}
