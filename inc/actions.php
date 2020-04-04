<?php
/**
 * All core theme actions.
 *
 * @package Fmi
 */

/**
 * Site
 */
add_action( 'vs_site_before', 'vs_offcanvas', 10 );

/**
 * Post
 */
add_action( 'vs_post_after', 'vs_single_author', 10 );
add_action( 'vs_post_after', 'vs_single_prev_nex', 15 );
add_action( 'vs_post_after', 'vs_comments', 20 );

/**
 * Page
 */
add_action( 'vs_page_after', 'vs_comments', 10 );

/**
 * Footer
 */
add_action( 'wp_footer', 'vs_scroll_to_top', 10 );
