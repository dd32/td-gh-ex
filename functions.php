<?php
/**
 * BOXY functions and definitions
 *
 * @package BOXY
 * @subpackage boxy
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 870; /* pixels */
}

if ( ! function_exists( 'boxy_setup' ) ) :   
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function boxy_setup() {         

		// Makes theme translation ready
		load_theme_textdomain( 'boxy', BOXY_LANGUAGES_DIR );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'boxy-rpgallery', 250, 200, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
				'primary' => __( 'Primary Menu', 'boxy' ),
			) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'boxy_custom_background_args', array(
					'default-color' => 'ffffff',
					'default-image' => '',
				) ) );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

		// Add theme support for Semantic Markup
		$markup = array( 'search-form', 'comment-form', 'comment-list', );
		add_theme_support( 'html5', $markup );

		// Add theme support for title tag
		add_theme_support( 'title-tag' );

		/*
		 * Add Additional image sizes
		 *
		 */
		add_image_size( 'boxy-blog-full-width', 1200,350, true );
		add_image_size( 'boxy-small-featured-image-width', 450,300, true );
		add_image_size( 'boxy-blog-large-width', 800,300, true );
	}
endif; // boxy_setup
add_action( 'after_setup_theme', 'boxy_setup' );
add_action( 'after_setup_theme', 'boxy_customizer_setup',11 );

if( ! function_exists( 'boxy_customizer_setup' ) ) {
		//echo '<pre>', print_r($boxy), '</pre>';
	function boxy_customizer_setup() {
		if(  count( get_theme_mods() ) <= 1 ) {
			global $options;
			$boxy = get_option('boxy');
			foreach($options['panels']['theme_options']['sections'] as $section) {
				foreach( $section['fields'] as $name => $settings ) {
					//echo 'Name: ' . $name . '<br>' . 'Value: ' . $boxy[$name] . '<br>';
					if( ! get_theme_mod( $name ) && isset( $boxy[$name] ) ) {
						if( is_array( $boxy[$name] ) ) {
							set_theme_mod( $name, $boxy[$name]['url'] );
						} else {
							set_theme_mod( $name, $boxy[$name] );
						}
					}
				}		
			}

		 	foreach($options['panels']['home']['sections'] as $section) {
				foreach( $section['fields'] as $name => $settings ) {
					if( ! get_theme_mod( $name ) && isset( $boxy[$name] ) ) {
								if( is_array($boxy[$name]) ) {
									set_theme_mod( $name, $boxy[$name]['url'] );
								} 
								else {
									set_theme_mod( $name, $boxy[$name] );
								}
					}
			
					if ( isset ( $boxy['slides'] ) ) {		
						$slide_count = 1;
						foreach($boxy['slides'] as $slide) {
							if( ! get_theme_mod( 'image_upload-' . $slide_count ) && isset( $slide['image'] ) ) {
								set_theme_mod( 'image_upload-' . $slide_count, $slide['image']);
							}
							if( ! get_theme_mod( 'flexcaption-' . $slide_count ) && isset( $slide['description'] ) ) {
								set_theme_mod( 'flexcaption-' . $slide_count, $slide['description']);
							}
							$slide_count++;
						}
					}
					if ( isset ( $boxy['clients'] ) ) {
						$slide_count = 1;
						foreach($boxy['clients'] as $slide) {
							if( ! get_theme_mod( 'client_image-' . $slide_count ) && isset( $slide['image'] ) ) {
								set_theme_mod( 'client_image-' . $slide_count, $slide['image']);  
							}
							$slide_count++;
						}
					}
				}
			}	
		}
	}
}

// constant //

/* Defining directory PATH Constants */
define( 'BOXY_PARENT_DIR', get_template_directory() );
define( 'BOXY_CHILD_DIR', get_stylesheet_directory() );
define( 'BOXY_INCLUDES_DIR', BOXY_PARENT_DIR. '/includes' );

