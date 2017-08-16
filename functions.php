<?php
/**
 * fmi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fmi
 */

if ( ! function_exists( 'fmi_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fmi_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fmi, use a find and replace
		 * to change 'fmi' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fmi', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'fmi' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'fmi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fmi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fmi_content_width', 645 );
}
add_action( 'after_setup_theme', 'fmi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fmi_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'fmi' ),
		'id'            => 'fmi_right_sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'fmi' ),
		'id'            => 'fmi_left_sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name' 			=> __( 'Footer Sidebar One', 'fmi' ),
		'id' 			=> 'fmi_footer_sidebar_one',
		'description'   => __( 'Shows widgets at footer sidebar one.', 'fmi' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>'
	) );
	register_sidebar( array(
		'name' 			=> __( 'Footer Sidebar Two', 'fmi' ),
		'id' 			=> 'fmi_footer_sidebar_two',
		'description'   => __( 'Shows widgets at footer sidebar two.', 'fmi' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>'
	) );
	register_sidebar( array(
		'name' 			=> __( 'Footer Sidebar Three', 'fmi' ),
		'id' 			=> 'fmi_footer_sidebar_three',
		'description'   => __( 'Shows widgets at footer sidebar three.', 'fmi' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>'
	) );
}
add_action( 'widgets_init', 'fmi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fmi_scripts() {
	wp_enqueue_style( 'fmi-style', get_stylesheet_uri() );

	wp_enqueue_script( 'fmi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'fmi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_style( 'fmi-font-awesome',get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css',array() );
	wp_enqueue_style( 'fmi-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic',array() );
	wp_enqueue_script( 'fmi-fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', array('jquery'), '' );
	wp_enqueue_script( 'fmi_fitvids_doc_ready', get_template_directory_uri() . '/js/fitvids-doc-ready.js', array('jquery'), '' );
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array(), '' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'fmi-basejs', get_template_directory_uri().'/js/custom.js', array('jquery'), '' );
}
add_action( 'wp_enqueue_scripts', 'fmi_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-comments.php';

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
