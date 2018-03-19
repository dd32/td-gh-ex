<?php
/**
 * Data sanitization functions
 *
 * @package fmi
 */

function fmi_sanitize_checkbox( $input ){
  if ( $input == 1 || $input == 'true' || $input === true ) {
    return 1;
  } else {
    return 0;
  }
}

function fmi_sanitize_number( $number, $setting ) {
  $number = absint( $number );
  return ( $number ? $number : $setting->default );
}

function fmi_sanitize_blog_pagination( $input ) {
  if ( ! in_array( $input, array( 'pagination', 'navigation' ) ) ) {
    $input = 'pagination';
  }
  return $input;
}

function fmi_sanitize_blog_layout($input) {
  $valid = array(
    'right_sidebar' => 'Right sidebar',
    'left_sidebar' => 'Left sidebar',
    'one_column' => 'One column',
  );
  if (array_key_exists($input, $valid)) {
    return $input;
  } else {
    return 'right_sidebar';
  }
}

function fmi_sanitize_blog_excerpt_type($input) {
  $valid = array(
    'excerpt' => 'Excerpt',
    'more-tag' => 'Read More tag',
  );
  if (array_key_exists($input, $valid)) {
    return $input;
  } else {
    return 'excerpt';
  }
}
