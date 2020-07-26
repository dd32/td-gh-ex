<?php
/* 	GREEN EYE Theme's Functions
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since GREEN 1.0
*/

	require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );
	
	function green_about_page() { 	
	add_theme_page( esc_html__('GREEN EYE Options','green-eye'), esc_html__('GREEN EYE Options','green-eye'), 'edit_theme_options', 'theme-about', 'green_theme_about' ); 
	}
	add_action('admin_menu', 'green_about_page');
	function green_theme_about() {  require_once ( trailingslashit(get_template_directory()) . 'inc/theme-about.php' ); }
	
	function green_setup() {
	load_theme_textdomain( 'green-eye', get_template_directory() . '/languages' );	
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 600;
	add_theme_support( "title-tag" );	
	
// 	Tell WordPress for the Feed Link
	add_theme_support( 'automatic-feed-links' );
	add_editor_style();
	register_nav_menus( array( 'main-menu' => esc_html__('Main Menu', 'green-eye') ) );
		
// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

	// additional image sizes
	// delete the next line if you do not need additional image sizes
	add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
		
		
// 	WordPress 3.4 Custom Background Support	
	$green_custom_background = array( 'default-color' => '013410', );
	add_theme_support( 'custom-background', $green_custom_background );
	
// 	WordPress 3.4 Custom Header Support				
	$green_custom_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 300,
	'height'                 => 90,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '000000',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback' 		 => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $green_custom_header );
	
	}
	add_action( 'after_setup_theme', 'green_setup' );

// 	Functions for adding script
	function green_enqueue_scripts() { 
	wp_enqueue_style('green-style', get_stylesheet_uri(), false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
	wp_register_style('green-gfonts', '//fonts.googleapis.com/css?family=PT+Sans', false );
	wp_register_style('green-gfonts1', '//fonts.googleapis.com/css?family=Open+Sans+Condensed:300', false );
	
	wp_enqueue_style('green-gfonts');
	wp_enqueue_style('green-gfonts1');
	
	// Load the html5 shiv.
	wp_enqueue_script( 'green-html5', get_template_directory_uri() . '/js/html5.js', array() );
	wp_script_add_data( 'green-html5', 'conditional', 'lt IE 9' );
		
	if (is_front_page()):
	wp_enqueue_script( 'green-menu-style', get_template_directory_uri(). '/js/menu.js' );
	wp_enqueue_style( 'green-slide-style', get_template_directory_uri(). '/css/style_ie.css', false );
	endif;
	if ( green_get_option('responsive', '0') == '1' ) : wp_enqueue_style('green-responsive', get_template_directory_uri(). '/style-responsive.css' ); endif;
	}
	add_action( 'wp_enqueue_scripts', 'green_enqueue_scripts' );
	
// 	Functions for adding script to Admin Area
	function green_admin_style() { wp_enqueue_style( 'green_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false ); }
	add_action( 'admin_enqueue_scripts', 'green_admin_style' );
	
//Multi-level pages menu  
	function green_page_menu() {
	echo '<ul class="m-menu">'; wp_list_pages(array('sort_column'  => 'menu_order, post_title', 'title_li'  => '' )); echo '</ul>';
}

//	function tied to the excerpt_more filter hook.
	function green_excerpt_length( $length ) {
	global $blExcerptLength;
	if ($blExcerptLength) {
    return $blExcerptLength;
	} else {
    return 50; //default value
    } }
	add_filter( 'excerpt_length', 'green_excerpt_length', 999 );
	
	function green_excerpt_more($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">'. esc_html__('Read More ...','green-eye') . '</a>';
	}
	add_filter('excerpt_more', 'green_excerpt_more');
	
	// Content Type Showing
	function green_content() { the_content('<span class="read-more">'.esc_html__('Read More ...','green-eye').'</span>'); }
	function green_creditline() { echo '<span class="credit">| GREEN EYE Theme by: <a href="'.esc_url('https://d5creation.com').'" target="_blank"> D5 Creation</a> | Powered by: <a href="http://wordpress.org" target="_blank">WordPress</a></span>'; }


//	Registers the Widgets and Sidebars for the site
function green_widgets_init() {

	register_sidebar( array(
		'name' => esc_html__('Primary Sidebar','green-eye'), 
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' =>  esc_html__('Secondary Sidebar', 'green-eye'),
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	 
	register_sidebar( array(
		'name' => esc_html__('Footer Area One', 'green-eye'),
		'id' => 'sidebar-3',
		'description' => esc_html__('An optional widget area for your site footer', 'green-eye'), 
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	    
	register_sidebar( array(
		'name' => esc_html__('Footer Area Two', 'green-eye'),
		'id' => 'sidebar-4',
		'description' => esc_html__('An optional widget area for your site footer', 'green-eye'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__('Footer Area Three','green-eye'),
		'id' => 'sidebar-5',
		'description' => esc_html__('An optional widget area for your site footer', 'green-eye'), 
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' =>  esc_html__('Footer Area Four', 'green-eye'),
		'id' => 'sidebar-6',
		'description' =>  esc_html__('An optional widget area for your site footer', 'green-eye'), 
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	}
	add_action( 'widgets_init', 'green_widgets_init' );
	
	
	
	add_filter('the_title', 'green_title');
	function green_title($title) {
        if ( '' == $title ) {
            return esc_html__('(Untitled)','green-eye');
        } else {
            return $title;
        }
    }
	
//	Remove WordPress Custom Header Support for the theme green
//	remove_theme_support('custom-header');