<?php
/**
 * beetech functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package beetech
 */

if ( ! function_exists( 'beetech_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function beetech_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on beetech, use a find and replace
	 * to change 'beetech' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'beetech',  get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for custom logo.
	 *
	 * @since 1.0.0
	 */
	add_image_size( 'beetech-site-logo', 268, 90 );
	add_theme_support( 'custom-logo', array( 'size' => 'beetech-site-logo' ) );

	/**
	 * Define custom thumbnail size
	 *
	 * @since 1.0.0
	 */
	add_image_size( 'beetech_blog_thumb', 365, 210, true );
    add_image_size( 'beetech_portfolio_thumb', 390, 270, true );
	add_image_size( 'beetech_partner_thumb', 150, 150, true );	
	add_image_size( 'beetech_team_thumb', 210, 210, true );
	add_image_size( 'beetech_single_thumb', 820, 421, true );
    add_image_size( 'beetech_testimonial_home', 200, 200, true );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'beetech_primary_menu' => esc_html__( 'Primary Menu', 'beetech' ),
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
	add_theme_support( 'custom-background', apply_filters( 'beetech_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( 'css/editor-style.css' );
}
endif;
add_action( 'after_setup_theme', 'beetech_setup' );

/**
 *  Widget area 
 */
function beetech_widgets_init() {
	
	/**
	 * Register Right Sidebar
	 *
	 * @since 1.0.0
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'beetech' ),
		'id'            => 'beetech_right_sidebar',
		'description'   => esc_html__( 'Added widgets are display at Right Sidebar section in every posts/pages/archive.', 'beetech' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/**
	 * Register Left Sidebar
	 *
	 * @since 1.0.0
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'beetech' ),
		'id'            => 'beetech_left_sidebar',
		'description'   => esc_html__( 'Added widgets are display at Left Sidebar section in every posts/pages/archive.', 'beetech' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'beetech_widgets_init' );


function beetech_scripts() {
	global $beetech_theme_version;
	
	$beetech_font_args = array(
        'family' => 'Open+Sans:400,600,700,800,300|PT+Sans:400,700|Lato:400,700,300|BenchNine:300|Roboto+Slab:300|Source+Sans+Pro:400,300,600,700|Raleway:400,500,600,700,800,300|Roboto:400,500,600,700,800,300',
    );
    wp_enqueue_style( 'beetech-google-fonts', add_query_arg( $beetech_font_args, "//fonts.googleapis.com/css" ) );

	wp_enqueue_style( 'lightslider-style', get_template_directory_uri() . '/library/lightslider/css/lightslider.css', array(), '1.1.3' );
	wp_enqueue_style( 'bxSlider-style', get_template_directory_uri() . '/library/bxSlider/css/jquery.bxslider.css', array(), '4.1.2' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/library/font-awesome/css/font-awesome.min.css', array(), '4.6.3' );
	wp_enqueue_style ( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '3.5.1' );
	wp_enqueue_style( 'beetech-style', get_stylesheet_uri(), array(), $beetech_theme_version );
    wp_enqueue_style('beetech-responsive',get_template_directory_uri().'/responsive.css');

	wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/library/lightslider/js/lightslider.min.js', array( 'jquery' ), '1.1.3', true );
	wp_enqueue_script( 'jquery-bxslider', get_template_directory_uri() . '/library/bxSlider/js/jquery.bxslider.min.js', array( 'jquery' ), '4.1.2', true );
    wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri() . '/library/waypoints/js/jquery.waypoints.min.js', array( 'jquery' ), '2.0.5', true );
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/library/counterup/js/jquery.counterup.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery-nav', get_template_directory_uri() . '/library/jquery-nav/js/jquery.nav.js', array( 'jquery' ), '2.2.0', true );
	wp_enqueue_script( 'jquery-scrollTo', get_template_directory_uri() . '/library/jquery-scrollTo/js/jquery.scrollTo.js', array( 'jquery' ), '2.1.1', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/library/parallax-js/js/parallax.min.js', array( 'jquery' ), '1.4.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '1.1.2', true );
	wp_enqueue_script( 'beetech-custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array( 'jquery' ), $beetech_theme_version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$beetech_header_sticky_option = get_theme_mod( 'sticky_header_option', 'enable' );
	if( $beetech_header_sticky_option != 'disable' ) {
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/library/jquery-sticky/js/jquery.sticky.js', array( 'jquery' ), '1.0.2', true );
		wp_enqueue_script( 'beetech-sticky-setting', get_template_directory_uri() . '/library/jquery-sticky/js/sticky-setting.js', array( 'jquery-sticky' ), '1.0.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'beetech_scripts' );

/** admin enqueue **/
if( ! function_exists( 'beetech_admin_enqueue' ) ):
	function beetech_admin_enqueue() {
		wp_enqueue_style( 'beetech-admin-style', get_template_directory_uri() . '/css/admin-styles.css' );
	}
endif;

add_action( 'admin_enqueue_scripts', 'beetech_admin_enqueue' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function beetech_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'beetech_content_width', 640 );
}
add_action( 'after_setup_theme', 'beetech_content_width', 0 );

function beetech_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url', 'display' ) );
	}
}
add_action( 'wp_head', 'beetech_pingback_header' );

/**
 * Load beetech Custom Functions file
 */
require  get_template_directory()  . '/inc/beetech-functions.php';

/**
 * Implement the Custom Header feature.
 */
require  get_template_directory()  . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require  get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require  get_template_directory()  . '/inc/extras.php';

/**
 * Customizer
 */
require  get_template_directory()  . '/inc/customizer/customizer.php';

/**
 * Customizer Option
 */
require  get_template_directory()  . '/inc/customizer/customizer-option.php';

/**
 * Customizer Classes
 */
require  get_template_directory()  . '/inc/customizer/beetech-customizer-classes.php';

/**
 * Sanitize Function
 */
require  get_template_directory()  . '/inc/customizer/beetech-sanitize.php';

/**
 * Beetech Metabox
 */
require  get_template_directory()  . '/inc/metabox.php';