<?php
/**
 * accent functions and definitions
 *
 * @package Accent
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'accent_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function accent_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on accent, use a find and replace
	 * to change 'accent' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'accent', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'accent' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'accent_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // accent_setup
add_action( 'after_setup_theme', 'accent_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function accent_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'accent' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'accent_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
 
function accent_scripts() {
	wp_enqueue_style( 'accent-style', get_stylesheet_uri() );
	
	// The default Source Sans Pro & Varela round fonts
	if ( !is_admin() ) {
        wp_register_style('googlefont-source-sans-pro', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,700italic', array(), false, 'all');
        wp_enqueue_style('googlefont-source-sans-pro');
		wp_register_style('googlefont-varela-round', 'http://fonts.googleapis.com/css?family=Varela+Round:400', array(), false, 'all');
        wp_enqueue_style('googlefont-varela-round');
    }
	
	// Google Fonts
	if ( accent_google_fonts_url() ) {
		wp_register_style( 'accent-fonts', accent_google_fonts_url() );
		wp_enqueue_style( 'accent-fonts' );
	}
	
	//wp_enqueue_style( 'accent-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '4.2.0' );
	wp_enqueue_style( 'accent-font-awesome', get_template_directory_uri() . '/inc/fontawesome/font-awesome.min.css', array(), '4.2.0' );

	wp_enqueue_script( 'accent-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'accent-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'accent-mobile-search', get_template_directory_uri() . '/js/mobile_search.js', array(), '1.0.0', true );
	
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, null);
	wp_enqueue_script('jquery');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'accent_scripts' );

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
 * Footer widgets
 */
register_sidebar( array(
	'name' => __( 'Footer Widget One', 'accent' ),
	'id' => 'sidebar-5',
	'description' => __( 'Found at the bottom of every page.', 'accent' ),
	'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => __( 'Footer Widget Two', 'accent' ),
	'id' => 'sidebar-6',
	'description' => __( 'Found at the bottom of every page.', 'accent' ),
	'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
	'after_widget' => "</aside>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => __( 'Footer Widget Three', 'accent' ),
	'id' => 'sidebar-7',
	'description' => __( 'Found at the bottom of every page.', 'accent' ),
	'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
	'after_widget' => "</aside>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );


function my_theme_add_editor_styles() {
    add_editor_style( 'accent-editor-style.css' );
}
add_action( 'after_setup_theme', 'my_theme_add_editor_styles' );

/**
 * Don't count pingbacks or trackbacks when determining
 * the number of comments on a post. Remove comments to enable.
 */
/*
function comment_count( $count ) {
	global $id;
	$comment_count = 0;
	$comments = get_approved_comments( $id );
	foreach ( $comments as $comment ) {
		if ( $comment->comment_type === '' ) {
			$comment_count++;
		}
	}
	return $comment_count;
}

add_filter( 'get_comments_number', 'comment_count', 0 );
*/
