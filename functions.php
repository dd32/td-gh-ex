<?php
/**
 * App Landing Page functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package App_Landing_Page
 */

if ( ! function_exists( 'app_landing_page_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function app_landing_page_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on App Landing Page, use a find and replace
	 * to change 'app-landing-page' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'app-landing-page', get_template_directory() . '/languages' );\

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style( 'css/editor-style.css' );

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
		'primary' => esc_html__( 'Primary', 'app-landing-page' ),
		'footer' => esc_html__( 'footer', 'app-landing-page' ),
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
		'gallery',
        'status',
        'audio', 
        'chat'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'app_landing_page_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Custom Image Size
    add_image_size( 'app-landing-page-with-sidebar', 750, 340, true );
    add_image_size( 'app-landing-page-without-sidebar', 1200, 437, true );
    add_image_size( 'app-landing-page-featured-post', 170, 170, true );
    add_image_size( 'app-landing-page-recent-post', 78, 58, true );

}
endif;
add_action( 'after_setup_theme', 'app_landing_page_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function app_landing_page_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'app_landing_page_content_width', 640 );
}
add_action( 'after_setup_theme', 'app_landing_page_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function app_landing_page_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'app-landing-page' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'app-landing-page' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	 register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'app-landing-page' ),
		'id'            => 'footer-sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Newsletters', 'app-landing-page' ),
		'id'            => 'newsletter-sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	 
}
add_action( 'widgets_init', 'app_landing_page_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function app_landing_page_scripts() {

	    $app_landing_page_query_args = array(
		'family' => 'Lato:400,400italic,700,900,300',
	);

    wp_enqueue_style( 'app-landing-page-google-fonts', add_query_arg( $app_landing_page_query_args, "//fonts.googleapis.com/css" ) );
    wp_enqueue_style( 'app-landing-page-font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
    wp_enqueue_style( 'app-landing-page-sidr-style', get_template_directory_uri() . '/css/jquery.sidr.light.css' );
    wp_enqueue_style( 'app-landing-page-animate-style', get_template_directory_uri() . '/css/animate.css' );
    wp_enqueue_style( 'app-landing-page-style', get_stylesheet_uri() );
    
    wp_enqueue_script( 'app-landing-page-sidr', get_template_directory_uri() . '/js/jquery.sidr.js', array('jquery'), '20160125', true );
    wp_enqueue_script( 'app-landing-page-countdown-min', get_template_directory_uri() . '/js/jquery.countdown.min.js', array('jquery'), '20160125', true );
	wp_enqueue_script( 'app-landing-page-equalheights', get_template_directory_uri() . '/js/jquery.equalheights.js', array('jquery'), '1.4.0', true );
	wp_enqueue_script( 'app-landing-page-nice-scroll', get_template_directory_uri() . '/js/nice-scroll.js', array('jquery'), '20160125', true );
    wp_enqueue_script( 'app-landing-page-wow-min', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '2.0.3', true );
    wp_register_script( 'app-landing-page-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20160125', true );

    //wp_localize_script( 'app-landing-page-custom', 'app|_landing_page_data', $benevolent_array );
    wp_enqueue_script( 'app-landing-page-custom' );
 
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'app_landing_page_scripts' );

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
require get_template_directory() . '/inc/app-landing-page-custom-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Meta Box.
 */
require get_template_directory() . '/inc/app-landing-page-metabox.php';

/**
 * Featured Post Widget
 */
require get_template_directory() . '/inc/widget-featured-post.php';

/**
 * Recent Post Widget
 */
require get_template_directory() . '/inc/widget-recent-post.php';

/**
 * Social Link Widget
 */
require get_template_directory() . '/inc/widget-social-links.php';