/** Defining URL Constants */
define( 'BOXY_PARENT_URL', get_template_directory_uri() );
define( 'BOXY_CHILD_URL', get_stylesheet_directory_uri() );
define( 'BOXY_INCLUDES_URL', BOXY_PARENT_URL . '/includes' );

/*
	Check for language directory setup in Child Theme
	If not present, use parent theme's languages dir
	*/
if ( ! defined( 'BOXY_LANGUAGES_URL' ) ) /** So we can predefine to child theme */
	define( 'BOXY_LANGUAGES_URL', BOXY_PARENT_URL . '/languages' );

if ( ! defined( 'BOXY_LANGUAGES_DIR' ) ) /** So we can predefine to child theme */
	define( 'BOXY_LANGUAGES_DIR', BOXY_PARENT_DIR . '/languages' );


/**
 * Register widgetized area and update sidebar with default widgets.
 */
function boxy_widgets_init() {
	register_sidebar( array(
			'name'          => __( 'Sidebar', 'boxy' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	register_sidebar( array(
		'name'          => __( 'Header Top Right', 'boxy' ),
		'id'            => 'header-top-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


	register_sidebar( array(
			'name'          => __( 'Footer 1', 'boxy' ),
			'id'            => 'footer-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	register_sidebar( array(
			'name'          => __( 'Footer 2', 'boxy' ),
			'id'            => 'footer-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	register_sidebar( array(
			'name'          => __( 'Footer 3', 'boxy' ),
			'id'            => 'footer-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	register_sidebar( array(
			'name'          => __( 'Footer 4', 'boxy' ),
			'id'            => 'footer-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

   register_sidebar( array(
		'name'          => __( 'Footer Nav', 'boxy' ),
		'id'            => 'footer-nav',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'boxy_widgets_init' );


// all //

/**
 * Load Theme Options Panel
 */
require BOXY_INCLUDES_DIR . '/theme-options.php';

/**
 * Customizer additions.
 */
require BOXY_INCLUDES_DIR . '/customizer.php';


/**
 * Enqueue Scripts and Styles
 */
require_once BOXY_INCLUDES_DIR . '/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require BOXY_INCLUDES_DIR . '/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require BOXY_INCLUDES_DIR . '/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require BOXY_INCLUDES_DIR . '/extras.php';

/**
 * Load Jigoshop Support
 */
require_once BOXY_INCLUDES_DIR . '/jigoshop.php';

/**
 * Load Jetpack compatibility file.
 */
require BOXY_INCLUDES_DIR. '/jetpack.php';




function boxy_slide_exists() {
	
	for ( $slide = 1; $slide < 6; $slide++) {
		$url = get_theme_mod( 'image_upload-' .$slide );
		if ( $url ) {
			return true;
		} 
	}    
	
	return false;	
}

function boxy_client_exists() {
	
	for ( $slide = 1; $slide < 7; $slide++) {
		$url = get_theme_mod( 'client_image-' .$slide );
		if ( $url ) {
			return true;
		} 
	}    
	
	return false;	
}


/* Woocommerce support */

add_theme_support('woocommerce');

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content', 'boxy_output_content_wrapper');

function boxy_output_content_wrapper() {
	echo '<div class="container"><div class="row"><div id="primary" class="content-area eleven columns">';
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
add_action( 'woocommerce_after_main_content', 'boxy_output_content_wrapper_end' );

function boxy_output_content_wrapper_end () {
	echo "</div>";
}

add_action( 'init', 'boxy_remove_wc_breadcrumbs' );
function boxy_remove_wc_breadcrumbs() {
   	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

add_action('admin_notices','wbls_try_free');
function wbls_try_free() {
	printf( __('<div class="notice notice-warning is-dismissible"><p>Try <a href="%1$s">Boxy Pro Version </a> for Free</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>','boxy'),esc_url('http://www.webulousthemes.com/request-free-trial-for-themes/') );
}