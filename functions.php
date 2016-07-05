<?php
/**
 * bfront functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bfront
 */

if ( ! function_exists( 'bfront_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bfront_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on bfront, use a find and replace
     * to change 'bfront' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'bfront', get_template_directory() . '/languages' );

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

    /*
     * This function id used for Logo upload.
     */
    add_theme_support( 'custom-logo' );

    /*
     * This theme uses wp_nav_menu() in one location.
     * This menu is used only for Front Page.
     */
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'bfront' ),
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

    add_image_size( 'bfront-large', 720, 9999 );
    add_image_size( 'bfront-medium', 575, 9999 );

    //Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'bfront_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
endif;
add_action( 'after_setup_theme', 'bfront_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bfront_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'bfront_content_width', 640 );
}
add_action( 'after_setup_theme', 'bfront_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bfront_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'bfront' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'bfront' ),
        'before_widget' => '<div id="%1$s" class="sidebar_widget wow widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    // First Footer Widget
    register_sidebar( array(
        'name'          => esc_html__( 'First Footer Widget', 'bfront' ),
        'id'            => 'first-footer-widget',
        'description'   => esc_html__( 'Add widgets here.', 'bfront' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    // Second Footer Widget
    register_sidebar( array(
        'name'          => esc_html__( 'Second Footer Widget', 'bfront' ),
        'id'            => 'second-footer-widget',
        'description'   => esc_html__( 'Add widgets here.', 'bfront' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    // Third Footer Widget
    register_sidebar( array(
        'name'          => esc_html__( 'Third Footer Widget', 'bfront' ),
        'id'            => 'third-footer-widget',
        'description'   => esc_html__( 'Add widgets here.', 'bfront' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    // Fourth Footer Widget
    register_sidebar( array(
        'name'          => esc_html__( 'Fourth Footer Widget', 'bfront' ),
        'id'            => 'fourth-footer-widget',
        'description'   => esc_html__( 'Add widgets here.', 'bfront' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

}
add_action( 'widgets_init', 'bfront_widgets_init' );


/**
 * Enqueue styles.
 */
function bfront_styles() {
    wp_enqueue_style('bfront-font-Monda', '//fonts.googleapis.com/css?family=Monda:400,700');
    wp_enqueue_style('bfront-Reset-css', get_template_directory_uri() . '/css/reset.css');
    wp_enqueue_style('bfront-flexslider-css', get_template_directory_uri() . '/css/flexslider.css');
    wp_enqueue_style('bfront-font-awesome-css', get_template_directory_uri() . '/css/font-awesome.css');
    wp_enqueue_style('bfront-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('bfront-superfish-css', get_template_directory_uri() . '/css/superfish.css');
    wp_enqueue_style('bfront-animate-css', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style('bfront-style', get_stylesheet_uri() ); 
}
add_action( 'wp_enqueue_scripts', 'bfront_styles' );

/**
 * Enqueue scripts.
 */
function bfront_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('bfront-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'));
    wp_enqueue_script('bfront-superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'));
    wp_enqueue_script('bfront-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));
    wp_enqueue_script('bfront-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
    wp_enqueue_script('bfront-wow', get_template_directory_uri() . '/js/wow.js', array('jquery'));
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'bfront_scripts' );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom-Customizer additions.
 */
require get_template_directory() . '/inc/custom-customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/define_template.php';


function bfront_get_excerpt($count){
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  return $excerpt.'[...]';
}

function bfront_excerpt_length( $length ) {
    return 60;
}
add_filter( 'excerpt_length', 'bfront_excerpt_length', 999 );


function bfront_custom_css(){
    $custom_css = esc_attr( get_theme_mod('custom_css') );
    echo '<style type="text/css">'.$custom_css.'</style>';
}
add_action('wp_head', 'bfront_custom_css');