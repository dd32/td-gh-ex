<?php
/**
 * Sanitization: Select
 *
 * @param  string select setting input.
 * @return string        setting input value.
 */
function apex_business_sanitize_select( $input ) {
  $valid = array(
    'inherit'       =>  'Default',
    '100'           =>  'Thin: 100',
    '200'           =>  'Light: 200',
    '300'           =>  'Book: 300',
    '400'           =>  'Normal: 400',
    '500'           =>  'Medium: 500',
    '600'           =>  'Semibold: 600',
    '700'           =>  'Bold: 700',
    '800'           =>  'Extra Bold: 800',
    '900'           =>  'Black: 900',
    'inherit'       =>  'Normal',
    'italic'        =>  'Italic',
    'uppercase'     =>  'Uppercase',
    'lowercase'     =>  'Lowercase',
    'capitalize'    =>  'Capitalize',
    'fade'          =>  'Fade',
    'slide'         =>  'Slide',
    'no-repeat'     =>  'No Repeat',
    'repeat'        =>  'Repeat All',
    'repeat-x'      =>  'Repeat X',
    'repeat-y'      =>  'Repeat Y',
    'cover'         =>  'Cover',
    'contain'       =>  'Contain',
    'auto'          =>  'Auto',
    'scroll'        =>  'Scroll',
    'fixed'         =>  'Fixed',
    'none'          =>  'none',
    'search-icon'   =>  'Search Icon',
    'button'        =>  'Button',
    'list'          =>  'List',
    'masonry'       =>  'Masonry',
    'excerpt'       =>  'Excerpt',
    'content'       =>  'Content',
    'latin'         =>  'latin',
    'latin-ext'     =>  'latin-ext',
    'cyrillic'      =>  'cyrillic',
    'cyrillic-ext'  =>  'cyrillic-ext',
    'greek'         =>  'greek',
    'greek-ext'     =>  'greek-ext',
    'vietnamese'    =>  'vietnamese',
  );

  if ( array_key_exists( $input, $valid ) ) {
    return $input;
  } else {
    return '';
  }
}

/**
 * Sanitization: Alpha color
 *
 * @param  string $color setting input.
 * @return string        setting input value.
 */
function apex_business_sanitize_alpha_color( $color ) {
  if ( '' === $color ) {
    return '';
  }
  if ( false === strpos( $color, 'rgba' ) ) {
    /* Hex sanitize */
    return sanitize_hex_color( $color );
  }
  /* rgba sanitize */
  $color = str_replace( ' ', '', $color );
  sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
  return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
}

/**
 * Validation: image
 * Control: text, WP_Customize_Image_Control
 *
 * @uses  wp_check_filetype()   https://developer.wordpress.org/reference/functions/wp_check_filetype/
 * @uses  in_array()        http://php.net/manual/en/function.in-array.php
 */

function apex_business_validate_image( $input, $default = '' ) {
  // Array of valid image file types
  // The array includes image mime types
  // that are included in wp_get_mime_types()
  $mimes = array(
    'jpg|jpeg|jpe' => 'image/jpeg',
    'gif'          => 'image/gif',
    'png'          => 'image/png',
    'bmp'          => 'image/bmp',
    'tif|tiff'     => 'image/tiff',
    'ico'          => 'image/x-icon'
  );
  // Return an array with file extension
  // and mime_type
  $file = wp_check_filetype( $input, $mimes );
  // If $input has a valid mime_type,
  // return it; otherwise, return
  // the default.
  return ( $file['ext'] ? $input : $default );
}
