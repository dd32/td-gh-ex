<?php
/**
 * Greenr functions and definitions
 *
 * @package Greenr
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 870; /* pixels */
}

if ( ! function_exists( 'greenr_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function greenr_setup() {          

	// Makes theme translation ready
	load_theme_textdomain( 'greenr', GREENR_LANGUAGES_DIR );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 250, 250, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'greenr' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'greenr_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add title-tag support
	add_theme_support( 'title-tag' );

		/*
		 * Add Additional image sizes
		 *
		 */
		add_image_size( 'greenr-blog-full-width', 1200,350, true );
		add_image_size( 'greenr-small-featured-image-width', 450,300, true );
		add_image_size( 'greenr-blog-large-width', 800,300, true );

	//greenr_customizer_setup();
}
endif; // greenr_setup
add_action( 'after_setup_theme', 'greenr_setup' );
add_action( 'after_setup_theme', 'greenr_customizer_setup',11 );

if( ! function_exists( 'greenr_customizer_setup' ) ) {
		//echo '<pre>', print_r($greenr), '</pre>';
	function greenr_customizer_setup() {
		if(  count( get_theme_mods() ) <= 1 ) {
			global $options;
			$greenr = get_option('greenr');
			foreach($options['panels']['theme_options']['sections'] as $section) {
				foreach( $section['fields'] as $name => $settings ) {
					//echo 'Name: ' . $name . '<br>' . 'Value: ' . $greenr[$name] . '<br>';
					if( ! get_theme_mod( $name ) && isset( $greenr[$name] ) ) {
						if( is_array( $greenr[$name] ) ) {
							set_theme_mod( $name, $greenr[$name]['url'] );
						} else {
							set_theme_mod( $name, $greenr[$name] );
						}
					}
				}		
			}

		 	foreach($options['panels']['home']['sections'] as $section) {
				foreach( $section['fields'] as $name => $settings ) {
					if( ! get_theme_mod( $name ) && isset( $greenr[$name] ) ) {
								if( is_array($greenr[$name]) ) {
									set_theme_mod( $name, $greenr[$name]['url'] );
								} 
								else {
									set_theme_mod( $name, $greenr[$name] );
								}
					}
			
					if ( isset ( $greenr['slides'] ) ) {		
						$slide_count = 1;
						foreach($greenr['slides'] as $slide) {
							if( ! get_theme_mod( 'image_upload-' . $slide_count ) && isset( $slide['image'] ) ) {
								set_theme_mod( 'image_upload-' . $slide_count, $slide['image']);
							}
							if( ! get_theme_mod( 'flexcaption-' . $slide_count ) && isset( $slide['description'] ) ) {
								set_theme_mod( 'flexcaption-' . $slide_count, $slide['description']);
							}
							$slide_count++;
						}
					}
				}
			}	
		}
	}
}


	/* Defining directory PATH Constants */
	define( 'GREENR_PARENT_DIR', get_template_directory() );
	define( 'GREENR_CHILD_DIR', get_stylesheet_directory() );
	define( 'GREENR_INCLUDES_DIR', GREENR_PARENT_DIR. '/includes' );

	/** Defining URL Constants */
	define( 'GREENR_PARENT_URL', get_template_directory_uri() );
	define( 'GREENR_CHILD_URL', get_stylesheet_directory_uri() );
	define( 'GREENR_INCLUDES_URL', GREENR_PARENT_URL . '/includes' );

	/* 
	Check for language directory setup in Child Theme
	If not present, use parent theme's languages dir
	*/
	if ( ! defined( 'GREENR_LANGUAGES_URL' ) ) /** So we can predefine to child theme */
		define( 'GREENR_LANGUAGES_URL', GREENR_PARENT_URL . '/languages' );

	if ( ! defined( 'GREENR_LANGUAGES_DIR' ) ) /** So we can predefine to child theme */
		define( 'GREENR_LANGUAGES_DIR', GREENR_PARENT_DIR . '/languages' );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function greenr_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'greenr' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'greenr' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'greenr' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'greenr' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'greenr' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
   register_sidebar( array(
		'name'          => __( 'Footer Nav', 'greenr' ),
		'id'            => 'footer-nav',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'greenr_widgets_init' );

/**
 * Load Theme Options Panel
 */
require get_template_directory() . '/includes/theme-options.php';

/**
 * Enqueue Scripts and Styles
 */
require_once GREENR_INCLUDES_DIR . '/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require GREENR_INCLUDES_DIR . '/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require GREENR_INCLUDES_DIR . '/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require GREENR_INCLUDES_DIR . '/extras.php';

/**
 * Customizer
 */
require GREENR_INCLUDES_DIR . '/customizer.php';


/**
 * JigoShop Support
 */
require_once( GREENR_INCLUDES_DIR . '/jigoshop.php' );


function greenr_slide_exists() {
	
	for ( $slide = 1; $slide < 6; $slide++) {
		$url = get_theme_mod( 'image_upload-' .$slide );   
		$caption = get_theme_mod( 'flexcaption-' .$slide );  
		if ( $url || $caption ) {
			return true;
		} 
	}
	
	return false;	
}


