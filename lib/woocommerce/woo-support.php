<?php 
/*-----------------------------------------------------------------------------------*/
/* This theme supports WooCommerce */
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ascend_woocommerce_support() {
    add_theme_support( 'woocommerce' );

    if (class_exists('woocommerce')) {
        add_filter( 'woocommerce_enqueue_styles', '__return_false' );

        // Disable WooCommerce Lightbox
        if (get_option( 'woocommerce_enable_lightbox' ) == true ) {
            update_option( 'woocommerce_enable_lightbox', false );
        }

        add_action('kt_afterheader', 'ascend_wc_print_notices');
        function ascend_wc_print_notices() {
            if(!is_shop() and !is_woocommerce() and !is_cart() and !is_checkout() and !is_account_page() ) {
              echo '<div class="container kt-woo-messages-none-woo-pages">';
              echo do_shortcode( '[woocommerce_messages]' );
              echo '</div>';
            }
        }
    }

    add_filter( 'add_to_cart_fragments', 'ascend_get_refreshed_fragments' );
 	function ascend_get_refreshed_fragments($fragments) {
	    // Get mini cart
	    ob_start();

	    woocommerce_mini_cart();

	    $mini_cart = ob_get_clean();

	    // Fragments and mini cart are returned
	    $fragments['li.kt-mini-cart-refreash'] ='<li class="kt-mini-cart-refreash">' . $mini_cart . '</li>';

	    return $fragments;

	}
  	add_filter( 'add_to_cart_fragments', 'ascend_get_refreshed_fragments_number' );
 	function ascend_get_refreshed_fragments_number($fragments) {
	    global $woocommerce;
	    // Get mini cart
	    ob_start();

	    ?><span class="kt-cart-total"><?php echo WC()->cart->get_cart_contents_count(); ?></span> <?php

	    $fragments['span.kt-cart-total'] = ob_get_clean();

	    return $fragments;

 	}

}
add_action( 'after_setup_theme', 'ascend_woocommerce_support' );
