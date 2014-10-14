<?php
/**
 * storto functions and definitions
 *
 * @package storto
 */

if ( ! function_exists( 'storto_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function storto_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 800; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on storto, use a find and replace
	 * to change 'storto' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'storto', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'normal-post' , 800, 9999);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'storto' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'storto_custom_background_args', array(
		'default-color' => '404040',
		'default-image' => '',
	) ) );
}
endif; // storto_setup
add_action( 'after_setup_theme', 'storto_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function storto_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'storto' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'storto_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function storto_scripts() {
	wp_enqueue_style( 'storto-style', get_stylesheet_uri() );
	wp_enqueue_style( 'storto-googlefonts', '//fonts.googleapis.com/css?family=Alegreya+Sans:300,400,700');
	wp_enqueue_style( 'storto-fontAwesome', get_template_directory_uri() .'/css/font-awesome.min.css');

	wp_enqueue_script( 'storto-custom', get_template_directory_uri() . '/js/jquery.storto.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'storto-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'storto-scrollToTop', get_template_directory_uri() . '/js/jquery.scrollToTop.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'storto-sticky', get_template_directory_uri() . '/js/jquery.hc-sticky.js', array('jquery'), '1.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'storto_scripts' );

/**
 * Replace more Excerpt
 */
function storto_new_excerpt_more($more) {
       global $post;
	return ' ...';
}
add_filter('excerpt_more', 'storto_new_excerpt_more');

/* Display a notice that can be dismissed */
add_action('admin_notices', 'storto_admin_notice');
function storto_admin_notice() {
	global $current_user ;
        $user_id = $current_user->ID;
	if ( ! get_user_meta($user_id, 'storto_ignore_notice') ) {
        echo '<div class="updated" style="background: #E9F7DF; border-left: 4px solid #1fa67a;"><p>'; 
        printf(__('Thank you for installing <b>Storto</b> WordPress Theme! <a href="%2$s"><b>Click here to go to the Theme Options</b></a>  | <a href="%1$s">Hide Notice</a>'), '?storto_nag_ignore=0', 'themes.php?page=theme_options');
        echo "</p></div>";
	}
}

add_action('admin_init', 'storto_nag_ignore');
function storto_nag_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        if ( isset($_GET['storto_nag_ignore']) && '0' == $_GET['storto_nag_ignore'] ) {
             add_user_meta($user_id, 'storto_ignore_notice', 'true', true);
	}
}

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
* Load the Theme Options Page for social media icons
*/
require get_template_directory() . '/inc/theme-options.php';

/**
 * Load Storto Dynamic.
 */
require get_template_directory() . '/inc/storto-dynamic.php';