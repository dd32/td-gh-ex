<?php
/**
 * adbooster hooks
 *
 * @package adbooster
 */

/**
 * General
 *
 * @see  adbooster_get_sidebar()
 */
add_action( 'adbooster_sidebar',        'adbooster_get_sidebar',          10 );

/**
 * Header
 *
 * @see  adbooster_skip_links()
 * @see  adbooster_handburger_btn()
 * @see  adbooster_site_branding()
 * @see  adbooster_primary_navigation()
 */
add_action( 'adbooster_header', 'adbooster_skip_links', 0 );
add_action( 'adbooster_header', 'adbooster_header_menu', 1 );
add_action( 'adbooster_header', 'adbooster_header_wrapper', 5 );
add_action( 'adbooster_header', 'adbooster_handburger_btn', 10 );
add_action( 'adbooster_header', 'adbooster_site_branding', 20 );
add_action( 'adbooster_header', 'adbooster_header_wrapper_close', 25 );
add_action( 'adbooster_header', 'adbooster_header_search', 30 );
add_action( 'adbooster_before_header', 'adbooster_header_search_form', 10 );


/**
 * Footer
 *
 * @see  adbooster_footer_widgets()
 * @see  adbooster_credit()
 */
add_action( 'adbooster_footer', 'adbooster_footer_widgets', 10 );
add_action( 'adbooster_footer', 'adbooster_site_info_wrapper', 15 );
add_action( 'adbooster_footer', 'adbooster_credit', 20 );
add_action( 'adbooster_footer', 'adbooster_footer_menu', 30 );
add_action( 'adbooster_footer', 'adbooster_site_info_wrapper_close', 35 );

/**
 * Posts
 * 
 */
add_action( 'adbooster_loop_post', 'adbooster_post_header', 10 );
add_action( 'adbooster_loop_post', 'adbooster_post_content', 20 );
add_action( 'adbooster_loop_post', 'adbooster_init_structured_data', 30 );

add_action( 'adbooster_loop_after', 'adbooster_paging_nav', 10 );

add_action( 'adbooster_single_post', 'adbooster_post_header', 10 );
add_action( 'adbooster_single_post', 'adbooster_post_content', 20 );
add_action( 'adbooster_single_post', 'adbooster_init_structured_data', 30 );

add_action( 'adbooster_single_post_bottom', 'adbooster_post_nav', 10 );
add_action( 'adbooster_single_post_bottom', 'adbooster_display_comments', 20 );

add_action( 'adbooster_before_title', 'adbooster_post_thumbnail', 10);
add_action( 'adbooster_post_meta', 'adbooster_post_meta', 10 );

/**
 * Pages
 * 
 * @see  adbooster_page_header()
 * @see  adbooster_page_content()
 * @see  adbooster_init_structured_data()
 * @see  adbooster_display_comments()
 */
add_action( 'adbooster_page',       'adbooster_page_header',          10 );
add_action( 'adbooster_page',       'adbooster_page_content',         20 );
add_action( 'adbooster_page',       'adbooster_init_structured_data', 30 );
add_action( 'adbooster_page_after', 'adbooster_display_comments', 10);

/**
 * Homepage Hook
 */
add_action( 'adbooster_homepage', 'adbooster_homepage_content', 10 );