<?php
/**
 * Semper Fi Lite: Customizer-Options
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 63
 */

// Just the default array to get the ball rolling
$semper_fi_lite_customizer_customizer_options_array = array();

// All Customizer Options Hook into this Filter so that they can be added into the theme
if( has_filter('semper_fi_lite_add_to_customizer_options_array') ) {

    $semper_fi_lite_customizer_customizer_options_array = apply_filters( 'semper_fi_lite_add_to_customizer_options_array' , $semper_fi_lite_customizer_customizer_options_array );
    
}
