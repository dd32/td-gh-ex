<?php
/**
 * Functions and definitions
 *
 * @package Fmi
 */

if (!function_exists('vs_setup')) {
  function vs_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain('fmi', get_template_directory().'/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'primary' => esc_html__('Primary', 'fmi'),
      'footer' => esc_html__('Footer', 'fmi')
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
      'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('vs_custom_background_args', array(
      'default-color' => 'f8f8f8',
      'default-image' => '',
    )) );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo.
    add_theme_support('custom-logo', array(
      'height' => 60,
      'width' => 60,
      'flex-width' => true,
    ));
  }
}
add_action('after_setup_theme', 'vs_setup');

/**
 * Assets.
 */
require get_template_directory() . '/inc/assets.php';

/**
 * Custom template widgets for this theme.
 */
require get_template_directory() . '/inc/widgets-init.php';

/**
 * Filters.
 */
require get_template_directory() . '/inc/filters.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-comments.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom post meta function.
 */
require get_template_directory() . '/inc/post-meta.php';

/**
 * Customizer functions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Sanitize functions.
 */
require get_template_directory() . '/inc/sanitize.php';

/**
 * Inline styles.
 */
require get_template_directory() . '/inc/inline-styles.php';

/**
 * Actions.
 */
require get_template_directory() . '/inc/actions.php';

/**
 * Partials.
 */
require get_template_directory() . '/inc/partials.php';

/**
 * Meta Boxes.
 */
require get_template_directory() . '/inc/meta-box.php';
