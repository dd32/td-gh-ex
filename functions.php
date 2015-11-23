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
		add_image_size( 'rpgallery', 250, 200, true );

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
require_once BOXY_INCLUDES_DIR. '/all.php';

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