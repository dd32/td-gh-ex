<?php
/**
 * Loop Rating
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $ascend;

if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
	return;

	if (!isset($ascend['shop_rating']) ||  $ascend['shop_rating'] != '0') { 
		if ( $rating_html = $product->get_rating_html() ) { 
			echo '<a href="'.get_the_permalink().'">'.$rating_html.'</a>';
		} else { 
			echo "<span class='kt-notrated'>".__('not rated', 'ascend')."</span>"; 
		}
 	}