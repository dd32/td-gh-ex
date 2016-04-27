<?php
/* 	Design Theme's Functions
	Copyright: 2012-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
*/
   
  
 	require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );
	
	function design_about_page() { 
	add_theme_page( 'Design Options', 'Design Options', 'edit_theme_options', 'theme-about', 'design_theme_about' ); 
	}
	add_action('admin_menu', 'design_about_page');
	function design_theme_about() {  require_once ( trailingslashit(get_template_directory()) . 'inc/theme-about.php' ); } 	


	function design_setup() {	
// 	Tell WordPress for the Feed Link
	add_editor_style();
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "title-tag" );
	
	register_nav_menus( array( 'main-menu' => __('Main Menu', 'd5-design') ) );
	load_theme_textdomain( 'd5-design', get_template_directory() . '/languages' );
//	Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 584;
	
// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 600, 200, true );
	add_image_size( 'slide-thumb', 950, 300 ); // default Post Thumbnail dimensions (cropped)
	}
		
// 	WordPress 3.4 Custom Background Support	
	$design_custom_background = array(
	'default-color'          => 'EDEEEE',
	'default-image'          => '',
	);
	add_theme_support( 'custom-background', $design_custom_background );
	
// 	WordPress 3.4 Custom Header Support				
	$design_custom_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 300,
	'height'                 => 70,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '000000',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback' 		 => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $design_custom_header );
	}
	add_action( 'after_setup_theme', 'design_setup' );

// 	Functions for adding script
	function design_enqueue_scripts() { 
	wp_enqueue_style('design-style', get_stylesheet_uri(), false);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
	
	wp_enqueue_script( 'design-menu-style', get_template_directory_uri(). '/js/menu.js', array( 'jquery' ) );
	wp_register_style('design-gfonts1', '//fonts.googleapis.com/css?family=Marvel:400', false );
	wp_enqueue_style('design-gfonts1');
	}
	add_action( 'wp_enqueue_scripts', 'design_enqueue_scripts' );
	
// 	Functions for adding script to Admin Area
	function design_admin_style() { wp_enqueue_style( 'design_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false ); }
	add_action( 'admin_enqueue_scripts', 'design_admin_style' );

		
// 	Functions for adding some custom code within the head tag of site
	function design_custom_code() {
	if ( esc_url(design_get_option ( 'feat-image' , get_template_directory_uri() . '/images/slide-image/thumb-back.jpg')) != '' ) : 
	echo '<style>#container .thumb { background: url("' . esc_url(design_get_option ( 'feat-image' , get_template_directory_uri() . '/images/thumb-back.jpg')) . '") no-repeat scroll 0 0 #CCCCCC; }</style>' ;
	endif;
	}	
	add_action('wp_head', 'design_custom_code');


//	function tied to the excerpt_more filter hook.
	function design_excerpt_length( $length ) {
	global $dExcerptLength;
	if ($dExcerptLength) {
    return $dExcerptLength;
	} else {
    return 50; //default value
    } }
	add_filter( 'excerpt_length', 'design_excerpt_length', 999 );
	
	function design_excerpt_more($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">Read the Rest...</a>';
	}
	add_filter('excerpt_more', 'design_excerpt_more');

// Content Type Showing
	function design_content() { the_content('<span class="read-more">Read More...</span>'); }

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function design_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'design_page_menu_args' );
	
	function design_credit() {
		echo '&nbsp;| Design Theme by: <a href="'. esc_url('http://d5creation.com').'" target="_blank"><img  src="' . get_template_directory_uri() . '/images/d5logofooter.png" /> D5 Creation</a> | Powered by: <a href="http://wordpress.org" target="_blank">WordPress</a>';
	}

//	Registers the Widgets and Sidebars for the site
	function design_widgets_init() {

	register_sidebar( array(
		'name' => __('Primary Sidebar','d5-design'), 
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	 
	register_sidebar( array(
		'name' => __('Footer Area One', 'd5-design'),
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	    
	register_sidebar( array(
		'name' => __('Footer Area Two', 'd5-design'),
		'id' => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area Three','d5-design'),
		'id' => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' =>  __('Footer Area Four', 'd5-design'),
		'id' => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	}
	add_action( 'widgets_init', 'design_widgets_init' );

	add_filter('the_title', 'design_title');
	function design_title($title) {
        if ( '' == $title ) {
            return '(Untitled)';
        } else {
            return $title;
        }
    }
	
	function design_breadcrumbs() {  }
//	Remove WordPress Custom Header Support for the theme design
//	remove_theme_support('custom-header');