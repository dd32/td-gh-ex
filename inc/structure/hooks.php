<?php

/**
 * General
 * @see aemi_remove_emojis()
 * @see aemi_remove_oembed()
 * @see aemi_remove_wp_head_tasks()
 * @see aemi_content_width()
 * @see aemi_setup()
 * @see aemi_widgets_init()
 * @see aemi_scripts()
 */
add_action( 'init', 'aemi_remove_emojis', 10 );
add_action( 'init', 'aemi_remove_oembed', 20 );
add_action( 'init', 'aemi_remove_wp_head_tasks', 30 );
add_action( 'after_setup_theme', 'aemi_content_width', 0 );
add_action( 'after_setup_theme', 'aemi_setup' );
add_action( 'widgets_init', 'aemi_widgets_init' );
add_action( 'wp_enqueue_scripts', 'aemi_scripts', 10 );

/**
 * Header
 * @see aemi_header_menu()
 * @see aemi_header_branding()
 * @see aemi_header_widget()
 */
add_action( 'aemi_header', 'aemi_header_menu', 10 );
add_action( 'aemi_header', 'aemi_header_branding', 20 );
add_action( 'aemi_header', 'aemi_header_widgets', 30 );

/**
 * Footer
 * @see aemi_sidebar()
 * @see aemi_footer_widgets()
 * @see aemi_footer_site_description()
 * @see aemi_footer_menu()
 * @see aemi_footer_credit()
 * @see aemi_footer_wp_footer()
 */
add_action( 'aemi_footer_before', 'aemi_sidebar', 10 );
add_action( 'aemi_footer', 'aemi_scrollup', 10 );
add_action( 'aemi_footer', 'aemi_footer_widgets', 20 );
add_action( 'aemi_footer', 'aemi_footer_site_description', 30 );
add_action( 'aemi_footer', 'aemi_footer_menu', 40 );
add_action( 'aemi_footer', 'aemi_footer_credit', 50 );
add_action( 'aemi_footer_after', 'aemi_footer_wp_footer', 10 );

/**
 * Posts
 * @see aemi_post_header()
 * @see aemi_post_content()
 * @see aemi_posts_pagination()
 * @see aemi_post_navigation()
 * @see aemi_display_comments()
 */
add_action( 'aemi_loop_post', 'aemi_post_header',	10 );
add_action( 'aemi_loop_after','aemi_posts_pagination', 10 );
add_action( 'aemi_single_post', 'aemi_post_header', 10 );
add_action( 'aemi_single_post', 'aemi_post_content', 20 );
add_action( 'aemi_single_post_after', 'aemi_post_meta_footer', 10 );
add_action( 'aemi_single_post_after', 'aemi_display_comments', 20 );
add_action( 'aemi_single_post_after', 'aemi_post_navigation', 30 );

/**
 * Pages
 * @see aemi_page_header()
 * @see aemi_page_content()
 * @see aemi_display_comments()
 */
add_action( 'aemi_page', 'aemi_page_header', 10 );
add_action( 'aemi_page', 'aemi_page_content',	20 );
add_action( 'aemi_page_after', 'aemi_post_meta_footer', 10 );
add_action( 'aemi_page_after', 'aemi_display_comments', 20 );

/**
 * Extras
 * @see aemi_body_classes()
 */
add_filter( 'body_class', 'aemi_body_classes' );
