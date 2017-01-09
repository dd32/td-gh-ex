<?php
/**
 * bassist functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bassist
 */

/**
 * Bassist only works in WordPress 4.5 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.5', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'bassist_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bassist_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bassist, use a find and replace
	 * to change 'bassist' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bassist', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'bassist' ),
		'social' => esc_html__( 'Social Links Menu', 'bassist' ),
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

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'css/font-awesome.css', bassist_fonts_url() ) );

	// Add theme support for Custom Header
	add_theme_support( 'custom-header', array(
		'default-image'          => '',
		'default-text-color' => '000000',
		'width' => 1920,
		'height' => 112,
		'header-text' => true,
		'wp-head-callback' => 'bassist_header_style',
		) );

	// Add theme support for Custom Background
	add_theme_support( 'custom-background', array(
		'default-color' => 'f2f2ef',
		) );

	// Add theme support for Custom Logo
	add_theme_support( 'custom-logo', array(
		'width'       => 100,
		'height'      => 100,
		'flex-width'  => true,
		'flex-height' => false,
		) );
}
endif;
add_action( 'after_setup_theme', 'bassist_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bassist_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bassist_content_width', 1200 );
}
add_action( 'after_setup_theme', 'bassist_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bassist_widgets_init() {
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar', 'bassist' ),
		'id'			=> 'sidebar-1',
		'description'	=> esc_html__( 'Add widgets here.', 'bassist' ),
		'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h2 class="widget-title">',
		'after_title'	=> '</h2>',
	) );
	register_sidebar(array(
		'name'			=> esc_html__( 'Contact Area', 'bassist' ),
		'id' 			=> 'contact-area',
		'description'	=> esc_html__( 'Add a text widget with the contact form shortcode here.', 'bassist' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="widget-title">',
		'after_title'	=> '</h2>',
	));
}
add_action( 'widgets_init', 'bassist_widgets_init' );

if ( ! function_exists( 'bassist_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own bassist_fonts_url() function to override in a child theme.
 *
 * @since Bassist 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function bassist_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'bassist' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'bassist' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'bassist' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function bassist_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'bassist-fonts', bassist_fonts_url(), array(), null );
	wp_enqueue_style( 'bassist-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bassist-font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_script( 'bassist-scripts', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20151215', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bassist_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Bassist 1.0
 * @param array $classes Classes for the body element.
 * @return array
 */
function bassist_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of front-page if a static front page is selected.
	if ( 'page' === get_option( 'show_on_front' ) && is_front_page() ) {
		$classes[] = 'front-page';
	}

	return $classes;
}
add_filter( 'body_class', 'bassist_body_classes' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Color calculations.
 */
require get_template_directory() . '/inc/color-calculations.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
