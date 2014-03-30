<?php
/**
 * Apprise functions and definitions
 *
 * @package Apprise
 *
 */

/** 
 * Makes theme available for translation
 * 
 */
load_theme_textdomain( 'apprise', get_template_directory() . '/languages' );

/** 
 * This theme styles the visual editor with editor-style.css to match the theme style.
 */
add_editor_style();

/** 
 * Default RSS feed links
 */
add_theme_support('automatic-feed-links');

/**
 * Register Navigation
 */
register_nav_menu('main_navigation', __('Primary Menu', 'apprise') );

/** 
 * Support a variety of post formats.
 */
add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery' ) );

/** 
 * Custom image size for featured images, displayed on "standard" posts.
 */

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 2500, 9999 ); // Unlimited height, soft crop

/** 
 * Sets up the content width.
 */
if ( ! isset( $content_width ) )
	$content_width = 1200;

/**
 * Adds JavaScript to pages with the comment form to support sites with threaded comments (when in use).
 */
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

/**
 * Sets up theme custom backgrounds
 */

$custombg = array(
	'default-color' => 'ffffff',
	);	
add_theme_support( 'custom-background', $custombg );

/**
 * Function to change excerpt more string
 */

function apprise_custom_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'apprise_custom_excerpt_more' );

/**
 * Sets up theme defaults CSS rules
 */
