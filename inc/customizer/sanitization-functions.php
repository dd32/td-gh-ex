<?php
/**
 * Sanitization Functions
 *
 * @package agency-x
 * 
 */

    
function agency_x_sanitize_category( $input ){
  $output = intval( $input );
  return $output;

}

function agency_x_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

//checkbox sanitization function
function agency_x_sanitize_checkbox( $input ){       
    //returns true if checkbox is checked
    return ( ( isset( $input ) && true == $input ) ? true : false );
}

//file input sanitization function
function agency_x_sanitize_file( $file, $setting ) {
 
    //allowed file types
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png'
    );
     
    //check file type from file name
    $file_ext = wp_check_filetype( $file, $mimes );
     
    //if file has a valid mime type return it, otherwise return default
    return ( $file_ext['ext'] ? $file : $setting->default );
}