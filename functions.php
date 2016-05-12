<?php
/**
 * Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Basic Shop
 */

if ( ! function_exists( 'basic_shop_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function basic_shop_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on this theme, use a find and replace
	 * to change 'basic-shop' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'basic-shop', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'basic-shop' ),
        'header' => esc_html__( 'Header Menu', 'basic-shop' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'basic_shop_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    //add support for logo upload from WP 4.5+
    add_theme_support( 'custom-logo' );
}
endif;
add_action( 'after_setup_theme', 'basic_shop_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function basic_shop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'basic_shop_content_width', 1170 );
}
add_action( 'after_setup_theme', 'basic_shop_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function basic_shop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'basic-shop' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'basic-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Shop', 'basic-shop' ),
		'id'            => 'sidebar-shop',
		'description'   => esc_html__( 'Add widgets here.', 'basic-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    for ( $i = 1; $i <= intval( 4 ); $i++ ) {
		register_sidebar( array(
			'name' 				=> sprintf( __( 'Header %d', 'basic-shop' ), $i ),
			'id' 				=> sprintf( 'header-%d', $i ),
			'description' 		=> sprintf( esc_html__( 'Widgetized Header Region %d.', 'basic-shop' ), $i ),
		    'before_widget'     => '<section id="%1$s" class="widget %2$s">',
			'after_widget' 		=> '</section>',
			'before_title' 		=> '<h3 class="widget-title">',
			'after_title' 		=> '</h3>',
			)
		);
    }
    for ( $i = 1; $i <= intval( 4 ); $i++ ) {
        register_sidebar( array(
			'name' 				=> sprintf( __( 'Footer %d', 'basic-shop' ), $i ),
			'id' 				=> sprintf( 'footer-%d', $i ),
			'description' 		=> sprintf( esc_html__( 'Widgetized Footer Region %d.','basic-shop' ), $i ),
		    'before_widget'     => '<section id="%1$s" class="widget %2$s">',
			'after_widget' 		=> '</section>',
			'before_title' 		=> '<h3 class="widget-title">',
			'after_title' 		=> '</h3>',
			)
		);
    }
}
add_action( 'widgets_init', 'basic_shop_widgets_init' );

/**
 * Register Fonts
 */
if ( ! function_exists( 'igthemes_fonts_url' ) ) :
	/**
	 * Register default Google fonts
	 */
	function igthemes_fonts_url() {
	    $fonts_url = '';

	 	/* Translators: If there are characters in your language that are not
	    * supported by this font, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $open_sans = _x( 'on', 'Open Sans font: on or off', 'basic-shop' );

	    /* Translators: If there are characters in your language that are not
	    * supported by this font, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $raleway = _x( 'on', 'Raleway font: on or off', 'basic-shop' );

	    if ( 'off' !== $raleway || 'off' !== $open_sans ) {
	        $font_families = array();

	        if ( 'off' !== $raleway ) {
	            $font_families[] = 'Raleway:300,400,700,300italic,400italic,700italic';
	        }

	        if ( 'off' !== $open_sans ) {
	            $font_families[] = 'Open+Sans:300,400,700,300italic,400italic,700italic';
	        }

	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );

	        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	    }

	    return esc_url_raw( $fonts_url );
	}
endif;


/**
 * Enqueue scripts and styles.
 */
function basic_shop_scripts() {
	wp_enqueue_style( 'basic-shop-style', get_stylesheet_uri() );
    
    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/core/fonts/css/font-awesome.min.css'); 

	wp_enqueue_script( 'basic-shop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'basic-shop-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/magnific-popup.js',  array( 'jquery' ), '1.1.0', true );
    

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
    wp_enqueue_style( 'basic-shop-fonts', igthemes_fonts_url(), array(), null );

}
add_action( 'wp_enqueue_scripts', 'basic_shop_scripts' );

// Custom template tags for this theme.
require get_template_directory() . '/core/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/core/extras.php';

// Customizer additions.
require get_template_directory() . '/core/options/customizer.php';

// Load Jetpack compatibility file.
require get_template_directory() . '/core/jetpack.php';

/*----------------------------------------------------------------------
# DECLARE WOOCOMMERCE SUPPORT
------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'igthemes_woocommerce_support' );
function igthemes_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Check if woocommerce is active and prevent fatal error
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/*----------------------------------------------------------------------
# EDD SUPPORT
------------------------------------------------------------------------*/
if ( ! function_exists( 'is_edd_activated' ) ) {
	function is_edd_activated() {
		return class_exists( 'Easy_Digital_Downloads' ) ? true : false;
	}
}

// Structure
require get_template_directory() . '/core/structure/hooks.php';
require get_template_directory() . '/core/structure/header.php';
require get_template_directory() . '/core/structure/before-content.php';
require get_template_directory() . '/core/structure/post.php';
require get_template_directory() . '/core/structure/page.php';
require get_template_directory() . '/core/structure/sidebar.php';
require get_template_directory() . '/core/structure/after-content.php';
require get_template_directory() . '/core/structure/footer.php';

// Welcome
require get_template_directory() . '/core/welcome/welcome-screen.php';
// WooCommerce
if (is_woocommerce_activated()) {
    require get_template_directory() . '/core/structure/woocommerce.php';
}
// EDD
if (is_edd_activated()) {
    require get_template_directory() . '/core/structure/edd.php';
}
// BeaverBuilder
require get_template_directory() . '/core/structure/beaverbuilder.php';