function apprise_custom_styling() {
	/**
	 * General Settings 
	 */		
	$google_font_logo = of_get_option('google_font_logo');
	$logo_uppercase = of_get_option('logo_uppercase');
	$tagline_uppercase = of_get_option('tagline_uppercase');
	$logo_font_weight = of_get_option('logo_font_weight');
	$text_logo_color = of_get_option('text_logo_color');
	$logo_font_size = of_get_option('logo_font_size');
	$google_font_body = of_get_option('google_font_body');
	$body_font_size = of_get_option('body_font_size');
	$body_font_color = of_get_option('body_font_color');
	$tagline_color = of_get_option('tagline_color');
	$tagline_font_size = of_get_option('tagline_font_size');
	$logo_width = of_get_option('logo_width');
	$logo_height = of_get_option('logo_height');
	$logo_top_margin = of_get_option('logo_top_margin');
	$logo_left_margin = of_get_option('logo_left_margin');
	$logo_bottom_margin = of_get_option('logo_bottom_margin');
	$logo_right_margin = of_get_option('logo_right_margin');

	/**
	 * Header Settings 
	 */		
	$header_social_color = of_get_option('header_social_color');
	
	/**
	 * Home Page Settings
	 */	
	$tagline_bg_color = of_get_option('tagline_bg_color');
	$tagline_text_color = of_get_option('tagline_text_color');
	$content_box_bg_color = of_get_option('content_box_bg_color');
	$column_header_color = of_get_option('column_header_color');
	
	/**
	 * Navigation Menu 
	 */	
	$google_font_menu = of_get_option('google_font_menu');
	$nav_font_size = of_get_option('nav_font_size');
	$nav_font_color = of_get_option('nav_font_color');
	$nav_bg_color  = of_get_option('nav_bg_color');
	$nav_hover_font_color  = of_get_option('nav_hover_font_color');
	$nav_bg_hover_color = of_get_option('nav_bg_hover_color');
	$nav_cur_item_color = of_get_option('nav_cur_item_color');

	/**
	 * Footer Settings
	 */	
	$footer_bg_color = of_get_option('footer_bg_color');	
	$copyright_bg_color = of_get_option('copyright_bg_color');
	$footer_widget_title_color = of_get_option('footer_widget_title_color');
	$footer_widget_title_border_color = of_get_option('footer_widget_title_border_color');
	$footer_widget_text_color = of_get_option('footer_widget_text_color');
	$footer_widget_text_border_color = of_get_option('footer_widget_text_border_color');
	$footer_social_color  = of_get_option('footer_social_color');

	/**
	 * Sidebar Settings
	 */
	$archives_widget_bg_color = of_get_option('archives_widget_bg_color');
	$archives_widget_font_color = of_get_option('archives_widget_font_color');
	$archives_widget_title_color = of_get_option('archives_widget_title_color');
	
	$categories_widget_bg_color = of_get_option('categories_widget_bg_color');
	$categories_widget_font_color = of_get_option('categories_widget_font_color');
	$categories_widget_title_color = of_get_option('categories_widget_title_color');
	
	$calendar_widget_bg_color = of_get_option('calendar_widget_bg_color');
	$calendar_widget_font_color = of_get_option('calendar_widget_font_color');
	$calendar_widget_title_color = of_get_option('calendar_widget_title_color');
	
	$custom_menu_widget_bg_color = of_get_option('custom_menu_widget_bg_color');
	$custom_menu_widget_font_color = of_get_option('custom_menu_widget_font_color');
	$custom_menu_widget_title_color = of_get_option('custom_menu_widget_title_color');
	
	$links_widget_bg_color = of_get_option('links_widget_bg_color');
	$links_widget_font_color = of_get_option('links_widget_font_color');
	$links_widget_title_color = of_get_option('links_widget_title_color');
	
	$meta_widget_bg_color = of_get_option('meta_widget_bg_color');
	$meta_widget_font_color = of_get_option('meta_widget_font_color');
	$meta_widget_title_color = of_get_option('meta_widget_title_color');
	
	$pages_widget_bg_color = of_get_option('pages_widget_bg_color');
	$pages_widget_font_color = of_get_option('pages_widget_font_color');
	$pages_widget_title_color = of_get_option('pages_widget_title_color');
	
	$recent_comments_widget_bg_color = of_get_option('recent_comments_widget_bg_color');
	$recent_comments_widget_font_color = of_get_option('recent_comments_widget_font_color');
	$recent_comments_widget_title_color = of_get_option('recent_comments_widget_title_color');
	
	$recent_posts_widget_bg_color = of_get_option('recent_posts_widget_bg_color');
	$recent_posts_widget_font_color = of_get_option('recent_posts_widget_font_color');
	$recent_posts_widget_title_color = of_get_option('recent_posts_widget_title_color');
	
	$rss_widget_bg_color = of_get_option('rss_widget_bg_color');
	$rss_widget_font_color = of_get_option('rss_widget_font_color');
	$rss_widget_title_color = of_get_option('rss_widget_title_color');
	
	$search_widget_bg_color = of_get_option('search_widget_bg_color');
	$search_widget_font_color = of_get_option('search_widget_font_color');
	$search_widget_title_color = of_get_option('search_widget_title_color');
	
	$tag_cloud_widget_bg_color = of_get_option('tag_cloud_widget_bg_color');
	$tag_cloud_widget_font_color = of_get_option('tag_cloud_widget_font_color');
	$tag_cloud_widget_title_color = of_get_option('tag_cloud_widget_title_color');
	
	$text_widget_bg_color = of_get_option('text_widget_bg_color');
	$text_widget_font_color = of_get_option('text_widget_font_color');
	$text_widget_title_color = of_get_option('text_widget_title_color');
	
	$other_widget_bg_color = of_get_option('other_widget_bg_color');
	$other_widget_font_color = of_get_option('other_widget_font_color');
	$other_widget_title_color = of_get_option('other_widget_title_color');
	
	$post_info_widget_bg_color = of_get_option('post_info_widget_bg_color');
	$post_info_widget_font_color = of_get_option('post_info_widget_font_color');
	$post_info_widget_title_color = of_get_option('post_info_widget_title_color');
	
	$output = '';

	/**
	 * Sidebar Settings
	 */
	
	/* Post Info */
	if ( $post_info_widget_title_color )
	$output .= '.widget_post_info .widget-title h4 { color:' . $post_info_widget_title_color . ' !important;}' . "\n";
	$output .= '.widget_post_info .widget-title { border-bottom: 3px solid ' . $post_info_widget_title_color . ' !important; }' . "\n";
	
	if ( $post_info_widget_font_color )
	$output .= '.widget_post_info, .widget_post_info a { color:' . $post_info_widget_font_color . ' !important;}' . "\n";
	$output .= '.widget_post_info ul li { border-bottom: 1px solid ' . $post_info_widget_font_color . ' !important;}' . "\n";
	
	if ( $post_info_widget_bg_color )
	$output .= '.widget_post_info { background-color:' . $post_info_widget_bg_color . ' !important;}' . "\n";
	
	/* Other widgets */
	if ( $other_widget_title_color )
	$output .= '.sidebar .widget .widget-title h4, .post-sidebar .widget .widget-title h4 { color:' . $other_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget .widget-title, .post-sidebar .widget .widget-title  { border-bottom: 3px solid ' . $other_widget_title_color . '}' . "\n";
	
	if ( $other_widget_font_color )
	$output .= '.sidebar .widget, .sidebar .widget a, .post-sidebar .widget, .post-sidebar .widget a { color:' . $other_widget_font_color . '}' . "\n";
	$output .= '.sidebar .widget ul li, .post-sidebar .widget ul li { border-bottom: 1px solid ' . $other_widget_font_color . '}' . "\n";
	
	if ( $other_widget_bg_color )
	$output .= '.sidebar .widget,  .post-sidebar .widget { background-color:' . $other_widget_bg_color . '}' . "\n";
	
	/* Text widget */
	if ( $text_widget_title_color )
	$output .= '.sidebar .widget_text .widget-title h4, .post-sidebar .widget_text .widget-title h4 { color:' . $text_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_text .widget-title, .post-sidebar .widget_text .widget-title { border-bottom: 3px solid ' . $text_widget_title_color . '}' . "\n";
	
	if ( $text_widget_font_color )
	$output .= '.sidebar .widget_text, .sidebar .widget_text a, .post-sidebar .widget_text, .post-sidebar .widget_text a { color:' . $text_widget_font_color . '}' . "\n";
	$output .= '.sidebar .widget_text ul li, .post-sidebar .widget_text ul li { border-bottom: 1px solid ' . $text_widget_font_color . '}' . "\n";
	
	if ( $text_widget_bg_color )
	$output .= '.sidebar .widget_text, .post-sidebar .widget_text { background-color:' . $text_widget_bg_color . '}' . "\n";
	
	/* Tag Cloud widget */
	if ( $tag_cloud_widget_title_color )
	$output .= '.sidebar .widget_tag_cloud .widget-title h4, .post-sidebar .widget_tag_cloud .widget-title h4 { color:' . $tag_cloud_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_tag_cloud .widget-title, .post-sidebar .widget_tag_cloud .widget-title { border-bottom: 3px solid ' . $tag_cloud_widget_title_color . '}' . "\n";
	
	if ( $tag_cloud_widget_font_color )
	$output .= '.sidebar .widget_tag_cloud, .sidebar .widget_tag_cloud a, .post-sidebar .short-info .single-meta .tags-list a, .post-sidebar .short-info .single-meta .tagcloud a { color:' . $tag_cloud_widget_font_color . ' !important;}' . "\n";
	$output .= '.sidebar .widget_tag_cloud ul li, .post-sidebar .widget_tag_cloud ul li { border-bottom: 1px solid ' . $tag_cloud_widget_font_color . '}' . "\n";
	
	if ( $tag_cloud_widget_bg_color )
	$output .= '.sidebar .widget_tag_cloud, .post-sidebar .widget_tag_cloud { background-color:' . $tag_cloud_widget_bg_color . '}' . "\n";
	
	/* Search widget */
	if ( $search_widget_title_color )
	$output .= '.sidebar .widget_search .widget-title h4, .post-sidebar .widget_search .widget-title h4 { color:' . $search_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_search .widget-title, .post-sidebar .widget_search .widget-title { border-bottom: 3px solid ' . $search_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget .searchform input#s, .post-sidebar .widget .searchform input#s { border: 1px solid ' . $search_widget_title_color . '}' . "\n";
	
	if ( $search_widget_font_color )
	$output .= '.sidebar .widget_search, .sidebar .widget_search a, .sidebar .searchform input#s, .post-sidebar .widget_search, .post-sidebar .widget_search a, .post-sidebar .searchform input#s { color:' . $search_widget_font_color . '}' . "\n";
	$output .= '.sidebar .widget_search ul li, .post-sidebar .widget_search ul li { border-bottom: 1px solid ' . $search_widget_font_color . '}' . "\n";
	
	if ( $search_widget_bg_color )
	$output .= '.sidebar .widget_search, .post-sidebar .widget_search { background-color:' . $search_widget_bg_color . '}' . "\n";
	
	/* RSS widget */
	if ( $rss_widget_title_color )
	$output .= '.sidebar .widget_rss .widget-title h4 a, .post-sidebar .widget_rss .widget-title h4 a { color:' . $rss_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_rss .widget-title, .post-sidebar .widget_rss .widget-title { border-bottom: 3px solid ' . $rss_widget_title_color . '}' . "\n";
	
	if ( $rss_widget_font_color )
	$output .= '.sidebar .widget_rss, .sidebar .widget_rss a, .post-sidebar .widget_rss, .post-sidebar .widget_rss a { color:' . $rss_widget_font_color . '}' . "\n";
	$output .= '.sidebar .widget_rss ul li, .post-sidebar .widget_rss ul li { border-bottom: 1px solid ' . $rss_widget_font_color . '}' . "\n";
	
	if ( $rss_widget_bg_color )
	$output .= '.sidebar .widget_rss, .post-sidebar .widget_rss { background-color:' . $rss_widget_bg_color . '}' . "\n";
	
	/* Recent Posts widget */
	if ( $recent_posts_widget_title_color )
	$output .= '.sidebar .widget_recent_entries .widget-title h4, .post-sidebar .widget_recent_entries .widget-title h4 { color:' . $recent_posts_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_recent_entries .widget-title, .post-sidebar .widget_recent_entries .widget-title { border-bottom: 3px solid ' . $recent_posts_widget_title_color . '}' . "\n";
	
	if ( $recent_posts_widget_font_color )
	$output .= '.sidebar .widget_recent_entries, .sidebar .widget_recent_entries a, .post-sidebar .widget_recent_entries, .post-sidebar .widget_recent_entries a { color:' . $recent_posts_widget_font_color . '}' . "\n";
	$output .= '.sidebar .widget_recent_entries ul li, .post-sidebar .widget_recent_entries ul li { border-bottom: 1px solid ' . $recent_posts_widget_font_color . '}' . "\n";
	
	if ( $recent_posts_widget_bg_color )
	$output .= '.sidebar .widget_recent_entries, .post-sidebar .widget_recent_entries { background-color:' . $recent_posts_widget_bg_color . '}' . "\n";
	
	/* Recent Comments widget */
	if ( $recent_comments_widget_title_color )
	$output .= '.sidebar .widget_recent_comments .widget-title h4, .post-sidebar .widget_recent_comments .widget-title h4 { color:' . $recent_comments_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_recent_comments .widget-title, .post-sidebar .widget_recent_comments .widget-title { border-bottom: 3px solid ' . $recent_comments_widget_title_color . '}' . "\n";
	
	if ( $recent_comments_widget_font_color )
	$output .= '.sidebar .widget_recent_comments, .sidebar .widget_recent_comments a, .post-sidebar .widget_recent_comments, .post-sidebar .widget_recent_comments a { color:' . $recent_comments_widget_font_color . '}' . "\n";
	$output .= '.sidebar .widget_recent_comments ul li, .post-sidebar .widget_recent_comments ul li { border-bottom: 1px solid ' . $recent_comments_widget_font_color . '}' . "\n";
	
	if ( $recent_comments_widget_bg_color )
	$output .= '.sidebar .widget_recent_comments, .post-sidebar .widget_recent_comments { background-color:' . $recent_comments_widget_bg_color . '}' . "\n";
	
	/* Pages widget */
	if ( $pages_widget_title_color )
	$output .= '.sidebar .widget_pages .widget-title h4, .post-sidebar .widget_pages .widget-title h4 { color:' . $pages_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_pages .widget-title, .post-sidebar .widget_pages .widget-title { border-bottom: 3px solid ' . $pages_widget_title_color . '}' . "\n";
	
	if ( $pages_widget_font_color )
	$output .= '.sidebar .widget_pages, .sidebar .widget_pages a, .post-sidebar .widget_pages, .post-sidebar .widget_pages a { color:' . $pages_widget_font_color . '}' . "\n";
	$output .= '.sidebar .widget_pages ul li, .post-sidebar .widget_pages ul li { border-bottom: 1px solid ' . $pages_widget_font_color . '}' . "\n";
	
	if ( $pages_widget_bg_color )
	$output .= '.sidebar .widget_pages, .post-sidebar .widget_pages { background-color:' . $pages_widget_bg_color . '}' . "\n";
	
	/* Meta widget */
	if ( $meta_widget_title_color )
	$output .= '.sidebar .widget_meta .widget-title h4, .post-sidebar .widget_meta .widget-title h4 { color:' . $meta_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_meta .widget-title, .post-sidebar .widget_meta .widget-title { border-bottom: 3px solid ' . $meta_widget_title_color . '}' . "\n";
	
	if ( $meta_widget_font_color )
	$output .= '.sidebar .widget_meta, .sidebar .widget_meta a, .post-sidebar .widget_meta, .post-sidebar .widget_meta a { color:' . $meta_widget_font_color . '}' . "\n";
	$output .= '.sidebar .widget_meta ul li, .post-sidebar .widget_meta ul li { border-bottom: 1px solid ' . $meta_widget_font_color . '}' . "\n";
	
	if ( $meta_widget_bg_color )
	$output .= '.sidebar .widget_meta, .post-sidebar .widget_meta { background-color:' . $meta_widget_bg_color . '}' . "\n";
	
	/* Links widget */
	if ( $links_widget_title_color )
	$output .= '.sidebar .widget_links .widget-title h4, .post-sidebar .widget_links .widget-title h4 { color:' . $links_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_links .widget-title, .post-sidebar .widget_links .widget-title { border-bottom: 3px solid ' . $links_widget_title_color . '}' . "\n";
	
	if ( $links_widget_font_color )
	$output .= '.sidebar .widget_links, .sidebar .widget_links a, .post-sidebar .widget_links, .post-sidebar .widget_links a { color:' . $links_widget_font_color . '}' . "\n";
	$output .= '.sidebar .widget_links ul li, .post-sidebar .widget_links ul li { border-bottom: 1px solid ' . $links_widget_font_color . '}' . "\n";
	
	if ( $links_widget_bg_color )
	$output .= '.sidebar .widget_links, .post-sidebar .widget_links { background-color:' . $links_widget_bg_color . '}' . "\n";
	
	/* Custom Menu widget */
	if ( $custom_menu_widget_title_color )
	$output .= '.sidebar .widget_nav_menu .widget-title h4, .post-sidebar .widget_nav_menu .widget-title h4 { color:' . $custom_menu_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_nav_menu .widget-title, .post-sidebar .widget_nav_menu .widget-title { border-bottom: 3px solid ' . $custom_menu_widget_title_color . '}' . "\n";
	
	if ( $custom_menu_widget_font_color )
	$output .= '.sidebar .widget_nav_menu, .sidebar .widget_nav_menu a, .post-sidebar .widget_nav_menu, .post-sidebar .widget_nav_menu a { color:' . $custom_menu_widget_font_color . '}' . "\n";
	$output .= '.sidebar .widget_nav_menu ul li, .sidebar .widget_nav_menu ul li ul li a, .post-sidebar .widget_nav_menu ul li, .post-sidebar .widget_nav_menu ul li ul li a { border-bottom: 1px solid ' . $custom_menu_widget_font_color . '}' . "\n";
	
	if ( $custom_menu_widget_bg_color )
	$output .= '.sidebar .widget_nav_menu, .post-sidebar .widget_nav_menu { background-color:' . $custom_menu_widget_bg_color . '}' . "\n";
	
	/* Calendar widget */
	if ( $calendar_widget_title_color )
	$output .= '.sidebar .widget_calendar .widget-title h4, .post-sidebar .widget_calendar .widget-title h4 { color:' . $calendar_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_calendar .widget-title, .post-sidebar .widget_calendar .widget-title { border-bottom: 3px solid ' . $calendar_widget_title_color . '}' . "\n";
	
	if ( $calendar_widget_font_color )
	$output .= '.sidebar .widget_calendar, .sidebar .widget_calendar a, .post-sidebar .widget_calendar, .post-sidebar .widget_calendar a { color:' . $calendar_widget_font_color . '}' . "\n";
	$output .= '.sidebar .widget_calendar ul li, .post-sidebar .widget_calendar ul li { border-bottom: 1px solid ' . $calendar_widget_font_color . '}' . "\n";
	
	if ( $calendar_widget_bg_color )
	$output .= '.sidebar .widget_calendar, .post-sidebar .widget_calendar { background-color:' . $calendar_widget_bg_color . '}' . "\n";
	
	/* Categories widget */
	if ( $categories_widget_title_color )
	$output .= '.sidebar .widget_categories .widget-title h4, .post-sidebar .widget_categories .widget-title h4 { color:' . $categories_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_categories .widget-title, .post-sidebar .widget_categories .widget-title { border-bottom: 3px solid ' . $categories_widget_title_color . '}' . "\n";
	
	if ( $categories_widget_font_color )
	$output .= '.sidebar .widget_categories, .sidebar .widget_categories a, .post-sidebar .widget_categories, .post-sidebar .widget_categories a { color:' . $categories_widget_font_color . '}' . "\n";
	$output .= '.sidebar .widget_categories ul li, .post-sidebar .widget_categories ul li { border-bottom: 1px solid ' . $categories_widget_font_color . '}' . "\n";
	
	if ( $categories_widget_bg_color )
	$output .= '.sidebar .widget_categories, .post-sidebar .widget_categories { background-color:' . $categories_widget_bg_color . '}' . "\n";
	
	/* Archives widget */
	if ( $archives_widget_title_color )
	$output .= '.sidebar .widget_archive .widget-title h4, .post-sidebar .widget_archive .widget-title h4 { color:' . $archives_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_archive .widget-title, .post-sidebar .widget_archive .widget-title { border-bottom: 3px solid ' . $archives_widget_title_color . '}' . "\n";
	
	if ( $archives_widget_font_color )
	$output .= '.sidebar .widget_archive, .sidebar .widget_archive a, .post-sidebar .widget_archive, .post-sidebar .widget_archive a { color:' . $archives_widget_font_color . '}' . "\n";
	$output .= '.sidebar .widget_archive ul li, .post-sidebar .widget_archive ul li { border-bottom: 1px solid ' . $archives_widget_font_color . '}' . "\n";
	
	if ( $archives_widget_bg_color )
	$output .= '.sidebar .widget_archive, .post-sidebar .widget_archive { background-color:' . $archives_widget_bg_color . '}' . "\n";
		
	/**
	 * Footer Settings
	 */
	if ( $footer_bg_color )
	$output .= '#footer { background-color:' . $footer_bg_color . '}' . "\n";

	if ( $copyright_bg_color )
	$output .= '#copyright { background-color:' . $copyright_bg_color . '}' . "\n";
	
	if ( $footer_widget_title_color )
	$output .= '.footer-widget-col h4 { color:' . $footer_widget_title_color . '}' . "\n";
	
	if ( $footer_widget_title_border_color )
	$output .= '.footer-widget-col h4 { border-bottom: 2px solid ' . $footer_widget_title_border_color . '}' . "\n";
	
	if ( $footer_widget_text_color )
	$output .= '.footer-widget-col a, .footer-widget-col { color:' . $footer_widget_text_color . '}' . "\n";

	if ( $footer_widget_text_border_color )
	$output .= '.footer-widget-col ul li { border-bottom: 1px solid ' . $footer_widget_text_border_color . '}' . "\n";
	
	if ( $footer_social_color )
	$output .= '#social-bar-footer ul li a i { color:' . $footer_social_color . '}' . "\n"; 
	
	/**
	 * Navigation Menu 
	 */	
	if ( $google_font_menu )
	$output .= '#site-navigation ul li a {font-family:' . $google_font_menu . '}' . "\n";	

	if ( $nav_font_size )
	$output .= '#site-navigation ul li a {font-size:' . $nav_font_size . 'px}' . "\n";
	
	if ( $nav_font_color )
	$output .= '#site-navigation ul li a {color:' . $nav_font_color . '}' . "\n";

	if ( $nav_bg_color )
	$output .= '#header-layout {background-color:' . $nav_bg_color . '}' . "\n";

	if ( $nav_hover_font_color )
	$output .= '#site-navigation ul li a:hover {color:' . $nav_hover_font_color . '}' . "\n";

	if ( $nav_bg_hover_color )
	$output .= '#menu-main-navigation li a:hover, #menu-main-navigation li:hover a, #menu-main-navigation li ul.sub-menu { background:' . $nav_bg_hover_color . '}' . "\n";	

	if ( $nav_cur_item_color )
	$output .= '#menu-main-navigation .current-menu-item a { color:' . $nav_cur_item_color . '}' . "\n";

	/**
	 * Header Settings 
	 */	

	if ( $header_social_color )
	$output .= '#logo-layout #social-bar ul li a { color:' . $header_social_color . '}' . "\n";
	
	/**
	 * General Settings 
	 */		
	
	if ( $logo_top_margin )
	$output .= '#logo { margin-top:' . $logo_top_margin . 'px }' . "\n";
	
	if ( $logo_bottom_margin )
	$output .= '#logo { margin-bottom:' . $logo_bottom_margin . 'px }' . "\n";
	
	if ( $logo_left_margin )
	$output .= '#logo { margin-left:' . $logo_left_margin . 'px }' . "\n";
	
	if ( $logo_right_margin )
	$output .= '#logo { margin-right:' . $logo_right_margin . 'px }' . "\n";
	
	if ( $logo_height )
	$output .= '#logo {height:' . $logo_height . 'px }' . "\n";
	
	if ( $logo_width )
	$output .= '#logo {width:' . $logo_width . 'px }' . "\n";
	
	if ( $logo_font_weight )
	$output .= '#logo {font-weight:' . $logo_font_weight . '}' . "\n";
	
	if ( $tagline_uppercase == '0' )
	$output .= '#logo .site-description {text-transform: none}' . "\n";

	if ( $tagline_uppercase == '1' )
	$output .= '#logo .site-description {text-transform: uppercase}' . "\n";
	
	if ( $tagline_font_size )
	$output .= '#logo h5.site-description {font-size:' . $tagline_font_size . 'px }' . "\n";
	
	if ( $logo_uppercase == '1' )
	$output .= '#logo {text-transform: uppercase }' . "\n";
	
	if ( $google_font_logo )
	$output .= '#logo {font-family:' . $google_font_logo . '}' . "\n";

	if ( $text_logo_color )
	$output .= '#logo a {color:' . $text_logo_color . '}' . "\n";

	if ( $tagline_color )
	$output .= '#logo .site-description {color:' . $tagline_color . '}' . "\n";	
	
	if ( $logo_font_size )
	$output .= '#logo {font-size:' . $logo_font_size . 'px }' . "\n";

	if ( $google_font_body != 'None' )
	$output .= 'body {font-family:' . $google_font_body . ' !important}' . "\n";	
	
	if ( $body_font_size )
	$output .= 'body {font-size:' . $body_font_size . 'px !important}' . "\n";
	
	if ( $body_font_color )
	$output .= 'body {color:' . $body_font_color . '}' . "\n";
			
	// Output styles
	if ( isset( $output ) && $output != '' ) {
		$output = strip_tags( $output );
		$output = "<!--Custom Styling-->\n<style media=\"screen\" type=\"text/css\">\n" . $output . "</style>\n";
		echo $output;
	}
}

add_action('wp_enqueue_scripts','apprise_custom_styling');


/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 */
function apprise_wp_title( $title, $sep ) {
	global $paged, $page;
	
	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'apprise' ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'apprise_wp_title', 10, 2 );

/** 
 * Add scripts function
 */
function apprise_add_script_function() {
	/** 
	* Enqueue css
	*/
	wp_enqueue_style('apprise',  get_stylesheet_uri());
	if (of_get_option('responsive_design') == '1'):
		wp_enqueue_style ('responsive', get_template_directory_uri() . '/css/responsive.css');
	endif;
	wp_enqueue_style ('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	if( of_get_option('google_font_body') !=""):
		wp_enqueue_style ('body-font', '//fonts.googleapis.com/css?family='. urlencode(of_get_option('google_font_body')) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
	endif;
	if( of_get_option('google_font_menu') != ""):
		wp_enqueue_style ('menu-font', '//fonts.googleapis.com/css?family='. urlencode(of_get_option('google_font_menu')) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
	endif;
	if( of_get_option('google_font_logo') != ""):
		wp_enqueue_style ('logo-font', '//fonts.googleapis.com/css?family='. urlencode(of_get_option('google_font_logo')) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
	endif;

	/** 
	 * Enqueue javascripts
	 */
	wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ),'', false);
	wp_enqueue_script('supersubs', get_template_directory_uri() . '/js/supersubs.js', array( 'jquery' ),'', false);
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ),'', false );
	wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ),'', true);
	wp_enqueue_script('tinynav', get_template_directory_uri() . '/js/tinynav.min.js', array( 'jquery' ),'', false);
	wp_enqueue_script('refineslide', get_template_directory_uri() . '/js/jquery.refineslide.js', array( 'jquery' ),'', false);
	wp_enqueue_script('imgLiquid-min', get_template_directory_uri() . '/js/imgLiquid-min.js', array( 'jquery' ),'', false);
	wp_enqueue_script('scrollUp', get_template_directory_uri() . '/js/jquery.scrollUp.min.js', array( 'jquery' ),'', false);
	if ( of_get_option('enable_scrollup') == 1) { wp_enqueue_script('scroll-on', get_template_directory_uri() . '/js/scrollup.js', array( 'jquery' ),'', true); }
}

