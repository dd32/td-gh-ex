<?php

/*==================================== THEME SETUP ====================================*/

// Load default style.css and Javascripts
add_action('wp_enqueue_scripts', 'rubine_enqueue_scripts');

function rubine_enqueue_scripts() {

	// Register and Enqueue Stylesheet
	wp_enqueue_style('rubine-lite-stylesheet', get_stylesheet_uri());
	
	// Register Genericons
	wp_enqueue_style('rubine-lite-genericons', get_template_directory_uri() . '/css/genericons/genericons.css');

	// Register and enqueue navigation.js
	wp_enqueue_script('rubine-lite-jquery-navigation', get_template_directory_uri() .'/js/navigation.js', array('jquery'));
	
	// Passing Parameters to Navigation.js Javascript
	wp_localize_script( 'rubine-lite-jquery-navigation', 'rubine_navigation_params', array( 'menuTitle' => esc_html__( 'Menu', 'rubine-lite' ) ) );
	
	// Register Comment Reply Script for Threaded Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register and Enqueue Font
	wp_enqueue_style('rubine-lite-default-fonts', rubine_fonts_url(), array(), null );

}


/*
* Retrieve Font URL to register default Google Fonts
* Source: http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
*/
function rubine_fonts_url() {
    $fonts_url = '';

	// Get Theme Options from Database
	$theme_options = rubine_theme_options();
	
	// Only embed Google Fonts if not deactivated
	if ( ! ( isset($theme_options['deactivate_google_fonts']) and $theme_options['deactivate_google_fonts'] == true ) ) :
		
		// Set Default Fonts
		$font_families = array('Carme:400,700', 'Francois One');
		 
		// Set Google Font Query Args
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		
		// Create Fonts URL
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		
	endif;
	
	return apply_filters( 'rubine_google_fonts_url', $fonts_url );
	
}


// Setup Function: Registers support for various WordPress features
add_action( 'after_setup_theme', 'rubine_setup' );

function rubine_setup() {

	// Set Content Width
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 675;
		
	// init Localization
	load_theme_textdomain('rubine-lite', get_template_directory() . '/languages' );

	// Add Theme Support
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_editor_style();

	// Add Custom Background
	add_theme_support('custom-background', array('default-color' => 'f0f0f0'));

	// Add Custom Header
	add_theme_support('custom-header', array(
		'header-text' => false,
		'width'	=> 1320,
		'height' => 240,
		'flex-height' => true));
		
	// Add Theme Support for wooCommerce
	add_theme_support( 'woocommerce' );
	
	// Register Navigation Menus
	register_nav_menus( array(
		'primary'   => esc_html__( 'Main Navigation', 'rubine-lite' ),
		'secondary' => esc_html__( 'Top Navigation', 'rubine-lite' ),
		'social' => esc_html__( 'Social Icons', 'rubine-lite' ),
		) 
	);

}


// Add custom Image Sizes
add_action( 'after_setup_theme', 'rubine_add_image_sizes' );

function rubine_add_image_sizes() {

	// Add Custom Header Image Size
	add_image_size( 'featured-header-image', 1320, 240, true);

	// Add Featured Image Size
	add_image_size( 'post-thumbnail', 375, 210, true);

	// Add Featured Image Size
	add_image_size( 'featured-content', 460, 220, true);

}


// Register Sidebars
add_action( 'widgets_init', 'rubine_register_sidebars' );

function rubine_register_sidebars() {

	// Register Sidebars
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'rubine-lite' ),
		'id' => 'sidebar',
		'description' => esc_html__( 'Appears on posts and pages except Magazine Homepage and Fullwidth template.', 'rubine-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));

}


/*==================================== INCLUDE FILES ====================================*/

// include Theme Info page
require( get_template_directory() . '/inc/theme-info.php' );

// include Theme Customizer Options
require( get_template_directory() . '/inc/customizer/customizer.php' );
require( get_template_directory() . '/inc/customizer/default-options.php' );

// include Customization Files
require( get_template_directory() . '/inc/customizer/frontend/custom-layout.php' );

// Include Extra Functions
require get_template_directory() . '/inc/extras.php';

// include Template Functions
require( get_template_directory() . '/inc/template-tags.php' );

// Include support functions for Theme Addons
require get_template_directory() . '/inc/addons.php';

// Include Featured Content class in case it does not exist yet (e.g. user has not Jetpack installed)
require get_template_directory() . '/inc/featured-content.php';