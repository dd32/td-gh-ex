<?php
/**
 * aquarella functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aquarella
 */

/**
 * Freemiums.
 */
// Create a helper function for easy SDK access.
function aquarella_fs() {
    global $aquarella_fs;

    if ( ! isset( $aquarella_fs ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $aquarella_fs = fs_dynamic_init( array(
            'id'                  => '1030',
            'slug'                => 'aquarella-lite',
            'type'                => 'theme',
            'public_key'          => 'pk_1dab805943b3510337757bda039b1',
            'is_premium'          => false,
            'has_addons'          => false,
            'has_paid_plans'      => false,
        ) );
    }

    return $aquarella_fs;
}

// Init Freemius.
aquarella_fs();
// Signal that SDK was initiated.
do_action( 'aquarella_fs_loaded' );


if ( ! function_exists( 'aquarella_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aquarella_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on aquarella, use a find and replace
	 * to change 'aquarella-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'aquarella-lite', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'aquarella-lite' ),
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
		'audio',
	) );

	/*	Image Sizes
	 */
	add_image_size( 'aquarella_imgsize_1', 1170, 800, true ); 
	
	/*	Native Site Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 220,
		'width'       => 220,
		'flex-height' => true,
	) );

}
endif;
add_action( 'after_setup_theme', 'aquarella_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aquarella_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aquarella_content_width', 750 );
}
add_action( 'after_setup_theme', 'aquarella_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aquarella_widgets_init() {
	
	//Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'aquarella-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


}
add_action( 'widgets_init', 'aquarella_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aquarella_scripts() {
	wp_enqueue_style( 'aquarella-style', get_stylesheet_uri() );

	wp_enqueue_script( 'aquarella-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'aquarella-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	
	//bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), '20151215', true );

	//Google Web Fonts
	wp_enqueue_style( 'aquarella-googlewebfonts', 'https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700' );
	wp_enqueue_style( 'aquarella-googlewebfonts2', 'https://fonts.googleapis.com/css?family=Roboto:400,700,300' );

	//theme files
	wp_enqueue_style( 'aquarella-theme-style', get_template_directory_uri() . '/css/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'aquarella_scripts' );

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

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * navigation bootstrap
 */
require get_template_directory() . '/inc/aquarella_bootstrap_navwalker.php';

/**
 * Custom Widgets
 */
require get_template_directory() . '/inc/custom-widgets.php';
/**
 * TGM Plugin Activation
 */
require_once get_template_directory() . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/tgm-config.php';
/**
 * Kirki
 */
if ( class_exists( 'Kirki' ) ) {
  require_once get_template_directory() . '/inc/tmb-aquarella-kirki.php';
  require get_template_directory() . '/inc/include-kirki.php';
  require get_template_directory() . '/inc/kirki-config.php';
} 
/**
 * Customizer PRO Version
 */
require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/aquarella/class-customize.php' );
