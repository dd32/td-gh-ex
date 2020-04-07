<?php
/**
 * Data sanitization functions
 *
 * @package Fmi
 */

// Sanitize number
function vs_sanitize_number( $input ) {
  if ( is_numeric( $input ) && $input >= 1 ) {
    return intval( $input );
  } else {
    return '';
  }
}

// Sanitize checkbox
function vs_sanitize_checkbox( $input ){
  if ( 1 === (int) $input ) {
    return 1;
  } else {
    return 0;
  }
}

// Sanitize pagination
function vs_sanitize_blog_pagination( $input ) {
  if ( ! in_array( $input, array( 'pagination', 'navigation' ) ) ) {
    $input = 'pagination';
  }
  return $input;
}

// Sanitize sidebar
function vs_sanitize_sidebar( $input ) {
  if ( ! in_array( $input, array( 'right', 'left', 'disabled' ) ) ) {
    $input = 'right';
  }
  return $input;
}

// Sanitize summary
function vs_sanitize_summary( $input ) {
  if ( ! in_array( $input, array( 'excerpt', 'content' ) ) ) {
    $input = 'excerpt';
  }
  return $input;
}