add_action('wp_enqueue_scripts','apprise_add_script_function');

/** 
 * Register widgetized locations
 */
function apprise_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Main Sidebar', 'apprise' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title clearfix"><h4><span>',
		'after_title' => '</span></h4></div>',
	));

	register_sidebar(array(
		'name' => __( 'Secondary Sidebar', 'apprise' ),
		'id' => 'secondary-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title clearfix"><h4><span>',
		'after_title' => '</span></h4></div>',
	));

	register_sidebar(array(
		'name' =>  __( 'Footer Widget 1', 'apprise' ),
		'id' => 'footer-widget-1',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widget 2', 'apprise' ),
		'id' => 'footer-widget-2',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widget 3', 'apprise' ),
		'id' => 'footer-widget-3',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widget 4', 'apprise' ),
		'id' => 'footer-widget-4',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
}

add_action( 'widgets_init', 'apprise_widgets_init' );


/** 
 * Load function to check if primary menu is set.
 */
function apprise_selectmenu() {
	 	if ( current_user_can('edit_theme_options') ) {
				echo '	<ul id="menu-main-navigation" class="sf-menu sf-js-enabled sf-shadow">
							<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home">
								<a href="'.get_admin_url().'nav-menus.php">'.__("Select a Menu to appear here in Dashboard->Appearance->Menus ", "apprise").'</a>
							</li>
		
						</ul>	';
		} else {
				echo '	<ul id="menu-main-navigation" class="sf-menu sf-js-enabled sf-shadow">
							<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home">
								<a href="'.esc_url( get_home_url() ).'">'.__("Home", "apprise").'</a>
							</li>
		
						</ul>	';			
		}
}

/** 
 * Load function to change excerpt length
 */
function apprise_excerpt_length( $length ) {
	
	if(of_get_option('blog_excerpt') !="") {
		$excrpt = of_get_option('blog_excerpt');
		return $excrpt;
	} else {
		$excrpt = '80';
		return $excrpt;
	}
}
add_filter('excerpt_length', 'apprise_excerpt_length', 999);

/**
 * Displays navigation to next/previous post when applicable.
 */
function apprise_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php __( 'Post navigation', 'apprise' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'apprise' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'apprise' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/** 
 * Displays navigation to next/previous pages
 */
function apprise_paging_nav($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1; 
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }  
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>". __('Page ','apprise') .$paged .__(' of ','apprise'). $pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}

/**
 * Load Comments Support	
*/
function apprise_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php __( 'Pingback:', 'apprise' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'apprise' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta">
				<div class="comment-author vcard">
					<?php echo get_avatar($comment, 35); ?>
				</div><!--comment-author .vcard-->
				<div class="comment-date">
					<span>on</span>	 <?php comment_date('F j, Y'); ?>
				</div>
				<div class="comment-author-name">
					<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
					<?php edit_comment_link( __( 'Edit', 'apprise' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php __( 'Your comment is awaiting moderation.', 'apprise' ); ?></em>
					<br>
				<?php endif; ?>

			</div>

			<div class="comment-content"><?php comment_text(); ?>
			<div>
				<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'apprise' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!--reply-->
			</div>
			</div>

		</div><!--comment-->

	<?php
			break;
	endswitch;
}

/** 
 * Theme Options sidebar
*/
add_action( 'optionsframework_before','apprise_options_support' );

function apprise_options_support() { ?>
	<div id="optionsframework-support">
		<div class="metabox-holder">
			<div class="postbox">
					<div class="inside">
                        <p><b><?php _e(' For theme support and general questions please fill the contact form in the following link: ','apprise') ?> <a target="_blank" href="http://www.vpthemes.com/support/"><?php _e('Contact Form','apprise') ?></a></p>
                        <p><?php  _e('Want to add additional features? ','apprise') ?><a target="_blank" href="http://www.vpthemes.com/apprise/#theme-pricing"><?php  _e(' Upgrade to Pro version.','apprise') ?></a></p>
					</div>
			</div>
		</div>
	</div>
<?php }

/** 
 * Function to display "Content Boxes Section" on home page.
*/
function apprise_content_boxes() { ?>
<div class="content-boxes">
	<div class="col">
		<i class="fa <?php echo of_get_option('first_column_image'); ?>"></i>
		<h4><?php echo of_get_option('first_column_header'); ?></h4>
		<p><?php echo of_get_option('first_column_text'); ?></p>
	</div>
	<div class="col">
		<i class="fa <?php echo of_get_option('second_column_image'); ?>"></i>
		<h4><?php echo of_get_option('second_column_header'); ?></h4>
		<p><?php echo of_get_option('second_column_text'); ?></p>
	</div>
	<div class="col">
		<i class="fa <?php echo of_get_option('third_column_image'); ?>"></i>
		<h4><?php echo of_get_option('third_column_header'); ?></h4>
		<p><?php echo of_get_option('third_column_text'); ?></p>
	</div>
</div>
<?php }

/** 
 * Function to display "About Section" on home page.
*/
function apprise_about_section() { ?>

<div class="about">
	<div>
		<h3 class="boxtitle"><?php echo of_get_option('about_section_header'); ?></h3>
		<p class="text"><?php echo of_get_option('about_section_text'); ?> </p>
	</div>
</div>
<?php }

/** 
 * Function to display image slider in gallery post formats.
*/
function apprise_gallery_post() { 
	global $post;
	$animation_speed=of_get_option('animation_speed');
	$slideshow_speed=of_get_option('slideshow_speed');
	?>
	<div class="flexslider">
		<ul class="slides">	
		<?php
			//Pull gallery images from custom meta
			$gallery_image = get_post_meta($post->ID,'fw_gl_',true);
			if($gallery_image !=  ''){
				foreach ($gallery_image as $arr){
					echo '<li><img src="'.$arr['fw_gallery_post_image']['url'].'" alt="'.$arr['fw_gallery_post_image_title'].'" /></li>';
				}
			}
		?>		
		</ul>
	</div>	
  	<script type="text/javascript">
    	var flex=jQuery.noConflict();
    	flex(window).load(function(){
      	flex('.flexslider').flexslider({
        	animation: 'slide',
        	start: function(slider){
          	flex('body').removeClass('loading');
        	}
      	});
    	});
  	</script>
<?php }