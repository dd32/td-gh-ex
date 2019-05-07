<?php
/**
 * undedicated functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package undedicated
 */

if ( ! function_exists( 'undedicated_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function undedicated_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on undedicated, use a find and replace
	 * to change 'undedicated' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'undedicated', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'undedicated' ),
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
	add_theme_support( 'custom-background', apply_filters( 'undedicated_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );


}
endif; // undedicated_setup
add_action( 'after_setup_theme', 'undedicated_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function undedicated_content_width() {
	if ( ! isset( $content_width ) ) $content_width = 1024;
}
add_action( 'after_setup_theme', 'undedicated_content_width', 0 );


/**
 * Add read more link to excerpt
 */
function undedicated_excerpt_more( $more ) {
    return ' ... ';
}
add_filter( 'excerpt_more', 'undedicated_excerpt_more' );


/**
 * Modify the custom excerpt & add read more link 
 */
function undedicated_excerpt_more_link( $excerpt ){
	
	$excerpt = wp_strip_all_tags($excerpt, true);
	return '<p> '. $excerpt . ' <a class="read-more meta-nav" href="'.get_the_permalink().'">'. esc_attr__('Read more', 'undedicated'). ' &raquo;</a></p>';
}
add_filter( 'the_excerpt', 'undedicated_excerpt_more_link', 21 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function undedicated_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'undedicated' ),
		'id'            => 'primary-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'undedicated_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function undedicated_scripts() {
	wp_enqueue_style( 'undedicated-style', get_stylesheet_uri() );
	wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Roboto:300,400,700', array() );

	wp_enqueue_script( 'undedicated-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'undedicated-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'undedicated_scripts' );

//* Add new image sizes
add_image_size( 'feature-wide', 1024, 612, TRUE );
add_image_size( 'feature-narrow', 800, 400, TRUE );

//* Add support for custom background
add_theme_support( 'custom-background' );

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

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Check the theme requirements on activation
 */
require get_template_directory() . '/inc/requirements.php';

/**
 * Add the theme info page
 */
require get_template_directory() . '/inc/welcome.php';