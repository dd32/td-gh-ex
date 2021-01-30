<?php
/* 	Easy Theme's Functions
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Easy 1.0
*/
   
  	// Load the D5 Optios Page
	require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );	
	function easy_about_page() { 
	add_theme_page( 'Easy Options', 'Easy Options', 'edit_theme_options', 'theme-about', 'easy_theme_about' ); 
	}
	add_action('admin_menu', 'easy_about_page');
	function easy_theme_about() {  require_once ( trailingslashit(get_template_directory()) . 'inc/theme-about.php' ); }
	function easy_ppp() { return ( 'post_type=post&&posts_per_page=3&&ignore_sticky_posts=1' );} 	

	function easy_setup() {
	load_theme_textdomain( 'easy', get_template_directory() . '/languages' );
//	Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 650;
	add_theme_support( 'automatic-feed-links' );
  	register_nav_menus( array( 'main-menu' => "Main Menu", 'footer-menu' => "Footer Menu" ) );
	
	add_editor_style('editor-style.css');

// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

	add_theme_support( "title-tag" );
	
	// additional image sizes
	// delete the next line if you do not need additional image sizes
	add_image_size( 'category-thumb', 1100, 513 ); //300 pixels wide (and unlimited height)
	add_image_size( 'slide-thumb', 1500, 700 ); //for featured sliders
		
// 	WordPress 3.4 Custom Background Support	
//	add_theme_support( 'custom-background');
	
// 	WordPress 3.4 Custom Header Support				
	$easy_custom_header = array(
	'default-image'          => get_template_directory_uri() . '/images/logo.png',
	'random-default'         => false,
	'width'                  => 300,
	'height'                 => 50,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '000000',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback' 		 => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $easy_custom_header ); }
	add_action( 'after_setup_theme', 'easy_setup' );

// 	Functions for adding script
	function easy_enqueue_scripts() {
	wp_enqueue_style('easy-style', get_stylesheet_uri(), false); 
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
	
	wp_enqueue_script( 'easy-menu-style-js', get_template_directory_uri(). '/js/menu.js', array( 'jquery' ) );
	wp_enqueue_style('easy-gfonts', '//fonts.googleapis.com/css?family=Economica', false );
	
	wp_enqueue_script( 'easy-html5', get_template_directory_uri().'/js/html5.js'); 
    wp_script_add_data( 'easy-html5', 'conditional', 'lt IE 9' );
    
	if (is_front_page()): wp_enqueue_script( 'easy-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ) ); endif;
	if ( esc_html(easy_get_option('responsive', '1')) == '1' ) : wp_enqueue_style('easy-responsive', get_template_directory_uri(). '/style-responsive.css' ); endif;
	
	}
	add_action( 'wp_enqueue_scripts', 'easy_enqueue_scripts' );

// 	Functions for adding script to Admin Area
	function easy_admin_style() { wp_enqueue_style( 'easy_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false ); }
	add_action( 'admin_enqueue_scripts', 'easy_admin_style' );

//Multi-level pages menu  
function easy_page_menu() { echo '<ul class="m-menu">'; wp_list_pages(array('sort_column'  => 'menu_order, post_title', 'title_li'  => '' )); echo '</ul>'; }


//	function tied to the excerpt_more filter hook.
	function easy_excerpt_length( $length ) {
	global $EasyExcerptLength;
	if ($EasyExcerptLength) {
    return $EasyExcerptLength;
	} else {
    return 75; //default value
    } }
	add_filter( 'excerpt_length', 'easy_excerpt_length', 999 );
	
	function easy_excerpt_more($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">'.esc_html__('Learn More', 'easy').'</a>';
	}
	add_filter('excerpt_more', 'easy_excerpt_more');
	
// Content Type Showing
	function easy_content() { if (( esc_html(easy_get_option('contype', '2')) != '2' ) || is_page() || is_single() ) : the_content('<span class="read-more">'.esc_html__('Learn More', 'easy').'</span>');
	else: the_excerpt();
	endif; }

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function easy_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'easy_page_menu_args' );


//	Registers the Widgets and Sidebars for the site
	function easy_widgets_init() {

	
	register_sidebar( array(
		'name' => 'Main Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	
	register_sidebar( array(
		'name' => 'Footer Area One',
		'id' => 'sidebar-3',
		'description' => 'An optional widget area for your site footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area Two',
		'id' => 'sidebar-4',
		'description' => 'An optional widget area for your site footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area Three',
		'id' => 'sidebar-5',
		'description' => 'An optional widget area for your site footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => 'Footer Area Four',
		'id' => 'sidebar-6',
		'description' => 'An optional widget area for your site footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
		
	}
	add_action( 'widgets_init', 'easy_widgets_init' );
	
		
// 	When the post has no post title, but is required to link to the single-page post view.
	add_filter('the_title', 'easy_title');
	function easy_title($title) {
        if ( '' == $title ) {
            return '(Untitled)';
        } else { return $title; } 
    }

	add_filter( 'wp_nav_menu_objects', 'easy_add_menu_parent_class' );
function easy_add_menu_parent_class( $easyitems ) {
	
	$easyparents = array();
	foreach ( $easyitems as $easyitem ) {
		if ( $easyitem->menu_item_parent && $easyitem->menu_item_parent > 0 ) {
			$easyparents[] = $easyitem->menu_item_parent;
		}
	}
	
	foreach ( $easyitems as $easyitem ) {
		if ( in_array( $easyitem->ID, $easyparents ) ) {
			$easyitem->classes[] = 'menu-parent-item'; 
		}
	}
	
	return $easyitems;    
}

//	Remove WordPress Custom Header Support for the theme easy
//	remove_theme_support('custom-header');