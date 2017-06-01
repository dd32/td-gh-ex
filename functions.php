<?php
/**
 * basicstore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package basicstore
 */

if ( ! function_exists( 'basic_store_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function basic_store_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on basic_store, use a find and replace
	 * to change 'basic_store' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'basicstore', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary-left' => esc_html__( 'Primary Left', 'basicstore' ),
		'primary-right' => esc_html__( 'Primary Right', 'basicstore' ),
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

	// Add theme support for custom logo
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 200,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Declare WooCommerce support
	add_theme_support( 'woocommerce' );

	// WooCommerce gallery support
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}
endif;
add_action( 'after_setup_theme', 'basic_store_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function basic_store_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'basic_store_content_width', 640 );
}
add_action( 'after_setup_theme', 'basic_store_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function basic_store_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'basicstore' ),
		'id'            => 'sidebar-site',
		'description'   => esc_html__( 'Add widgets here to display on site pages', 'basicstore' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'basicstore' ),
		'id'            => 'sidebar-shop',
		'description'   => esc_html__( 'Add widgets here to display on shop pages', 'basicstore' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'basicstore' ),
		'id'            => 'sidebar-footer',
		'description'   => __( 'Add widgets here.', 'basicstore' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'basic_store_widgets_init' );


// Bootstrap row-count for some widgets
function basic_store_widgets_count($params) {

  $sidebar_id = $params[0]['id'];

	/* Footer */
	if ( $sidebar_id == 'sidebar-footer' ) {
    $total_widgets = wp_get_sidebars_widgets();
    $sidebar_widgets = count($total_widgets[$sidebar_id]);
    $params[0]['before_widget'] = str_replace('class="', 'class="col-md-' . floor(12 / $sidebar_widgets) . ' ', $params[0]['before_widget']);
  }
  return $params;
}

add_filter('dynamic_sidebar_params','basic_store_widgets_count');


/**
 * Enqueue scripts and styles.
 */
function basic_store_scripts() {

	wp_enqueue_style( 'basicstore-style', get_stylesheet_uri() );

	wp_enqueue_script( 'basicstore-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.min.js', array(), '', true );

	wp_enqueue_script( 'basicstore-bootstrap-tabcollapse', get_template_directory_uri() . '/assets/js/bootstrap-tabcollapse.js', array(), '', true );

	wp_enqueue_script( 'basicstore-script', get_template_directory_uri() . '/assets/js/theme.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'basic_store_scripts' );


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
 * Register Custom Navigation Walker
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
 * Register Custom Bootstrap Pagination
 */
require get_template_directory() . '/inc/wp-bootstrap-pagination.php';

/**
 * Load WooCommerce functions
 */
require get_template_directory() . '/inc/woocommerce.php';
