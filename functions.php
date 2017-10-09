<?php
/**
 * Themes functions and definitions
 *
 * @package Adagio Lite
 */
function adagio_setup() {
	global $content_width;
		if ( ! isset( $content_width ) ){
      		$content_width = 1500;
		}
	load_theme_textdomain( 'adagio', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo');
	add_theme_support( 'customize-selective-refresh-widgets' );
	register_nav_menus( array(
			'main-menu' => esc_attr__( 'Primary Menu', 'adagio-lite' ),
			'secondary-menu' => esc_attr__( 'Secondary Menu', 'adagio-lite' ),
			'social' 	=> esc_attr__( 'Social', 'adagio-lite' )
		) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );
	add_theme_support( 'post-thumbnails' );
	add_image_size('adagio-homeimg', 2000, 700, true);
	add_image_size('adagio-blogthumb', 1200, 9999);
}
add_action( 'after_setup_theme', 'adagio_setup' );

/**
 * Register widget areas.
 *
 */
function adagio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'adagio-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Top Widget', 'adagio-lite' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'adagio-lite' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'adagio_widgets_init' );

/**
 * Including theme scrips and styles.
 */
function adagio_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	if (!is_admin()) {
		wp_enqueue_script( 'mobile-menu', get_template_directory_uri() . '/js/menu.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'responsive-videos', get_template_directory_uri() . '/js/responsive-videos.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'on-screen', get_template_directory_uri() . '/js/on-screen.js', array( 'jquery' ), '', true );
		wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i|Playfair+Display:400,400i,700,700i', array(), '1', 'screen'); 
		wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );
		wp_enqueue_style('animate-style', get_template_directory_uri().'/animate.css', array(), '1', 'screen'); 
		wp_enqueue_style( 'theme-style', get_stylesheet_uri());
	}
}
add_action( 'wp_enqueue_scripts', 'adagio_scripts_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';