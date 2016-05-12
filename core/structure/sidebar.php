<?php
/**
 * Template functions used for the blog sidebar.
 */
if ( ! function_exists( 'igthemes_get_sidebar' ) ) {
	function igthemes_get_sidebar() {
        //edd
        if (is_edd_activated()) {
            igthemes_edd_sidebar();
        }
        //wc
        elseif (is_woocommerce_activated()) {
            igthemes_woocommerce_sidebar();
        //normal
        } else {
            get_sidebar();
        }    
    }
}