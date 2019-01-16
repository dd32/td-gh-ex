<?php

/**
 * AcmeBlog functions.
 * @package AcmeBlog
 * @since 1.0.0
 */

/**
 * check if WooCommerce activated
 */
function acmeblog_is_woocommerce_active() {
	return class_exists( 'WooCommerce' ) ? true : false;
}
add_action( 'init', 'acmeblog_remove_wc_breadcrumbs' );
function acmeblog_remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
}


/**
 * Woo Commerce Number of row filter Function
 */
if (!function_exists('acmeblog_loop_columns')) {
	function acmeblog_loop_columns() {
		$acmeblog_customizer_all_values = acmeblog_get_theme_options();
		$acmeblog_wc_product_column_number = $acmeblog_customizer_all_values['acmeblog-wc-product-column-number'];
		if ($acmeblog_wc_product_column_number) {
			$column_number = $acmeblog_wc_product_column_number;
		}
		else {
			$column_number = 3;
		}
		return $column_number;
	}
}
add_filter('loop_shop_columns', 'acmeblog_loop_columns');

function acmeblog_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$acmeblog_customizer_all_values = acmeblog_get_theme_options();
	$acmeblog_wc_product_total_number = $acmeblog_customizer_all_values['acmeblog-wc-shop-archive-total-product'];
	if ($acmeblog_wc_product_total_number) {
		$cols = $acmeblog_wc_product_total_number;
	}
	return $cols;
}
add_filter( 'loop_shop_per_page', 'acmeblog_loop_shop_per_page', 20 );