<?php

/*==================================== THEME SETUP ====================================*/

// Load default style.css and Javascripts
add_action('wp_enqueue_scripts', 'courage_enqueue_scripts');

function courage_enqueue_scripts() {

	// Get Theme Options from Database
	$theme_options = courage_theme_options();
	
	// Register and Enqueue Stylesheet
	wp_enqueue_style(' courage-stylesheet', get_stylesheet_uri() );
	
	// Register Genericons
	wp_enqueue_style( 'courage-genericons', get_template_directory_uri() . '/css/genericons/genericons.css' );

	// Register and enqueue navigation.js
	wp_enqueue_script( 'courage-jquery-navigation', get_template_directory_uri() .'/js/navigation.js', array('jquery') );
		
	// Register and Enqueue FlexSlider JS and CSS if necessary
	if ( true == $theme_options['slider_active_blog'] or true == $theme_options['slider_active_magazine'] or is_page_template( 'template-slider.php' ) ) :

		// FlexSlider CSS
		wp_enqueue_style( 'courage-flexslider', get_template_directory_uri() . '/css/flexslider.css' );

		// FlexSlider JS
		wp_enqueue_script( 'courage-flexslider', get_template_directory_uri() .'/js/jquery.flexslider-min.js', array('jquery'), '2.6.0' );

		// Register and enqueue slider.js
		wp_enqueue_script( 'courage-post-slider', get_template_directory_uri() .'/js/slider.js', array( 'courage-flexslider' ), '2.6.0' );

	endif;

	// Register Comment Reply Script for Threaded Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register and Enqueue Fonts
	wp_enqueue_style( 'courage-default-fonts', courage_google_fonts_url(), array(), null );

}


// Retrieve Font URL to register default Google Fonts
function courage_google_fonts_url() {
    $fonts_url = '';
	
	// Get Theme Options from Database
	$theme_options = courage_theme_options();
	
	// Only embed Google Fonts if not deactivated
	if ( ! ( isset($theme_options['deactivate_google_fonts']) and $theme_options['deactivate_google_fonts'] == true ) ) :
		
		// Define Default Fonts
		$font_families = array('Lato', 'Fjalla One');
		
		// Set Google Font Query Args
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		
		// Create Fonts URL
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		
	endif;

    return apply_filters( 'courage_google_fonts_url', $fonts_url );
}


// Setup Function: Registers support for various WordPress features
add_action( 'after_setup_theme', 'courage_setup' );

function courage_setup() {

	// Set Content Width
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 860;
	
	// init Localization
	load_theme_textdomain('courage', get_template_directory() . '/languages' );

	// Add Theme Support
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_editor_style();
	
	// Add Post Thumbnails
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 840, 200, true );

	// Add Custom Background
	add_theme_support('custom-background', array('default-color' => 'e5e5e5'));

	// Set up the WordPress core custom logo feature
	add_theme_support( 'custom-logo', apply_filters( 'courage_custom_logo_args', array(
		'height' => 60,
		'width' => 300,
		'flex-height' => true,
		'flex-width' => true,
	) ) );
	
	// Add Custom Header
	add_theme_support('custom-header', array(
		'header-text' => false,
		'width'	=> 1320,
		'height' => 200,
		'flex-height' => true));
		
	// Add Theme Support for wooCommerce
	add_theme_support( 'woocommerce' );

	// Register Navigation Menus
	register_nav_menu( 'primary', esc_html__( 'Main Navigation', 'courage' ) );
	register_nav_menu( 'secondary', esc_html__( 'Top Navigation', 'courage' ) );
	register_nav_menu( 'footer', esc_html__( 'Footer Navigation', 'courage' ) );
	
	// Register Social Icons Menu
	register_nav_menu( 'social', esc_html__( 'Social Icons', 'courage' ) );

}


// Add custom Image Sizes
add_action( 'after_setup_theme', 'courage_add_image_sizes' );

function courage_add_image_sizes() {
	
	// Add Custom Header Image Size
	add_image_size( 'courage-header-image', 1320, 250, true);
	
	// Add Slider Image Size
	add_image_size('courage-slider-image', 1320, 380, true);
	
	// Add Category Post Widget image sizes
	add_image_size('courage-category-posts-widget-small', 80, 80, true);
	add_image_size('courage-category-posts-widget-big', 540, 180, true);

}


// Register Sidebars
add_action( 'widgets_init', 'courage_register_sidebars' );

function courage_register_sidebars() {

	// Register Sidebar
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'courage' ),
		'id' => 'sidebar',
		'description' => esc_html__( 'Appears on posts and pages except the full width template.', 'courage' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));
	
	// Register Magazine Homepage
	register_sidebar( array(
		'name' => esc_html__( 'Magazine Homepage', 'courage' ),
		'id' => 'magazine-homepage',
		'description' => esc_html__( 'Appears on Magazine Homepage template only. You can use the Category Posts widgets here.', 'courage' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

}


/*==================================== INCLUDE FILES ====================================*/

// include Theme Info page
require( get_template_directory() . '/inc/theme-info.php' );

// include Theme Customizer Options
require( get_template_directory() . '/inc/customizer/customizer.php' );
require( get_template_directory() . '/inc/customizer/default-options.php' );

// include Customization Files
require( get_template_directory() . '/inc/customizer/frontend/custom-slider.php' );

// Include Extra Functions
require get_template_directory() . '/inc/extras.php';

// include Template Functions
require( get_template_directory() . '/inc/template-tags.php' );

// Include support functions for Theme Addons
require get_template_directory() . '/inc/addons.php';

// include Widget Files
require( get_template_directory() . '/inc/widgets/widget-category-posts-boxed.php' );
require( get_template_directory() . '/inc/widgets/widget-category-posts-columns.php' );
require( get_template_directory() . '/inc/widgets/widget-category-posts-grid.php' );

// Include Featured Content class
require( get_template_directory() . '/inc/featured-content.php' );