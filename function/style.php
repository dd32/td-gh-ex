<?php
/* 	AssociationX Theme's Sub Style
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
	function associationx_custom_style() { 
	wp_enqueue_style( 'associationx-custom-style', get_template_directory_uri() . '/css/custom-css.css' );

	$custom_css = '';
	
	// *********************************** WooCommerce ***********************************		
	$custom_css .= '#ecom-box-item .woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
	if ( esc_html(associationx_get_option('wooitembtrns', ''))) $custom_css .= 'background-color: transparent !important;';
	if ( esc_html(associationx_get_option('wooitembdr', ''))) $custom_css .= 'border: 1px solid #eeeeee;';
	if ( esc_html(associationx_get_option('wooitembsdw', ''))) $custom_css .= 'box-shadow: 0 0 5px 0 #eeeeee;';
	if ( esc_html(associationx_get_option('wooitemnpspc', ''))) $custom_css .= 'padding: 0;';
	$custom_css .= '}';
	if ( esc_html(associationx_get_option('wooiimgbdr', ''))) $custom_css .= '#ecom-box-item .woocommerce ul.products li.product a img, .woocommerce-page ul.products li.product a img { border: 1px solid #eeeeee; }';		
	// *********************************** Community/BuddyPress ***********************************
			
	//////////////////////	
	wp_add_inline_style( 'associationx-custom-style', $custom_css );
	}
	add_action( 'wp_enqueue_scripts', 'associationx_custom_style' );