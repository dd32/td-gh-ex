<?php
/**
 * Data sanitization functions
 *
 * @package Fmi
 */

// URL (esc_url)
function vs_sanitize_url($input) {
  return esc_url_raw($input);
}

// Checkbox
function vs_sanitize_checkbox( $input ){
  if ( $input == 1 || $input == 'true' || $input === true ) {
    return 1;
  } else {
    return 0;
  }
}

// Blog pagination
function vs_sanitize_blog_pagination( $input ) {
  if ( ! in_array( $input, array( 'pagination', 'navigation' ) ) ) {
    $input = 'pagination';
  }
  return $input;
}
