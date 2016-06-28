<?php


/**
 * Sanitize Custom CSS
 */
function bellini_sanitize_custom_css( $input ) {
	if ( $input != '' ) {

        $input = str_replace( '<=', '&lt;=', $input );
        $input = wp_kses_split( $input, array(), array() );
        $input = str_replace( '&gt;', '>', $input );
        $input = strip_tags( $input );

        return $input;
 	}else {
    	return '';
    }
}


if ( ! function_exists( 'sanitize_hex_color' ) ) {
	function sanitize_hex_color( $color ) {
		if ( '' === $color ) {
			return '';
        }
		// 3 or 6 hex digits, or the empty string.
		if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
			return $color;
        }
		return null;
	}
}

if ( ! function_exists( 'bellini_sanitize_input' ) ) {
    function bellini_sanitize_input($input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }
}

/**
 * Customizer Active Callback
 */

 function is_plugin_active_woocommerce(){
     // Check for the WooCommerce class
     if( !class_exists( 'woocommerce' ) ){
         return false;
     } else {
         return true;
     }
 }


 function is_active_slider_type_bellini_hero(){
     // Check for the slider plugin class
     if( absint(get_option('bellini_front_slider_type', 1)) == 1 ){
         return true;
     } else {
         return false;
     }
 }

 function is_active_slider_type_third_party(){
     // Check for the slider plugin class
     if( absint(get_option('bellini_front_slider_type', 1)) == 2 ){
         return true;
     } else {
         return false;
     }
 }