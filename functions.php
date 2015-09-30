<?php
/**
 * base-wp functions and definitions
 *
 * @package Base WP
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 870; /* pixels */
}

if ( ! function_exists( 'base_wp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function base_wp_setup() {

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

    //This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'base-wp' ),
        'header-menu' => __( 'Header Menu', 'base-wp' ),
    ) );

    //Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );

    //Enable support for Post Formats.
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'base_wp_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
    // slider image.
    add_image_size( 'img-slider', 480, 220, true ); // (cropped)
}
endif; // base_wp_setup
add_action( 'after_setup_theme', 'base_wp_setup' );

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
if ( is_admin() ) {
    require get_template_directory() . '/core-framework/welcome/welcome-screen.php';
}
require get_template_directory() . '/core-framework/widgets/social-widget.php';
require get_template_directory() . '/core-framework/widgets/recent-posts-widget.php';
require get_template_directory() . '/core-framework/widgets/adsense-widget.php';

//Loads the Options Panel
require get_template_directory() . '/core-framework/options/options-framework.php';
// Loads options.php from child or parent theme
require get_template_directory() . '/options.php';


/*-----------------------------------------------
 * Woocommerce support.
 -----------------------------------------------*/
add_theme_support( 'woocommerce' );
