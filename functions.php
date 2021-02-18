<?php

/*==================================== THEME SETUP ====================================*/

// Load default style.css and Javascripts
add_action( 'wp_enqueue_scripts', 'rubine_enqueue_scripts' );

function rubine_enqueue_scripts() {

	// Get Theme Version
	$theme_version = wp_get_theme()->get( 'Version' );

	// Register and Enqueue Stylesheet
	wp_enqueue_style( 'rubine-lite-stylesheet', get_stylesheet_uri(), array(), $theme_version );

	// Register Genericons
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/css/genericons/genericons.css', array(), '3.4.1' );

	// Register and Enqueue HTML5shiv to support HTML5 elements in older IE versions
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.3' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	// Register and enqueue navigation.js
	wp_enqueue_script( 'rubine-lite-jquery-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20160719' );

	// Passing Parameters to Navigation.js Javascript
	wp_localize_script( 'rubine-lite-jquery-navigation', 'rubine_navigation_params', array( 'menuTitle' => esc_html__( 'Menu', 'rubine-lite' ) ) );

	// Register Comment Reply Script for Threaded Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


/**
 * Enqueue custom fonts.
 */
function rubine_custom_fonts() {
	wp_enqueue_style( 'rubine-custom-fonts', get_template_directory_uri() . '/css/custom-fonts.css', array(), '20180413' );
}
add_action( 'wp_enqueue_scripts', 'rubine_custom_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'rubine_custom_fonts', 1 );


/**
 * Enqueue editor styles for the new Gutenberg Editor.
 */
function rubine_block_editor_assets() {
	wp_enqueue_style( 'rubine-editor-styles', get_template_directory_uri() . '/css/gutenberg-styles.css', array(), '20181102', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'rubine_block_editor_assets' );


// Setup Function: Registers support for various WordPress features
add_action( 'after_setup_theme', 'rubine_setup' );

function rubine_setup() {

	// Set Content Width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 675;
	}

	// init Localization
	load_theme_textdomain( 'rubine-lite', get_template_directory() . '/languages' );

	// Add Theme Support
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_editor_style();

	// Add Custom Background
	add_theme_support( 'custom-background', array( 'default-color' => 'f0f0f0' ) );

	// Set up the WordPress core custom logo feature
	add_theme_support( 'custom-logo', apply_filters( 'rubine_custom_logo_args', array(
		'height' => 40,
		'width' => 250,
		'flex-height' => true,
		'flex-width' => true,
	) ) );

	// Add Custom Header
	add_theme_support( 'custom-header', array(
		'header-text' => false,
		'width'       => 1320,
		'height'      => 240,
		'flex-height' => true,
	) );

	// Add Theme Support for wooCommerce
	add_theme_support( 'woocommerce' );

	// Register Navigation Menus
	register_nav_menus( array(
		'primary'   => esc_html__( 'Main Navigation', 'rubine-lite' ),
		'secondary' => esc_html__( 'Top Navigation', 'rubine-lite' ),
		'social'    => esc_html__( 'Social Icons', 'rubine-lite' ),
	) );

	// Add Theme Support for Selective Refresh in Customizer
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add custom color palette for Gutenberg.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_html_x( 'Primary', 'Gutenberg Color Palette', 'rubine-lite' ),
			'slug'  => 'primary',
			'color' => apply_filters( 'rubine_primary_color', '#cc1111' ),
		),
		array(
			'name'  => esc_html_x( 'White', 'Gutenberg Color Palette', 'rubine-lite' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html_x( 'Light Gray', 'Gutenberg Color Palette', 'rubine-lite' ),
			'slug'  => 'light-gray',
			'color' => '#f0f0f0',
		),
		array(
			'name'  => esc_html_x( 'Dark Gray', 'Gutenberg Color Palette', 'rubine-lite' ),
			'slug'  => 'dark-gray',
			'color' => '#777777',
		),
		array(
			'name'  => esc_html_x( 'Black', 'Gutenberg Color Palette', 'rubine-lite' ),
			'slug'  => 'black',
			'color' => '#353535',
		),
	) );
}


// Add custom Image Sizes
add_action( 'after_setup_theme', 'rubine_add_image_sizes' );

function rubine_add_image_sizes() {

	// Add Custom Header Image Size
	add_image_size( 'featured-header-image', 1320, 240, true );

	// Add Featured Image Size
	add_image_size( 'post-thumbnail', 375, 210, true );

	// Add Featured Image Size
	add_image_size( 'featured-content', 460, 220, true );
}


// Register Sidebars
add_action( 'widgets_init', 'rubine_register_sidebars' );

function rubine_register_sidebars() {

	// Register Sidebars
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'rubine-lite' ),
		'id' => 'sidebar',
		'description' => esc_html__( 'Appears on posts and pages except the full width template.', 'rubine-lite' ),
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
