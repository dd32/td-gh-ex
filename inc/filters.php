<?php
/**
 * Filters
 *
 * @package Fmi
 */

if ( ! function_exists( 'vs_strip_shortcode_from_excerpt' ) ) {
  /**
   * Strip shortcodes from excerpt
   *
   * @param string $content Excerpt.
   */
  function vs_strip_shortcode_from_excerpt( $content ) {
    $content = strip_shortcodes( $content );
    return $content;
  }
}
add_filter( 'the_excerpt', 'vs_strip_shortcode_from_excerpt' );

if ( ! function_exists( 'vs_strip_tags_from_excerpt' ) ) {
  /**
   * Strip HTML from excerpt
   *
   * @param string $content Excerpt.
   */
  function vs_strip_tags_from_excerpt( $content ) {
    $content = strip_tags( $content );
    return $content;
  }
}
add_filter( 'the_excerpt', 'vs_strip_tags_from_excerpt' );

if ( ! function_exists( 'vs_excerpt_more' ) ) {
  /**
   * Excerpt Suffix
   *
   * @param string $more suffix for the excerpt.
   */
  function vs_excerpt_more( $more ) {
    return '&hellip;';
  }
}
add_filter( 'excerpt_more', 'vs_excerpt_more' );
