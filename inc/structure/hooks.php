<?php
/**
 * bellini hooks
 *
 * @package bellini
 */


// Header
// Footer
// Posts
//Pages
// Extras

/**
 * Homepage
 * @see  bellini_static_slider()
 * @see  bellini_woo_product_category()
 * @see  bellini_woo_product_newly_arrived()
 * @see  bellini_woo_product_featured()
 * @see  bellini_front_blog_posts()
 */

add_action( 'homepage', 'bellini_static_slider',		   		10 );
add_action( 'homepage', 'bellini_feature_blocks',		   		20 );
add_action( 'homepage', 'bellini_woo_product_category',		30 );
add_action( 'homepage', 'bellini_woo_product_newly_arrived',	40 );
add_action( 'homepage', 'bellini_woo_product_featured',		50 );
add_action( 'homepage', 'bellini_front_blog_posts',		    60 );


add_action( 'bellini_header', 'bellini_header_logo', 			10 );
add_action( 'bellini_header', 'bellini_header_menu', 			20 );
add_action( 'bellini_header', 'bellini_top_header', 			30 );



