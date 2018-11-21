<?php
/**
 * Absolutte functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Absolutte
 */

if ( ! function_exists( 'absolutte_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
    function absolutte_setup() {

        /*
         * Defines Constant
         */
        $absolutte_theme_data = wp_get_theme();
        define( 'absolutte_THEME_NAME', $absolutte_theme_data['Name'] );
        define( 'absolutte_THEME_VERSION', $absolutte_theme_data['Version'] );

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Absolutte, use a find and replace
         * to change 'absolutte' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'absolutte', get_template_directory() . '/languages' );

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

        //Blog
        add_image_size( 'absolutte_post', 456, 256, true );
        add_image_size( 'absolutte_post_wide', 780, 334, true );
        add_image_size( 'absolutte_post_single', 953, 9999, false );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary'     => esc_html__( 'Primary Menu', 'absolutte' ),
            'social'      => esc_html__( 'Social Menu', 'absolutte' ),
            'footer-menu' => esc_html__( 'Footer Menu', 'absolutte' ),
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

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'absolutte_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add Logo support
        add_theme_support( 'custom-logo', array(
            'height'      => 40,
            'width'       => 110,
            'flex-height' => true,
            'flex-width'  => true,
        ) );

        // Gutenberg
        add_theme_support( 'align-wide' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support(
            'editor-color-palette', array(
                array(
                    'name'  => esc_html__( 'Black', 'absolutte' ),
                    'slug'  => 'black',
                    'color' => '#2a2a2a',
                ),
                array(
                    'name'  => esc_html__( 'Gray', 'absolutte' ),
                    'slug'  => 'gray',
                    'color' => '#727477',
                ),
            )
        );

    }
endif; // absolutte_setup
add_action( 'after_setup_theme', 'absolutte_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function absolutte_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'absolutte_content_width', 780 );
}
add_action( 'after_setup_theme', 'absolutte_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function absolutte_widgets_init() {

    require get_template_directory() . '/inc/widget-areas/widget-areas.php';

}
add_action( 'widgets_init', 'absolutte_widgets_init' );

/**
 * Register widgets.
 *
 * @link https://codex.wordpress.org/Widgets_API
 */
function absolutte_widgets_register() {

    require get_template_directory() . '/inc/widgets/contact-info.php';

}
add_action( 'widgets_init', 'absolutte_widgets_register' );

/**
 * Enqueue scripts and styles.
 */
function absolutte_scripts() {

    /**
     * Enqueue Stylesheets
     */
    require get_template_directory() . '/inc/scripts/stylesheets.php';

    /**
     * Enqueue Scripts
     */
    require get_template_directory() . '/inc/scripts/scripts.php';

}
add_action( 'wp_enqueue_scripts', 'absolutte_scripts' );

/**
 * Custom CSS generated by the Theme.
 */
require get_template_directory() . '/inc/scripts/styles.php';

/**
 * Admin Styles
 *
 * Enqueue styles to the Admin Panel.
 */
function absolutte_wp_admin_style() {
    $current_screen = get_current_screen();

    if ( "appearance_page_absolutte_theme-info" == $current_screen->id || 'page' == $current_screen->id || 'post' == $current_screen->id || 'customize' == $current_screen->id ) {

        wp_register_style( 'absolutte_custom_wp_admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'absolutte_custom_wp_admin_css' );

    }
}
add_action( 'admin_enqueue_scripts', 'absolutte_wp_admin_style' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Extras
 *
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer
 *
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Jetpack
 *
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Theme Functions
 *
 * Add Theme Functions
 */

// Custom Header
require get_template_directory() . '/inc/theme-functions/custom-header.php';

// TGM Plugin Activation
require get_template_directory() . '/inc/theme-functions/ql_tgm_plugin_activation.php';

// Theme Info Page
require get_template_directory() . '/inc/theme-functions/theme-info-page.php';

// AJAX Functions
require get_template_directory() . '/inc/theme-functions/ajax-functions.php';

// Meta Boxes
require get_template_directory() . '/inc/theme-functions/meta-boxes-registration.php';

// Retina Logo
require get_template_directory() . '/inc/theme-functions/retina-logo.php';

// Demo Import Data
require get_template_directory() . '/inc/theme-functions/demo-import-data.php';

// Menu Walker
require get_template_directory() . '/inc/theme-functions/menu-walker.php';
