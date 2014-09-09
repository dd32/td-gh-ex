<?php
/* 	COLORFUL Theme's Functions
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	
	Since COLORFUL 1.0
*/
   
 // Tell WordPress for wp_title in order to modify document title content
	function colorful_filter_wp_title( $title ) {
    $site_name = get_bloginfo( 'name' );
    $filtered_title = $site_name . $title;
    return $filtered_title;
	}
	add_filter( 'wp_title', 'colorful_filter_wp_title' );
	

	function colorful_setup() {
//	Theme TextDomain for the Language File
	load_theme_textdomain( 'colorful', get_template_directory() . '/languages' );

// 	Theme Menus
	register_nav_menus( array( 'main-menu' => 'Main Menu' ) );
	add_theme_support( 'automatic-feed-links' );

//	Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 584;


// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

	// additional image sizes
	// delete the next line if you do not need additional image sizes
	add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	}
	
	add_editor_style(); }
	
	add_action( 'after_setup_theme', 'colorful_setup' );
		
// 	Functions for adding script
	function colorful_enqueue_scripts() {
	wp_enqueue_style('colorful-style', get_stylesheet_uri(), false, '1.5');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'colorful-menu-style', get_template_directory_uri(). '/js/menu.js' );
	wp_enqueue_style('colorful-gfonts', '//fonts.googleapis.com/css?family=Creepster', false );
	
	}
	add_action( 'wp_enqueue_scripts', 'colorful_enqueue_scripts' );

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function colorful_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'colorful_page_menu_args' );


//	Registers the Widgets and Sidebars for the site
	function colorful_widgets_init() {

	register_sidebar( array(
		'name' =>  'Primary Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' =>  'Secondary Sidebar',
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' =>  'Footer Area',
		'id' => 'sidebar-3',
		'description' =>  'An optional widget area for your site footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
	add_action( 'widgets_init', 'colorful_widgets_init' );


// 	When the post has no post title, but is required to link to the single-page post view.

	add_filter('the_title', 'colorful_title');
	function colorful_title($title) {
        if ( '' == $title ) {
            return '(Untitled)';
        } else {
            return $title;
        }
    }