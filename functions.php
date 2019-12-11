<?php
/**
 * Nha Moc functions and definitions.
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bayn Lite
 */

if ( ! function_exists( 'bayn_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bayn_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Nha Moc, use a find and replace
		 * to change 'bayn-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bayn-lite', get_template_directory() . '/languages' );

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
		set_post_thumbnail_size( 374, 224, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Header', 'bayn-lite' ),
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
		add_theme_support( 'custom-background', apply_filters( 'bayn_lite_custom_background_args', array(
			'default-color' => 'ffffff',
		) ) );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for custom logo.
		add_theme_support( 'custom-logo' );
	}
endif;
add_action( 'after_setup_theme', 'bayn_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bayn_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bayn_lite_content_width', 800 );
}

add_action( 'after_setup_theme', 'bayn_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bayn_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bayn-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'bayn-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'bayn-lite' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Widgets in this area will be shown on the footer.', 'bayn-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'bayn_lite_widgets_init' );

/**
 * Getter function for Featured Content.
 *
 * @return array An array of WP_Post objects.
 */
function bayn_lite_get_featured_posts() {
	return apply_filters( 'bayn_lite_get_featured_posts', array() );
}

/**
 * Register custom fonts.
 */
function bayn_lite_fonts_url() {
	$fonts   = array();

	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'bayn-lite' ) ) {
		$fonts[] = 'Roboto:300,400,400i,500,500i,700,700i';
	}

	$query_args = array(
		'family' => rawurlencode( implode( '|', $fonts ) ),
	);
	$fonts_url  = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function bayn_lite_scripts() {
	wp_enqueue_style( 'bayn-fonts', bayn_lite_fonts_url() );
	wp_enqueue_style( 'bayn-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bayn-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'bayn-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_front_page() && ! is_home() ) {
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', array( 'jquery' ), '1.8.0', true );
	}
	wp_enqueue_script( 'bayn-script', get_template_directory_uri() . '/js/script.js', '', '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'bayn_lite_scripts' );

/**
 * Add editor style.
 */
function bayn_lite_add_editor_styles() {
	add_editor_style( array(
		'editor-style.css',
		bayn_lite_fonts_url(),
	) );
}

add_action( 'init', 'bayn_lite_add_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * TGM class.
 */
require get_template_directory() . '/inc/admin/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/admin/plugins.php';

/**
 * Load dashboard
 */
require get_template_directory() . '/inc/dashboard/class-bayn-lite-dashboard.php';
$dashboard = new Bayn_Lite_Dashboard();

require get_template_directory() . '/inc/customizer-pro/class-bayn-lite-customizer-pro.php';
$customizer_pro = new Bayn_Lite_Customizer_Pro();
$customizer_pro->init();

/**
 * Style gutenberg
 */
function bayn_lite_style_editor_gutenberg() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'bayn-fonts', bayn_lite_fonts_url() );
	wp_enqueue_style( 'style-editor', get_theme_file_uri( '/style-editor.css' ), false );
}
add_action( 'enqueue_block_editor_assets', 'bayn_lite_style_editor_gutenberg' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
