<?php
/**
 * Big Blue functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Big Blue
 */

if ( ! function_exists( 'big_blue_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function big_blue_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Big Blue, use a find and replace
	 * to change 'big-blue' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'big-blue', get_template_directory() . '/languages' );

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
	add_editor_style();
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'big-blue-small-thumbnail',  100, 100, true );
	add_image_size( 'big-blue-featured-thumbnail',  600, 400, true );
	add_image_size( 'big-blue-widget-post-thumb',  100, 100, true );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'big-blue' ),
		'social'	=> esc_html__( 'Social Icons', 'big-blue' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'big_blue_custom_background_args', array(
		'default-color' => '001627',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'big_blue_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function big_blue_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'big_blue_content_width', 640 );
}
add_action( 'after_setup_theme', 'big_blue_content_width', 0 );

$args = array(
	'width'         => 1200,
	'height'        => 300,
);
add_theme_support( 'custom-header', $args );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function big_blue_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'big-blue' ),
		'id'            => 'big-blue-sidebar-1',
		'description'   => __( 'Main Sidebar', 'big-blue' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'Footer One', 'big-blue' ),
		'id' => 'big-blue-footer-one-widget',
		'description'   => __( 'Footer first column widget', 'big-blue' ),
		'before_widget' => '<div id="footer-one" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Two', 'big-blue' ),
		'id' => 'big-blue-footer-two-widget',
		'description'   => __( 'Footer second column widget', 'big-blue' ),
		'before_widget' => '<div id="footer-two" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Three', 'big-blue' ),
		'id' => 'big-blue-footer-three-widget',
		'description'   => __( 'Footer third column widget', 'big-blue' ),
		'before_widget' => '<div id="footer-three" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
}
add_action( 'widgets_init', 'big_blue_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function big_blue_scripts() {
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() .'/assets/css/prettyPhoto.css' );
	wp_enqueue_style('big-blue-google-fonts', '//fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700,700i,800,900|family=Lato:700"');
	wp_enqueue_style( 'big-blue-ie', get_stylesheet_directory_uri() . "/assets/css/ie.css", array()  );
	wp_style_add_data( 'big-blue-ie', 'conditional', 'IE' );
	wp_enqueue_style( 'big-blue-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') );
	wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.min.js', array('jquery'));
	wp_enqueue_script( 'big-blue-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'big-blue-ie-responsive-js', get_template_directory_uri() . '/js/ie-responsive.min.js', array() );
	wp_script_add_data( 'big-blue-ie-responsive-js', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'big-blue-ie-shiv', get_template_directory_uri() . "/js/html5shiv.min.js");
	wp_script_add_data( 'big-blue-ie-shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'big-blue-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'big-blue-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	$big_blue_carousel_speed = 6000;
	if ( get_theme_mod( 'big_blue_featured_carousel_speed_setting' ) ) {
		$big_blue_carousel_speed = get_theme_mod( 'big_blue_featured_carousel_speed_setting' ) ;
	}
	wp_localize_script( "big-blue-custom-js", "big_blue_carousel_speed", array('vars' => $big_blue_carousel_speed) );
	
	$big_blue_slider_speed = 6000;
	if ( get_theme_mod( 'big_blue_slider_speed_setting' ) ) {
		$big_blue_slider_speed = get_theme_mod( 'big_blue_slider_speed_setting' ) ;
	}
	wp_localize_script( "big-blue-custom-js", "big_blue_slider_speed", array('vars' => $big_blue_slider_speed) );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'big_blue_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


/**
 * Implement the Custom Widget.
 */
require get_template_directory() . '/inc/widget.php';

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
