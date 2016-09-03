<?php
/**
 * beam functions and definitions
 *
 * @package beam
 */


if ( ! function_exists( 'beam_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */

function beam_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'beam', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	
	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 */
	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions, cropped
		// additional image sizes
        add_image_size( 'beam-small-thumbnail', 80, 80, true ); 
		add_image_size( 'beam-big-thumbnail', 600, 220); 
		add_image_size( 'beam-large-thumbnail', 720, 340 ); 
	}


	/**
	* This theme uses wp_nav_menu() in two locations.
	*/
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'beam' ),
		'footer' => __( 'Footer Menu', 'beam' ),
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
	
	// Enable support for Custom Logo
    add_theme_support('custom-logo');

	
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'beam_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
}
endif; // beam_setup
add_action( 'after_setup_theme', 'beam_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function beam_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'beam_content_width', 1170 );
}
add_action( 'after_setup_theme', 'beam_content_width', 0 );


/**
 * Register widgetized area and update sidebar with default widgets
 */
function beam_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Right', 'beam' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'beam' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Home', 'beam' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );	

	register_sidebar( array(
		'name'          => __( 'Footer Widget', 'beam' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'beam_widgets_init' );


/**
 * Enqueue Scripts
 */
function beam_scripts() {
	wp_enqueue_script( 'beam-js-scripts', get_template_directory_uri() . '/js/beam-scripts.min.js', array('jquery'), '20160817', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'beam_scripts' );


/**
 * Enqueue Styles
 */
function beam_styles() 
{
	wp_enqueue_style( 'style', get_stylesheet_uri() );
    //wp_enqueue_style( 'beam-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), '4.0.3' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/inc/fonts/css/font-awesome.min.css' ); // Local
}
add_action( 'wp_enqueue_scripts', 'beam_styles' ); 


/**
 * Add Kirki Toolkit
 */
if( ! class_exists('Kirki') ) {
	include_once( dirname( __FILE__ ) . '/inc/adm/kirki/kirki.php' );
}
require_once('options-config.php');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
 * Load content-one content
 * Used in Include One template
 * to-do: check if template actually being used
 */ 
function beam_load_content_one($path) {
        $post = get_page_by_path($path);
        $content = apply_filters('the_content', $post->post_content);
        echo $content;
}

/**
 * Plugin Recommendation
 */
include_once( dirname( __FILE__ ) . '/inc/adm/tgm/install.php' );