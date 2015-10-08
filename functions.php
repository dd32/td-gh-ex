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

	//greenr_customizer_setup();
}
endif; // greenr_setup
add_action( 'after_setup_theme', 'greenr_setup' );
add_action( 'after_setup_theme', 'greenr_customizer_setup',11 );

if( ! function_exists( 'greenr_customizer_setup' ) ) {
		//echo '<pre>', print_r($greenr), '</pre>';
	function greenr_customizer_setup() {
		if(  empty( get_theme_mods() ) ) {
			global $greenr, $options;
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

/**
 * Defining constants to use through out theme code
 */
require_once get_template_directory() . '/includes/constants.php';

/**
 * Load Theme Options Panel
 */
require get_template_directory() . '/includes/theme-options.php';

/**
 * Include all includes. Genius
 */
require_once GREENR_INCLUDES_DIR. '/all.php';


function greenr_slide_exists() {
	
	for ( $slide = 1; $slide < 6; $slide++) {
		$url = get_theme_mod( 'image_upload-' .$slide );
		if ( $url !== ''  ) {
			return true;
		} 
	}
	
	return false;	
}
