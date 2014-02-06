<?php
/* 	Socialia Theme's Functions
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Socialia 2.0
*/
   
  
  	register_nav_menus( array( 'main-menu' => "Main Menu" ) );


//	Set the content width based on the theme's socialia and stylesheet.
	if ( ! isset( $content_width ) ) $content_width = 584;


// Load the D5 Framework Optios Page
	if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
	}

// 	Tell WordPress for wp_title in order to modify document title content
	function socialia_filter_wp_title( $title ) {
    $site_name = get_bloginfo( 'name' );
    $filtered_title = $site_name . $title;
    return $filtered_title;
	}
	add_filter( 'wp_title', 'socialia_filter_wp_title' );
	
	
// 	Tell WordPress for the Feed Link
	add_editor_style();
	add_theme_support( 'automatic-feed-links' );
	
// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 600, 200, true );
	add_image_size( 'slide-thumb', 1000, 288 ); // default Post Thumbnail dimensions (cropped)
	}
	
		
// 	WordPress 3.4 Custom Background Support	
	$socialia_custom_background = array(
	'default-color'          => 'ECF6FD',
	'default-image'          => get_template_directory_uri() . '/images/background-top.png'
	);
	add_theme_support( 'custom-background', $socialia_custom_background );
	
// 	WordPress 3.4 Custom Header Support				
	$socialia_custom_header = array(
	'default-image'          => get_template_directory_uri() . '/images/logo.png',
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
	add_theme_support( 'custom-header', $socialia_custom_header );


// 	Functions for adding script
	function socialia_enqueue_scripts() {
	wp_enqueue_style('socialia-style', get_stylesheet_uri(), false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
	
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'socialia-menu-style', get_template_directory_uri(). '/js/menu.js' );
	wp_enqueue_style('socialia-gfonts1', '//fonts.googleapis.com/css?family=Marvel:400', false );
	wp_enqueue_script( 'animate-color', get_template_directory_uri() . '/js/jquery.animate-colors-min.js' );
	wp_enqueue_script( 'skitter-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js' );
	wp_enqueue_style ('skitter-style', get_template_directory_uri() . '/css/skitter.styles.css' );
	wp_enqueue_script( 'skitter-main', get_template_directory_uri() . '/js/jquery.skitter.min.js' );
	}
	add_action( 'wp_enqueue_scripts', 'socialia_enqueue_scripts' );



// 	Functions for adding some custom code within the head tag of site
	function socialia_custom_code() {
	
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
	
	add_action('wp_head', 'socialia_custom_code');
	
	function socialia_excerpt_more($more) {
    global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">' . of_get_option('readmore', 'Read More ...') . '</a>';
	}
	add_filter('excerpt_more', 'socialia_excerpt_more');

// Content Type Showing
	function socialia_content() {
	the_content('<span class="read-more">' . of_get_option('readmore', 'Read More ...') . '</span>');
	}

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function socialia_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'socialia_page_menu_args' );


//	Registers the Widgets and Sidebars for the site
	function socialia_widgets_init() {

	register_sidebar( array(
		'name' => 'Primary Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Secondary Sidebar',
		'id' => 'sidebar-2',
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
	add_action( 'widgets_init', 'socialia_widgets_init' );
	
//	Remove WordPress Custom Header Support for the theme socialia
	
//	Remove WordPress Custom Background Support for the theme socialia
	remove_theme_support('custom-background');