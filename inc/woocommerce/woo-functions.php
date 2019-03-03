<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Arrival
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function arrival_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'arrival_woocommerce_setup' );

/**
* Remove default woocommerce hooks
*/
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);




/**
* Disable woocommerce shop page title
*/
add_filter('woocommerce_show_page_title','__return_false');


add_action('woocommerce_before_shop_loop','arrival_woo_shop_header_wrapp_start',9);
if( ! function_exists('arrival_woo_shop_header_wrapp_start')):
	function arrival_woo_shop_header_wrapp_start(){ ?>
		<div class="arrival-shop-header-wrapp clearfix">
<?php 
	}
endif;


add_action('woocommerce_before_shop_loop','arrival_woo_shop_header_wrapp_end',31);
if( ! function_exists('arrival_woo_shop_header_wrapp_end')):
	function arrival_woo_shop_header_wrapp_end(){ ?>
	</div>
<?php 
	}
endif;