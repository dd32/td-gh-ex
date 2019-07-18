<?php

/**
 * aari functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aari
 */
if (!function_exists('aari_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function aari_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on gutenbergtheme, use a find and replace
         * to change 'gutenbergtheme' to the name of your theme in all the template files.
         */
        load_theme_textdomain('aari', get_template_directory() . '/languages');

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

        add_image_size('aari_post_thumb', 750, 400, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => __('Top primary menu', 'aari'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('_s_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 50,
            'width' => 140,
            'flex-width' => false,
            'flex-height' => false,
        ));

        // Adding support for core block visual styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        //add editor style
        add_editor_style();
        add_editor_style(array('css/editor-style.css', aari_fonts_url()));



        // Add support for custom color scheme.
        add_theme_support('editor-color-palette', array(
            array(
                'name' => __('Strong Blue', 'aari'),
                'slug' => 'strong-blue',
                'color' => '#0073aa',
            ),
            array(
                'name' => __('Lighter Blue', 'aari'),
                'slug' => 'lighter-blue',
                'color' => '#229fd8',
            ),
            array(
                'name' => __('Very Light Gray', 'aari'),
                'slug' => 'very-light-gray',
                'color' => '#eee',
            ),
            array(
                'name' => __('Very Dark Gray', 'aari'),
                'slug' => 'very-dark-gray',
                'color' => '#444',
            ),
        ));

        // Add support for responsive embeds.
        add_theme_support('responsive-embeds');
    }

endif;
add_action('after_setup_theme', 'aari_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aari_content_width() {
    $GLOBALS['content_width'] = apply_filters('aari_content_width', 640);
}

add_action('after_setup_theme', 'aari_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aari_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'aari'),
        'id' => 'default-sidebar',
        'description' => esc_html__('Add widgets here.', 'aari'),
        'before_widget' => '<div id="%1$s" class="widget_area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer', 'aari'),
        'id' => 'footer-widget',
        'description' => esc_html__('Add widgets here.', 'aari'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'aari_widgets_init');

/**
 * Register Google Fonts
 */
function aari_fonts_url() {
    $fonts_url = '';

    /*
     * Translators: If there are characters in your language that are not
     * supported by Noto Serif, translate this to 'off'. Do not translate
     * into your own language.
     */
    $notoserif = esc_html_x('on', 'Noto Serif font: on or off', 'aari');

    if ('off' !== $notoserif) {
        $font_families = array();
        $font_families[] = 'Poppins:300,400,400i,500,600,700,800';

        $query_args = array(
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext'),
        );

        $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }

    return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function aari_scripts() {
    wp_enqueue_style('aari-stylesheet', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('aari-blocks-style', get_template_directory_uri() . '/css/blocks.css');
    wp_enqueue_style('aari-bootstrap-style', get_template_directory_uri() . '/css/plugins/bootstrap.min.css');
    wp_enqueue_style('aari-jam-icons', get_template_directory_uri() . '/css/plugins/jam-icons.min.css');
    wp_enqueue_style('aari-animate', get_template_directory_uri() . '/css/plugins/animate.css');
    wp_enqueue_style('aari-main-style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('aari-fonts', aari_fonts_url());
    wp_enqueue_script('aari-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true);
    wp_enqueue_script('aari-sticky', get_template_directory_uri() . '/js/sticky-sidebar.min.js', array('jquery'), '3.3.1', true);
    wp_enqueue_script('aari-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('aari-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    wp_enqueue_script('aari-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'aari_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}


/**
 * bootstrap navwalker
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Comments Walker
 */
require get_template_directory() . '/inc/aari_walker_comment.php';

/**
 * search form
 */
require get_template_directory() . '/inc/search-form.php';


/**
 * customizer functions
 */
require get_template_directory() . '/inc/customizer-functions.php';
