<?php
/**
 * ansia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ansia
 */

if ( ! function_exists( 'ansia_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ansia_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ansia, use a find and replace
		 * to change 'ansia' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ansia', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'ansia-the-post' , 800, 99999);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ansia' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ansia_custom_background_args', array(
			'default-color' => 'fafafa',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 350,
			'width'       => 500,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
		
	}
endif;
add_action( 'after_setup_theme', 'ansia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ansia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ansia_content_width', 800 );
}
add_action( 'after_setup_theme', 'ansia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ansia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ansia' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ansia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Push Sidebar', 'ansia' ),
		'id'            => 'sidebar-push',
		'description'   => esc_html__( 'Add widgets here.', 'ansia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Left', 'ansia' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'ansia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Center', 'ansia' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'ansia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Right', 'ansia' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'ansia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'ansia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ansia_scripts() {
	wp_enqueue_style( 'ansia-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css');
	$query_args = array(
		'family' => 'Playfair+Display:400,700%7CMuli:400,700'
	);
	wp_enqueue_style( 'ansia-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

	wp_enqueue_script( 'ansia-custom', get_template_directory_uri() . '/js/jquery.ansia.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'ansia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	if ( is_active_sidebar( 'sidebar-push' ) ) {
		wp_enqueue_script( 'ansia-nanoScroll', get_template_directory_uri() . '/js/jquery.nanoscroller.min.js', array('jquery'), '1.0', true );
	}
	if ( ansia_options('_smooth_scroll', '1') == 1) {
		wp_enqueue_script( 'ansia-smooth-scroll', get_template_directory_uri() . '/js/SmoothScroll.min.js', array('jquery'), '1.0', true );
	}

	wp_enqueue_script( 'ansia-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	/* Dequeue default WooCommerce Layout */
	wp_dequeue_style ( 'woocommerce-layout' );
	wp_dequeue_style ( 'woocommerce-smallscreen' );
	wp_dequeue_style ( 'woocommerce-general' );
}
add_action( 'wp_enqueue_scripts', 'ansia_scripts' );

/**
 * WooCommerce Support
 */
if ( ! function_exists( 'ansia_woocommerce_support' ) ) :
	function ansia_woocommerce_support() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
	}
	add_action( 'after_setup_theme', 'ansia_woocommerce_support' );
endif; // ansia_woocommerce_support

/**
 * WooCommerce: Chenge default max number of related products
 */
if ( function_exists( 'is_woocommerce' ) ) :
	if ( ! function_exists( 'ansia_related_products_args' ) ) :
		add_filter( 'woocommerce_output_related_products_args', 'ansia_related_products_args' );
		function ansia_related_products_args( $args ) {
			$args['posts_per_page'] = 3;
			return $args;
		}
	endif;
endif;

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load PRO Button in the customizer
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/pro-button/class-customize.php' );

/* Calling in the admin area for the Welcome Page */
if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/ansia-admin-page.php';
}
