<?php
/* 	Socialia Theme's Functions
	Copyright: 2012-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Socialia 2.0
*/
   
  
  	

function d5socialia_setup() {
	register_nav_menus( array( 'main-menu' => __('Main Menu','d5-socialia' ) ) );
//	Set the content width based on the theme's socialia and stylesheet.
	load_theme_textdomain( 'd5-socialia', get_template_directory() . '/languages' );	
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 600;


// Load the D5 Framework Optios Page
	require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );
	
	function d5socialia_about_page() { 
	add_theme_page( 'D5 Creation Themes', 'D5 Creation Themes', 'edit_theme_options', 'd5-themes', 'd5socialia_d5_themes' );
	add_theme_page( 'Socialia Options', 'Socialia Options', 'edit_theme_options', 'theme-about', 'd5socialia_theme_about' ); 
	}
	add_action('admin_menu', 'd5socialia_about_page');
	function d5socialia_d5_themes() {  require_once ( trailingslashit(get_template_directory()) . 'inc/d5-themes.php' ); }
	function d5socialia_theme_about() {  require_once ( trailingslashit(get_template_directory()) . 'inc/theme-about.php' ); }


	add_theme_support( "title-tag" );
	
// 	Tell WordPress for the Feed Link
	add_editor_style();
	add_theme_support( 'automatic-feed-links' );
	
// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 600, 200, true );
	}
	
		
// 	WordPress 3.4 Custom Background Support	
	$d5socialia_custom_background = array(
	'default-color'          => 'ECF6FD'
	);
	add_theme_support( 'custom-background', $d5socialia_custom_background );
	
// 	WordPress 3.4 Custom Header Support				
	$d5socialia_custom_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 300,
	'height'                 => 90,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '000000',
	'header-text'            => false,
	'uploads'                => false,
	'wp-head-callback' 		 => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-header', $d5socialia_custom_header );
	}
	add_action( 'after_setup_theme', 'd5socialia_setup' );


// 	Functions for adding script
	function socialia_enqueue_scripts() {
	wp_enqueue_style('d5socialia-style', get_stylesheet_uri(), false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {  wp_enqueue_script( 'comment-reply' ); }
	
	wp_enqueue_script( 'd5socialia-menu-style', get_template_directory_uri(). '/js/menu.js', array( 'jquery' ) );
	wp_enqueue_style('d5socialia-gfonts1', '//fonts.googleapis.com/css?family=Marvel:400', false );
	wp_enqueue_style ('d5socialia_skitter-style', get_template_directory_uri() . '/css/skitter.styles.css' );
	wp_enqueue_script( 'd5socialia_skitter-main', get_template_directory_uri() . '/js/jquery.skitter.js', array( 'jquery', 'jquery-effects-core' ) );
	}
	add_action( 'wp_enqueue_scripts', 'socialia_enqueue_scripts' );

// 	Functions for adding script to Admin Area
	function d5socialia_admin_style() { wp_enqueue_style( 'd5socialia_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false ); }
	add_action( 'admin_enqueue_scripts', 'd5socialia_admin_style' );


// 	Functions for adding some custom code within the head tag of site
	function d5socialia_custom_code() {
	
?>
	
	<style type="text/css">
	.site-title a, 
	.site-title a:active, 
	.site-title a:hover {
	color: #<?php echo get_header_textcolor(); ?>;
	}
	</style>
	<?php 
	}
	
	add_action('wp_head', 'd5socialia_custom_code');
	
	function d5socialia_excerpt_more($more) {
    global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">' . __('Read More ...','d5-socialia') . '</a>';
	}
	add_filter('excerpt_more', 'd5socialia_excerpt_more');

// Content Type Showing
	function d5socialia_content() {
	the_content('<span class="read-more">' . __('Read More ...','d5-socialia') . '</span>');
	}

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function d5socialia_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'd5socialia_page_menu_args' );


//	Registers the Widgets and Sidebars for the site
	function d5socialia_widgets_init() {

	register_sidebar( array(
		'name' => __('Primary Sidebar','d5-socialia'),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Secondary Sidebar','d5-socialia'),
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area One','d5-socialia'),
		'id' => 'sidebar-3',
		'description' => __('An optional widget area for your site footer','d5-socialia'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area Two','d5-socialia'),
		'id' => 'sidebar-4',
		'description' => __('An optional widget area for your site footer','d5-socialia'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area Three','d5-socialia'),
		'id' => 'sidebar-5',
		'description' => __('An optional widget area for your site footer','d5-socialia'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __('Footer Area Four','d5-socialia'),
		'id' => 'sidebar-6',
		'description' => __('An optional widget area for your site footer','d5-socialia'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	}
	add_action( 'widgets_init', 'd5socialia_widgets_init' );
	

	
	
	
	
