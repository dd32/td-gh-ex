<?php
/*It is underscores functions.php file and its modification*/
if ( ! function_exists( 'acmephoto_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function acmephoto_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Acmephoto, use a find and replace
         * to change 'acmephoto' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'acmephoto', get_template_directory() . '/languages' );

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
        * Enable support for custom logo.
        *
        *  @since AcmePhoto 1.0.0
         */
        add_theme_support( 'custom-logo', array(
            'flex-height' => true,
            'flex-width' => true
        ) );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'acmephoto' ),
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
        add_theme_support( 'custom-background', apply_filters( 'acmephoto_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
    }
endif; // acmephoto_setup
add_action( 'after_setup_theme', 'acmephoto_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function acmephoto_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'acmephoto_content_width', 640 );
}
add_action( 'after_setup_theme', 'acmephoto_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function acmephoto_scripts() {
    /*owl css*/
    wp_enqueue_style( 'jquery-owl', get_template_directory_uri() . '/assets/library/owl-carousel/owl.carousel.css', array(), '1.3.3' );

    /*google font */
    wp_enqueue_style( 'acmephoto-googleapis', '//fonts.googleapis.com/css?family=Montserrat:400,700|Source+Sans+Pro:400,600', array(), '1.0.0' );

    /*Font-Awesome-master*/
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/library/Font-Awesome/css/font-awesome.min.css', array(), '4.5.0' );

    /*custom-css*/
    wp_enqueue_style( 'acmephoto-style', get_stylesheet_uri() );

    /*jquery start*/
    /*html5shiv*/
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/assets/library/html5shiv/html5shiv.min.js', array('jquery'), '3.7.3', false);
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    /*respond js*/
    wp_enqueue_script('respond', get_template_directory_uri() . '/assets/library/respond/respond.min.js', array('jquery'), '1.1.2', false);
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

    /*bxslider js*/
    wp_enqueue_script('jquery-owl', get_template_directory_uri() . '/assets/library/owl-carousel/owl.carousel.min.js', array('jquery'), '1.3.3', 1);

    /*masonry js*/
    wp_enqueue_script( 'masonry' );
    
    /*custom-js*/
    wp_enqueue_script('acmephoto-custom', get_template_directory_uri() . '/assets/js/acmephoto-custom.js', array('jquery'), '1.0.1', 1);
    global $wp_query;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    $max_num_pages = $wp_query->max_num_pages;

    wp_localize_script( 'acmephoto-custom', 'acmephoto_ajax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'paged'     => $paged,
        'max_num_pages'      => $max_num_pages,
        'next_posts'      => next_posts( $max_num_pages, false ),
        'show_more'      => __( 'Show More', 'acmephoto' ),
        'no_more_posts'        => __( 'No More', 'acmephoto' ),
    ));

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'acmephoto_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function acmephoto_admin_scripts( $hook ) {

    if ( 'widgets.php' == $hook ) {
        wp_enqueue_media();
        wp_enqueue_script( 'acmephoto-widgets-script', get_template_directory_uri() . '/assets/js/acme-widget.js', array( 'jquery' ), '1.0.0' );
    }

}
add_action( 'admin_enqueue_scripts', 'acmephoto_admin_scripts' );

/**
 * Custom template tags for this theme.
 */
$acmephoto_template_tags_file_path = acmephoto_file_directory('acmethemes/core/template-tags.php');
require $acmephoto_template_tags_file_path;

/**
 * Custom functions that act independently of the theme templates.
 */
$acmephoto_extras_file_path = acmephoto_file_directory('acmethemes/core/extras.php');
require $acmephoto_extras_file_path;