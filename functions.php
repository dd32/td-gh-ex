<?php
/**
 * Atlantic functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Atlantic
 */

if ( ! function_exists( 'atlantic_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function atlantic_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Atlantic, use a find and replace
	 * to change 'atlantic' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'atlantic', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'atlantic' ),
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
		'image',
		'video',
		'link',
		'quote',
		'status'
	) );
}
endif;
add_action( 'after_setup_theme', 'atlantic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function atlantic_content_width() {
	$GLOBALS['content_width'] = get_theme_mod('atlantic_width') ? get_theme_mod('atlantic_width') : apply_filters( 'atlantic_content_width', 1280 );
}
add_action( 'after_setup_theme', 'atlantic_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function atlantic_scripts() {
	wp_enqueue_style( 'atlantic-normalize', get_template_directory_uri() . '/css/normalize.css', array(), '3.0.3' );
	wp_enqueue_style( 'atlantic-style', get_stylesheet_uri(), array('atlantic-normalize'), '1.0.0' );

	if ( get_theme_mod('atlantic_font') ) :
		wp_enqueue_style( 'atlantic-google-fonts-content', '//fonts.googleapis.com/css?family=' . get_theme_mod('atlantic_font') . '' );
	endif;

	if ( get_theme_mod('atlantic_heading_font') ) :
		wp_enqueue_style( 'atlantic-google-fonts-heading', '//fonts.googleapis.com/css?family=' . get_theme_mod('atlantic_heading_font') . '' );
	endif;

	if ( get_theme_mod('atlantic_font') == '' && get_theme_mod('atlantic_heading_font') == '' ) :
		wp_enqueue_style( 'atlantic-google-fonts', '//fonts.googleapis.com/css?family=Source+Code+Pro:400,900,200' );
	endif;

	wp_enqueue_script( 'atlantic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'atlantic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'atlantic_scripts' );

function atlantic_add_editor_styles() {
    add_editor_style( 'css/editor-style.css' );
}
add_action( 'admin_init', 'atlantic_add_editor_styles' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links
 */
function atlantic_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

/**
 * Size of embedded objects
 */
add_filter( 'embed_defaults', 'atlantic_embed_size' );
function atlantic_embed_size() {
    // Adjust values
    return array('width' => 1280);
}