<?php
//HOOKS HEADER
add_action( 'igthemes_site_header', 'igthemes_site_description', 10 );
add_action( 'igthemes_site_header', 'igthemes_site_header_menu', 20 );
//HOOKS MAIN NAV
add_action( 'igthemes_site_main_nav', 'igthemes_site_title', 10 );
add_action( 'igthemes_site_main_nav', 'igthemes_site_main_menu', 30 );
//HOOKS FOOTER
add_action( 'igthemes_site_footer', 'igthemes_social_links', 10 );
add_action( 'igthemes_site_footer', 'igthemes_site_info', 20 );

//HOOKS BEFORE CONTENT
add_action('igthemes_before_content', 'igthemes_breadcrumb', 10 );
add_action('igthemes_before_content', 'igthemes_header_widgets', 20 );
//HOOKS AFTER CONTENT
add_action('igthemes_after_content', 'igthemes_footer_widgets', 10 );
//HOOKS PAGE
add_action('igthemes_single_page', 'igthemes_page_header', 10 );
add_action('igthemes_single_page', 'igthemes_page_content', 20 );
add_action('igthemes_single_page', 'igthemes_page_footer', 30 );
//HOOKS POST
add_action('igthemes_single_post', 'igthemes_post_header', 10 );
add_action('igthemes_single_post', 'igthemes_post_content', 20 );
add_action('igthemes_single_post', 'igthemes_post_footer', 30 );
//HOOKS SIDEBAR
add_action('igthemes_sidebar', 'igthemes_get_sidebar', 10 );
