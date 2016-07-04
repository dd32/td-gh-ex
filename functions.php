<?php
/**
 * bellini functions and definitions.
 *
 * @package bellini
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/extras.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/customize/bellini-customizer-choices.php');          //Choices
require_once( trailingslashit( get_template_directory() ) . '/inc/custom-header.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/customizer.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/integration/jetpack.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/comments.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/hooks.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/bellini-front.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/bellini-header.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/bellini-footer.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/customize/customizer-sanitization.php');

if ( is_woocommerce_activated() ) {
	require_once( trailingslashit( get_template_directory() ) . '/inc/integration/bellini-woocommerce-functions.php');
	require_once( trailingslashit( get_template_directory() ) . '/inc/integration/bellini-woocommerce-hooks.php');	
}

if ( ! function_exists( 'bellini_setup' ) ) :

add_action( 'after_setup_theme', 'bellini_setup' );

function bellini_setup() {

	load_theme_textdomain( 'bellini', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo');
	add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption',) );
	add_theme_support('widget-customizer');
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'woocommerce' );

	add_theme_support( 'custom-background', apply_filters( 'bellini_custom_background_args', array(
		'default-color' => '#eceef1',
		'default-image' => '',
	) ) );		

	register_nav_menus( array(
		'primary' 	=> esc_html__( 'Primary Menu', 'bellini' ),
	) );

	add_image_size( 'bellini-thumb', 620, 300 );

	$GLOBALS['content_width'] = apply_filters( 'bellini_content_width', 640 );

	add_editor_style();
}

endif; // bellini_setup

add_action( 'widgets_init', 'bellini_widgets_init' );

function bellini_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area: Right', 'bellini' ),
		'id'            => 'sidebar-right',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area: Left', 'bellini' ),
		'id'            => 'sidebar-left',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area: Blog', 'bellini' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'These widgets will be only visible in Blog Page Template, Archive pages','bellini' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area: Footer', 'bellini' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'You can change the Footer Widget Column count from Customize - Layout - Layout Footer','bellini' ),
		'before_widget' => apply_filters('bellini_widget_footer_column','<section id="%1$s" class="widget__footer col-md-3 %2$s">'),
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Widgets', 'bellini' ),
		'id'            => 'sidebar-woo-sidebar',
		'description'   => esc_html__( 'These widgets will be only visible in WooCommerce Pages','bellini' ),
		'before_widget' => '<section id="%1$s" class="widget__after__content col-md-12 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

}



add_filter( 'excerpt_length', 'bellini_excerpt_length', 999 );

function bellini_excerpt_length( $length ) {
	return 20;
}


add_filter( 'nav_menu_link_attributes', 'add_nav_menu_atts', 10, 3 );

function add_nav_menu_atts( $atts, $item, $args ) {
  $atts['itemprop'] = 'url';
  return $atts;
}


/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'bellini_scripts' );

function bellini_scripts() {

	// Bellini Stylesheets
	wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );
  	wp_enqueue_style( 'bootstrap.min' );
	wp_enqueue_style('bellini-libraries',get_template_directory_uri(). '/inc/css/libraries.min.css');
	wp_enqueue_style( 'bellini-style', get_stylesheet_uri(), array(), '20160701', 'all' );

	// Load only if WooCommerce is active
	if ( is_woocommerce_activated() ) {
		wp_register_style( 'woostyles', get_template_directory_uri() . '/inc/css/bellini-woocommerce.css' );
		wp_enqueue_style( 'woostyles', '0.1' );
	}
	
  	wp_enqueue_script( 'bellini-js-libraries', get_template_directory_uri() . '/inc/js/library.min.js',  array('jquery'), '20160625', true );
  	wp_enqueue_script( 'bellini-pangolin', get_template_directory_uri() . '/inc/js/pangolin.js',  array('jquery'), '20160625', true );
 
  // Load the html5 shiv.
	wp_enqueue_script( 'bellini-html5', get_template_directory_uri() . '/inc/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'bellini-html5', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

/**
 * Display upgrade notice on customizer page
 */
add_action( 'customize_controls_enqueue_scripts', 'bellini_upsell_notice' );

function bellini_upsell_notice() {
 // Enqueue the script
	 wp_enqueue_script('bellini-customizer-upsell', get_template_directory_uri() . '/inc/js/unlock.js', array(), '1.0.0', true);
	 // Localize the script
	 wp_localize_script('bellini-customizer-upsell', 'belliniL10n',
	 array(
		 'belliniURL'	=> esc_url( 'http://www.pangolinthemes.com' ),
		 'belliniLabel'	=> esc_html__( ' Unlock All Features!', 'bellini' ),
	 )
	 );
}