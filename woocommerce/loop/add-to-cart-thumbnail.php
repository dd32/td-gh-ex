<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     5.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( preg_match("/product_type_variable/i", $args['class']) ) {
	
	$icon = '<i class="fa fa-plus-square" aria-hidden="true"></i>';
	
}elseif ( preg_match("/product_type_external/i", $args['class']) ) {
	
	$icon = '<i class="fa fa-external-link" aria-hidden="true"></i>';
	
}elseif ( preg_match("/product_type_grouped/i", $args['class']) ) {
	
	$icon = '<i class="fa fa-external-link" aria-hidden="true"></i>';
	
}else{
	
	$icon = '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
	
}



echo apply_filters( 'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf( '<span data-toggle="tooltip" title="%s"><a href="%s" data-quantity="%s" class="%s" %s>%s</a></span>',
		esc_html( $product->add_to_cart_text() ),
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : '' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		$icon
	),
$product, $args );
