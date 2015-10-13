<?php
/**
 * free functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Base WP
 */

if ( ! function_exists( 'base_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function base_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain( 'base-wp', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    //Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    //Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'base-wp' ),
        'header-menu' => esc_html__( 'Header Menu', 'base-wp' ),
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
    add_theme_support( 'custom-background', apply_filters( 'base_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
endif; // base_setup
add_action( 'after_setup_theme', 'base_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function base_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'base_content_width', 1170 );
}
add_action( 'after_setup_theme', 'base_content_width', 0 );

/**
 * Custom image size.
 */
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'slider-thumb', 1174, 300, true ); // (ritagliata)
}

//Implement the Custom Header feature.
require get_template_directory() . '/core-framework/custom-header.php';

//Custom template tags for this theme.
require get_template_directory() . '/core-framework/template-tags.php';

//Custom functions that act independently of the theme templates.
require get_template_directory() . '/core-framework/extras.php';

//Load Jetpack compatibility file.
require get_template_directory() . '/core-framework/jetpack.php';

//Core Framework.
require get_template_directory() . '/core-framework/func/function-action.php';
require get_template_directory() . '/core-framework/func/function-widget.php';
require get_template_directory() . '/core-framework/func/function-script.php';
require get_template_directory() . '/core-framework/partials/page-metabox.php';

require get_template_directory() . '/core-framework/widgets/social-widget.php';
require get_template_directory() . '/core-framework/widgets/recent-posts-widget.php';
require get_template_directory() . '/core-framework/widgets/adsense-widget.php';

if ( is_admin() ) {
    require get_template_directory() . '/core-framework/welcome/welcome-screen.php';
}
//Loads the Options Panel
require get_template_directory() . '/core-framework/options/options-framework.php';
// Loads options.php
require get_template_directory() . '/options.php';

/*-----------------------------------------------
 * Woocommerce support.
 -----------------------------------------------*/
add_theme_support( 'woocommerce' );