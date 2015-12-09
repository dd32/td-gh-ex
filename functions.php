<?php
/**
 * AZA Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aza-lite
 */

if ( ! function_exists( 'aza_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aza_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AZA Theme, use a find and replace
	 * to change 'aza-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'aza-lite', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'aza-lite' ),
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
//		'image',
//		'video',
//		'quote',
//		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'aza_custom_background_args', array(
		'default-color' => '#ffffff',
		'default-image' => get_template_directory_uri().'/images/background.jpg',
	) ) );


}
endif; // aza_setup
add_action( 'after_setup_theme', 'aza_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aza_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aza_content_width', 640 );
}
add_action( 'after_setup_theme', 'aza_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aza_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'aza-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__('Footer left widget', 'aza-lite'),
		'id'            => 'home_footer_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__('Footer center widget', 'aza-lite'),
		'id'            => 'home_footer_2',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__('Footer left widget', 'aza-lite'),
		'id'            => 'home_footer_3',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'aza_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aza_scripts() {

    wp_enqueue_style( 'aza-bootstrap-style', aza_get_file( '/css/bootstrap.min.css'), array(), '3.3.1');

    wp_enqueue_style( 'aza-stamp-icons', aza_get_file('/stamp-icons.css'));

    wp_enqueue_style( 'aza-style', get_stylesheet_uri() );

    wp_enqueue_style( 'aza-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:400,700|Homemade+Apple');

		wp_enqueue_script( 'aza-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

		wp_enqueue_script( 'aza-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    wp_enqueue_script( 'aza-bootstrap', aza_get_file('/js/bootstrap.min.js'), array(), '3.3.5', true );

		wp_enqueue_script( 'aza-custom-all', aza_get_file('/js/custom.all.js'), array('jquery'), '2.0.2', true );

    wp_enqueue_script( 'aza-parallax-scroll', aza_get_file('/js/parallax-scroll.js'), array('jquery'), '1.0.0', true );

    wp_enqueue_script( 'aza-jquery-knobs', aza_get_file('/js/jquery.knob.js'), array('jquery'), '1.0.0', true );

    wp_enqueue_script( 'aza-script', aza_get_file('/js/script.js'), array('jquery'), '1.0.0', true );

    wp_localize_script( 'aza-custom-all', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'aza-lite' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'aza-lite' ) . '</span>',
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aza_scripts' );

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

// Enqueue admin styles and scripts

function aza_admin_styles() {
		wp_register_style ('aza_admin_stylesheet', get_template_directory_uri() . '/css/admin/admin-style.css', NULL, NULL, 'all' );
		wp_enqueue_style( 'aza_admin_stylesheet');

		wp_register_script( 'aza_admin_customizer_script', get_template_directory_uri() . '/js/admin/aza_admin_customizer.js', array( 'jquery' ), NULL, true );
		wp_enqueue_script( 'aza_admin_customizer_script', get_file('/js/aza_admin_customizer.js'), array("jquery","jquery-ui-draggable"),'1.0.0', true  );
}
add_action( 'customize_controls_print_styles', 'aza_admin_styles');


// Get File Custom

function aza_get_file($file){
	$file_parts = pathinfo($file);
	$accepted_ext = array('jpg','img','png','css','js');
	if( in_array($file_parts['extension'], $accepted_ext) ){
		$file_path = get_stylesheet_directory() . $file;
		if ( file_exists( $file_path ) ){
			return esc_url(get_stylesheet_directory_uri() . $file);
		} else {
			return esc_url(get_template_directory_uri() . $file);
		}
	}
}


// Get File

function get_file($file){
	$file_parts = pathinfo($file);
	$accepted_ext = array('jpg','img','png','css','js');
	if( in_array($file_parts['extension'], $accepted_ext) ){
		$file_path = get_stylesheet_directory() . $file;
		if ( file_exists( $file_path ) ){
			return esc_url(get_stylesheet_directory_uri() . $file);
		} else {
			return esc_url(get_template_directory_uri() . $file);
		}
	}
}


// Register menus

function register_my_menus() {
  register_nav_menus(
      array(
          'footer-menu-1' => __( 'Footer Menu', 'aza-lite'),
      ));
}
add_action( 'init', 'register_my_menus' );
