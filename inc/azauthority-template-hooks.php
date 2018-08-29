<?php

/**
 * Header
 */
add_action( 'azauthority_before_header', 'azauthority_skip_links', 		0 );
add_action( 'azauthority_header', 'azauthority_menu_toggle', 			10);
add_action( 'azauthority_header', 'azauthority_site_branding', 			20);
add_action( 'azauthority_header', 'azauthority_toggle_search_icon', 	30);
add_action( 'azauthority_before_content', 'azauthority_primary_nav', 	10);
add_action( 'azauthority_before_content', 'azauthority_search_form', 	20);

/**
 * Post
 */
add_action( 'azauthority_loop_post', 'azauthority_post_thumbnail', 		10);
add_action( 'azauthority_loop_post', 'azauthority_post_header', 		20);
add_action( 'azauthority_loop_post', 'azauthority_post_content', 		30);
add_action( 'azauthority_loop_after', 'azauthority_paging_nav', 		10);

/**
 * Single Post
 */
add_action( 'azauthority_single_post', 'azauthority_single_post_header', 	30);
add_action( 'azauthority_single_post', 'azauthority_inner_wrapper', 		40);
add_action( 'azauthority_single_post', 'azauthority_post_single_content', 	50);



/**
 * Single Post Title
 */
add_action( 'azauthority_single_post_title', 'azauthority_single_post_title', 	10);

/**
 * Display Div Col Full Wrapper
 */
add_action( 'azauthority_col_full_wrapper', 'azauthority_col_full_wrapper', 	10);

/**
 * Display Div Col Full Close
 */
add_action( 'azauthority_col_full_close', 'azauthority_col_full_close', 	10);

/**
 * Single Post Bottom
 */

add_action( 'azauthority_single_post_bottom', 'azauthority_post_nav', 				10);
add_action( 'azauthority_single_post_bottom', 'azauthority_display_comments', 		20);
add_action( 'azauthority_single_post_bottom', 'azauthority_inner_wrapper_close', 	30);



/**
 * Footer
 */

add_action( 'azauthority_footer', 'azauthority_back_to_top',    10 );
add_action( 'azauthority_footer', 'azauthority_footer_widgets', 20 );
add_action( 'azauthority_footer', 'azauthority_credit', 		30 );

/**
 * Homepage Hook
 */

add_action( 'azauthority_homepage', 'azauthority_feature_homepage', 10 );
add_action( 'azauthority_homepage', 'azauthority_ads_after_featured', 20 );
add_action( 'azauthority_homepage', 'azauthority_homepage_style',   30 );


/**
 * Page - Hooks
 *
 * @see  azauthority_page_header()
 * @see  azauthority_page_content()
 * @see  azauthority_display_comments()
 */

add_action( 'azauthority_page',				'azauthority_page_header',		  			10 );
add_action( 'azauthority_page',				'azauthority_page_content',					20 );
add_action( 'azauthority_page_after',		'azauthority_display_comments',			10 );

/**
 * Sidebar
 */
add_action( 'azauthority_sidebar',			'azauthority_get_sidebar',	10 );

