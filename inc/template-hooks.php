<?php
/**
 * Template Hooks
 *
 * @package bakery_shop
 */

/**
 * Doctype
 * 
 * @see bakery_shop_doctype_cb 
 */
add_action( 'bakery_shop_doctype','bakery_shop_doctype_cb' );

/**
 * Before wp_head
 * 
 * @see bakery_shop_head
*/
add_action( 'bakery_shop_before_wp_head', 'bakery_shop_head' );

/**
 * Before Header
 * 
 * @see bakery_shop_page_start - 20
*/
add_action( 'bakery_shop_before_header', 'bakery_shop_page_start', 20 );

/**
 * bakery_shop Header
 * 
 * @see bakery_shop_header_start  - 20 
 * @see bakery_shop_header_top 	 - 30 
 * @see bakery_shop_header_bottom - 40 
 * @see bakery_shop_header_menu 	 - 50 
 * @see bakery_shop_header_end 	 - 60 
*/

add_action( 'bakery_shop_header', 'bakery_shop_header_start', 20 );
add_action( 'bakery_shop_header', 'bakery_shop_header_top', 30 );
add_action( 'bakery_shop_header', 'bakery_shop_header_bottom', 40 );
add_action( 'bakery_shop_header', 'bakery_shop_header_menu', 50 );
add_action( 'bakery_shop_header', 'bakery_shop_header_end', 60 );

/**
 * Home Page Contents
 * 
 * @see bakery_shop_slider_cb 	   - 10
*/
add_action( 'bakery_shop_slider', 'bakery_shop_slider_cb', 10 );


/**
 * bakery_shop Content
 * 
 * @see bakery_shop_content_start
*/
add_action( 'bakery_shop_before_content', 'bakery_shop_content_start' );

/**
 * Before Page entry content
 * 
 * @see bakery_shop_page_content_image
*/
add_action( 'bakery_shop_before_page_entry_content', 'bakery_shop_page_content_image' );

/**
 * Before Post entry content
 * 
 * @see bakery_shop_post_content_image - 10
 * @see bakery_shop_post_entry_header  - 20
*/
add_action( 'bakery_shop_before_post_entry_content', 'bakery_shop_post_content_image', 10 );
add_action( 'bakery_shop_before_post_entry_content', 'bakery_shop_post_entry_header', 20 );

/**
 * After post content
 * 
 * @see bakery_shop_post_author  - 20
*/
add_action( 'bakery_shop_after_post_content', 'bakery_shop_post_author', 20 );

/**
 * Comment
 * 
 * @see bakery_shop_get_comment_section 
*/
add_action( 'bakery_shop_comment', 'bakery_shop_get_comment_section' );

/**
 * After Content
 * 
 * @see bakery_shop_content_end - 20
*/
add_action( 'bakery_shop_after_content', 'bakery_shop_content_end', 20 );

/**
 * Numinous Footer
 * 
 * @see bakery_shop_footer_start  - 20
 * @see bakery_shop_footer_widgets    - 30
 * @see bakery_shop_footer_credit - 40
 * @see bakery_shop_footer_end    - 50
*/
add_action( 'bakery_shop_footer', 'bakery_shop_footer_start', 20 );
add_action( 'bakery_shop_footer', 'bakery_shop_footer_widgets', 30 );
add_action( 'bakery_shop_footer', 'bakery_shop_footer_credit', 40 );
add_action( 'bakery_shop_footer', 'bakery_shop_footer_end', 50 );

/**
 * After Footer
 * 
 * @see bakery_shop_page_end - 20
*/
add_action( 'bakery_shop_after_footer', 'bakery_shop_back_to_top', 15 );
add_action( 'bakery_shop_after_footer', 'bakery_shop_page_end', 20 );