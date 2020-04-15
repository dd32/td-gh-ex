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
 * Header
 */
add_action( 'vs_navbar_topbar_left', 'vs_header_logo', 10 );
add_action( 'vs_navbar_topbar_right', 'vs_header_search', 10 );
add_action( 'vs_navbar_topbar_right', 'vs_header_offcanvas_button', 15 );
add_action( 'vs_navbar_bottombar', 'vs_navbar_nav_menu', 10 );

/**
 * Post
 */
add_action( 'vs_post_content_end', 'vs_page_pagination', 10 );
add_action( 'vs_post_after', 'vs_single_author', 10 );
add_action( 'vs_post_after', 'vs_single_prev_nex', 15 );
add_action( 'vs_post_after', 'vs_comments', 20 );

/**
 * Page
 */
add_action( 'vs_page_content_end', 'vs_page_pagination', 10 );
add_action( 'vs_page_after', 'vs_comments', 10 );

/**
 * Footer
 */
add_action( 'wp_footer', 'vs_scroll_to_top', 10 );
