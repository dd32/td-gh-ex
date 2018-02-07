<?php
/**
 * WP hooks for this theme.
 *
 * @package bakery_shop
 */

/**
 * @see bakery_shop_setup
*/
add_action( 'after_setup_theme', 'bakery_shop_setup' );

/**
 * @see bakery_shop_content_width
*/
add_action( 'after_setup_theme', 'bakery_shop_content_width', 0 );

/**
 * @see bakery_shop_template_redirect_content_width
*/
add_action( 'template_redirect', 'bakery_shop_template_redirect_content_width' );

/**
 * @see bakery_shop_scripts 
*/
add_action( 'wp_enqueue_scripts', 'bakery_shop_scripts' );

/**
 * @see bakery_shop_body_classes
*/
add_filter( 'body_class', 'bakery_shop_body_classes' );

/**
 * @see bakery_shop_category_transient_flusher
*/
add_action( 'edit_category', 'bakery_shop_category_transient_flusher' );
add_action( 'save_post',     'bakery_shop_category_transient_flusher' );

/**
 * Move comment field to the bottm
 * @see bakery_shop_move_comment_field_to_bottom
*/
add_filter( 'comment_form_fields', 'bakery_shop_move_comment_field_to_bottom' );
