<?php
/**
 * Theme functions and definitions
 *
 * @package Author Landing Page
 */
/**
 * Load assets.
 *
 */
function author_landing_page_enqueue_styles() {
    $my_theme = wp_get_theme();
    $version = $my_theme['Version'];

    wp_enqueue_style( 'author-landing-page-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'author-landing-page-style', get_stylesheet_directory_uri() . '/style.css', array( 'author-landing-page-parent-style' ), $version );


    $query_args = array(
		'family' => 'PT+Sans:400,400i,700,700i|Quicksand:300,400,500,700',
		'subset' => 'latin,latin-ext',
	);
	wp_enqueue_style( 'author-landing-page-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}
add_action( 'wp_enqueue_scripts', 'author_landing_page_enqueue_styles' );

/**
 * After setup theme hook
 */
function author_landing_page_theme_setup(){
    /*
     * Make chile theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'author-landing-page', get_stylesheet_directory() . '/languages' );

    /**
     * Add support for custom header.
    */
    add_theme_support( 'custom-header', apply_filters( 'author_landing_page_header_args', array(
        'default-image' => get_stylesheet_directory_uri() . '/images/banner-bg.jpg',
        'video'         => false,
        'width'         => 1920,
        'height'        => 730,
        'header-text'   => false
    ) ) );
    
    register_default_headers( array(
        'default-image' => array(
            'url'           => get_stylesheet_directory_uri() . '/images/banner-bg.jpg',
            'thumbnail_url' => get_stylesheet_directory_uri() . '/images/banner-bg.jpg',
            'description'   => __( 'Default Header Image', 'author-landing-page' ),
        ),
    ) );

    add_image_size( 'author-landing-page-banner-image', 650, 510, true );
    add_image_size( 'author-landing-page-about-block', 800, 1072, true );

    /*
     * Make chile theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'author-landing-page', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'author_landing_page_theme_setup' );

/**
 * Implementing parent theme functions to the child theme.
 */
require get_stylesheet_directory() . '/inc/parent-functions.php';
