<?php
/**
 * annina functions and definitions
 *
 * @package annina
 */

if ( ! function_exists( 'annina_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function annina_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 950; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on annina, use a find and replace
	 * to change 'annina' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'annina', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'normal-post' , 950, 9999);
	add_image_size( 'masonry-post' , 450, 9999);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'annina' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'annina_custom_background_args', array(
		'default-color' => 'f0f0f0',
		'default-image' => '',
	) ) );
}
endif; // annina_setup
add_action( 'after_setup_theme', 'annina_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function annina_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'annina' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="content-annina widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'annina_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function annina_scripts() {
	wp_enqueue_style( 'annina-style', get_stylesheet_uri() );
	wp_enqueue_style( 'annina-fontAwesome', get_template_directory_uri() .'/css/font-awesome.min.css');
	wp_enqueue_style( 'annina-googlefonts', '//fonts.googleapis.com/css?family=Lato:300,400,700');

	wp_enqueue_script( 'annina-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'annina-custom', get_template_directory_uri() . '/js/jquery.annina.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'annina-masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'annina-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'annina-smoothScroll', get_template_directory_uri() . '/js/SmoothScroll.min.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'annina_scripts' );

/* Display a notice that can be dismissed */
add_action('admin_notices', 'annina_admin_notice');
function annina_admin_notice() {
	global $current_user ;
        $user_id = $current_user->ID;
	if ( ! get_user_meta($user_id, 'annina_ignore_notice') ) {
        echo '<div class="updated" style="background: #E9F7DF; border-left: 4px solid #1fa67a;"><p>'; 
        printf(__('Thank you for installing <b>Annina</b> WordPress Theme! <a href="%2$s"><b>Click here to go to the Theme Options</b></a>  | <a href="%1$s">Hide Notice</a>'), '?annina_nag_ignore=0', 'themes.php?page=theme_options');
        echo "</p></div>";
	}
}

add_action('admin_init', 'annina_nag_ignore');
function annina_nag_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        if ( isset($_GET['annina_nag_ignore']) && '0' == $_GET['annina_nag_ignore'] ) {
             add_user_meta($user_id, 'annina_ignore_notice', 'true', true);
	}
}

/**
 * EXCLUDE PAGE FROM SEARCH
 */
function annina_nosearch_page($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
		return $query;
}
add_filter('pre_get_posts','annina_nosearch_page'); 

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
 * Load Annina Dynamic.
 */
require get_template_directory() . '/inc/annina-dynamic.php';
