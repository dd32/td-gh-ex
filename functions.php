<?php
/* 	Smartia Theme's Functions
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/
   
  
  	register_nav_menus( array( 'main-menu' => "Main Menu" ) );


//	Set the content width based on the theme's smartia and stylesheet.
	if ( ! isset( $content_width ) ) $content_width = 584;

// Load the D5 Framework Optios Page
	if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
	}

// 	Tell WordPress for wp_title in order to modify document title content
	function smartia_filter_wp_title( $title ) {
    $site_name = get_bloginfo( 'name' );
    $filtered_title = $site_name . $title;
    return $filtered_title;
	}
	add_filter( 'wp_title', 'smartia_filter_wp_title' );
	
	
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
	$smartia_custom_background = array(
	'default-color'          => 'FFFFFF',
	'default-image'          => get_template_directory_uri() . '/images/background.png'
	);
	add_theme_support( 'custom-background', $smartia_custom_background );
	
// 	WordPress 3.4 Custom Header Support				
	$smartia_custom_header = array(
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
	add_theme_support( 'custom-header', $smartia_custom_header );


// 	Functions for adding script
	function smartia_enqueue_scripts() {
	wp_enqueue_style('smartia-style', get_stylesheet_uri(), false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
	
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'smartia-menu-style', get_template_directory_uri(). '/js/menu.js' );
	wp_register_style('smartia-gfonts1', '//fonts.googleapis.com/css?family=Carrois+Gothic', false );
	wp_enqueue_style('smartia-gfonts1');
	wp_enqueue_script( 'skitter-main', get_template_directory_uri() . '/js/jquery.skitter.min.js' );
	wp_enqueue_script( 'animate-color', get_template_directory_uri() . '/js/jquery.animate-colors-min.js' );
	wp_enqueue_script( 'skitter-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js');
	wp_enqueue_style ('skitter-style', get_template_directory_uri() . '/css/skitter.styles.css');


	
	}
	add_action( 'wp_enqueue_scripts', 'smartia_enqueue_scripts' );



// 	Functions for adding some custom code within the head tag of site
	function smartia_custom_code() {
	
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
	
	add_action('wp_head', 'smartia_custom_code');
	
//	function tied to the excerpt_more filter hook.
	function smartia_excerpt_length( $length ) {
	global $blExcerptLength;
	if ($blExcerptLength) {
    return $blExcerptLength;
	} else {
    return 50; //default value
    } }
	add_filter( 'excerpt_length', 'smartia_excerpt_length', 999 );
	
	function smartia_excerpt_more($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">' . of_get_option('readmore', 'Read More ...') . '</a>';
	}
	add_filter('excerpt_more', 'smartia_excerpt_more');

// Content Type Showing
	function smartia_content() {
	the_content('<span class="read-more">' . of_get_option('readmore', 'Read More ...') . '</span>');
	}

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function smartia_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'smartia_page_menu_args' );


//	Registers the Widgets and Sidebars for the site
	function smartia_widgets_init() {

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
	add_action( 'widgets_init', 'smartia_widgets_init' );
	
	add_filter('the_title', 'smartia_title');
	function smartia_title($title) {
        if ( '' == $title ) {
            return '(Untitled)';
        } else {
            return $title;
        }
    }
	
//	Remove WordPress Custom Header Support for the theme smartia
	remove_theme_support('custom-header');
	
//	Remove WordPress Custom Background Support for the theme smartia
//	remove_theme_support('custom-background');