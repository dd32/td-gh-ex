<?php
/**
 * Aguafuerte functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
*
 * @uses aguafuerte_header_style() to style front-end.
 */


/**
 * Aguafuerte only works in WordPress 4.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'aguafuerte_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Aguafuerte 1.0.2
 */
function aguafuerte_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Aguafuerte, use a find and replace
	 * to change 'aguafuerte' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'aguafuerte', get_template_directory() . '/languages' );

	// Add theme support for Custom Header.
	add_theme_support( 'custom-header', array(
		'default-text-color' => '9f0000',
		'width' => 1920,
		'height' => 300,
		'wp-head-callback' => 'aguafuerte_header_style',
		) );

	// Add theme support for Custom Background
	add_theme_support( 'custom-background', array(
		'default-color' => 'fdffff',
		) );
	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 100,
		'height'      => 25,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array ( 'site-title', 'site-description' ),
		) );

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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 960, 540, true );
	

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'aguafuerte' ),
		'social'  => __( 'Social Links Menu', 'aguafuerte' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * Add support for selective refresh of widget sidebars in the Customizer.
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', aguafuerte_fonts_url() ) );
}
endif; // aguafuerte_setup
add_action( 'after_setup_theme', 'aguafuerte_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Aguafuerte 1.0.2
 */
function aguafuerte_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aguafuerte_content_width', 825 );
}
add_action( 'after_setup_theme', 'aguafuerte_content_width', 0 );

/**
 * Register widget area.
 *
 * @since Aguafuerte 1.0.2
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function aguafuerte_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Area', 'aguafuerte' ),
		'id'            => 'sidebar',
		'description'   => __( 'Add widgets here to appear in your first sidebar.', 'aguafuerte' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'First Footer Area', 'aguafuerte' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your first footer area.', 'aguafuerte' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Second Footer Area', 'aguafuerte' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your second footer area.', 'aguafuerte' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Third Footer Area', 'aguafuerte' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your third footer area.', 'aguafuerte' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'aguafuerte_widgets_init' );

if ( ! function_exists( 'aguafuerte_fonts_url' ) ) :
/**
 * Register Google fonts for Aguafuerte.
 *
 * @since Aguafuerte 1.0.2
 *
 * @return string Google fonts URL for the theme.
 */
function aguafuerte_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'aguafuerte' ) ) {
		$fonts[] = 'Lato:300italic,400italic,700italic,900italic,300,400,700,900';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Bitter, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Bitter font: on or off', 'aguafuerte' ) ) {
		$fonts[] = 'Bitter:400italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'aguafuerte' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Rochester, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Rochester font: on or off', 'aguafuerte' ) ) {
		$fonts[] = 'Rochester:400';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Delius, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Delius font: on or off', 'aguafuerte' ) ) {
		$fonts[] = 'Delius:400';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Delius Swash Caps, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Delius Swash Caps font: on or off', 'aguafuerte' ) ) {
		$fonts[] = 'Delius Swash Caps:400';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'aguafuerte' ) ) {
		$fonts[] = 'Source Sans Pro:400italic,600italic,400,600';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'aguafuerte' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
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
 * Enqueue scripts and styles for the front end.
 *
 * @since Aguafuerte 1.0.2
 */
function aguafuerte_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'aguafuerte-fonts', aguafuerte_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Load our main stylesheet.
	wp_enqueue_style( 'aguafuerte-style', get_stylesheet_uri() );

	// Load the JavaScript functions.
	wp_enqueue_script( 'aguafuerte-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150315', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Translate accesibility menues.
	wp_localize_script( 'aguafuerte-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'aguafuerte' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'aguafuerte' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'aguafuerte_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Aguafuerte 1.0.2
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function aguafuerte_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'aguafuerte_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @since Aguafuerte 1.0.2
 *
 * @param array $classes Classes for the post element.
 * @return array (Maybe) filtered post classes.
 */
function aguafuerte_post_classes( $classes ) {
	// Adds a class of post-format to post with special formats (chat, aside, etc).
	if ( get_post_format() ) {
		$classes[] = 'post-format';
	}

	if ( post_password_required() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'aguafuerte_post_classes' );	

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-header.php';

