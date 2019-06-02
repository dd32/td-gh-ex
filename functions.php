<?php
/**
 * Acuarela functions and definitions
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
 * @package Acuarela
 * @since Acuarela 1.0
 *
 * @uses acuarela_header_style() to style front-end.
 */

/**
 * Acuarela only works in WordPress 4.9 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.9', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'acuarela_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Acuarela 1.0
	 */
	function acuarela_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Acuarela, use a find and replace
		 * to change 'acuarela' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'acuarela', get_template_directory() . '/languages' );

		// Add theme support for Custom Header.
		add_theme_support( 'custom-header', array(
			'default-text-color' => '004c73',
			'width' => 1920,
			'height' => 300,
			'header-text' => true,
			'wp-head-callback' => 'acuarela_header_style',
		) );

		// Add theme support for Custom Background.
		add_theme_support( 'custom-background', array(
			'default-color'			=> 'f2f2f2',
			'default-image'			=> get_theme_file_uri() . '/images/acuarela.png',
			'default-size'			=> 'cover',
			'default-repeat'		=> 'no-repeat',
			'default-attachment'	=> 'fixed',
		) );

		// Add theme support for Custom Logo.
		add_theme_support( 'custom-logo', array(
			'width'		=> 400,
			'height'	=> 100,
			'flex-width'	=> true,
			'flex-height'	=> false,
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

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 960, 540, true );

		// This theme uses wp_nav_menu() in three locations.
		register_nav_menus( array(
			'primary' 	=> __( 'Primary Menu', 'acuarela' ),
			'social' 	=> __( 'Social Links Menu', 'acuarela' ),
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
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
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
		add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', acuarela_fonts_url(), ) );

		add_theme_support( 'editor-styles' );
	}
endif; // acuarela_setup.
add_action( 'after_setup_theme', 'acuarela_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Acuarela 1.0
 */
function acuarela_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'acuarela_content_width', 960 );
}
add_action( 'after_setup_theme', 'acuarela_content_width', 0 );

/**
 * Register widget area.
 *
 * @since Acuarela 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function acuarela_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Area', 'acuarela' ),
		'id'            => 'sidebar',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'acuarela' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'First Footer Area', 'acuarela' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your first footer area.', 'acuarela' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Second Footer Area', 'acuarela' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your second footer area.', 'acuarela' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Third Footer Area', 'acuarela' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your third footer area.', 'acuarela' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'acuarela_widgets_init' );

if ( ! function_exists( 'acuarela_fonts_url' ) ) :
	/**
	 * Register Google fonts for Acuarela.
	 *
	 * @since Acuarela 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function acuarela_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Lato, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Lato font: on or off', 'acuarela' ) ) {
			$fonts[] = 'Lato:300italic,400italic,700italic,300,400,700';
		}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Open Sans, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'acuarela' ) ) {
			$fonts[] = 'Open Sans:300italic,400italic,700italic,300,400,700';
		}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'acuarela' ) ) {
			$fonts[] = 'Source Sans Pro:300italic,400italic,700italic,300,400,700';
		}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Source Serif Pro, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Source Serif Pro font: on or off', 'acuarela' ) ) {
			$fonts[] = 'Source Serif Pro:400,600,700';
		}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Arima Madurai, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Arima Madurai font: on or off', 'acuarela' ) ) {
			$fonts[] = 'Arima Madurai:800,900';
		}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Cinzel Decorative, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Cinzel Decorative font: on or off', 'acuarela' ) ) {
			$fonts[] = 'Cinzel Decorative:700';
		}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'acuarela' ) ) {
			$fonts[] = 'Inconsolata:400,700';
		}

		/*
		 * Translators: To add an additional character subset specific to your language,
		 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'acuarela' );

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
 * @since Acuarela 1.0
 */
function acuarela_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'acuarela-fonts', acuarela_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_theme_file_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Load our main stylesheet.
	wp_enqueue_style( 'acuarela-style', get_stylesheet_uri() );

	// Load the JavaScript functions.
	wp_enqueue_script( 'acuarela-script', get_theme_file_uri() . '/js/functions.js', array( 'jquery' ), '20150315', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'acuarela-script', 'acuarelaScreenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'acuarela' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'acuarela' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'acuarela_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Acuarela 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function acuarela_body_classes( $classes ) {
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
add_filter( 'body_class', 'acuarela_body_classes' );

/**
 * Custom template tags for this theme.
 */
require get_theme_file_path() . '/inc/template-tags.php';
/**
 * Customizer additions.
 */
require get_theme_file_path() . '/inc/customizer.php';
require get_theme_file_path() . '/inc/custom-header.php';

