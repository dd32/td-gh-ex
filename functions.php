<?php
/**
 * Aamla theme functions and definitions
 *
 * This file defines content width, add theme support for various WordPress
 * features, load required stylesheets and scripts, register menus and widget
 * areas and load other required files to extend theme functionality.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aamla
 * @since 1.0.0
 */

/**
 * Aamla only works with WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_parent_theme_file_path( '/blackbox/wp-backcompat.php' );
	return;
}

/**
 * Register theme features.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * @since 1.0.0
 */
function aamla_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'aamla' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 640, 480, false );
	add_image_size( 'aamla-image', 1100, 9999, false );

	// Set the default content width.
	$GLOBALS['content_width'] = 1100;

	// Allows the use of valid HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'image',
		'video',
		'quote',
		'gallery',
		'audio',
	) );

	// Add custom styles for visual editor to resemble the theme style.
	add_editor_style( array( 'assets/admin/css/editor-style.css', aamla_font_url() ) );

	/**
	 * Filter navigation menu locations.
	 *
	 * @since 1.0.0
	 *
	 * @param arrray $locations Associative array of menu location identifiers (like a slug) and descriptive text.
	 */
	$locations = apply_filters( 'aamla_nav_menus', array(
		'primary' => esc_html__( 'Primary', 'aamla' ),
	) );

	// Register nav menu locations.
	register_nav_menus( $locations );

	/**
	 * Filter custom background args.
	 *
	 * @since 1.0.0
	 *
	 * @param arrray $bg_args Array of extra arguments for custom background.
	 */
	$bg_args = apply_filters(
		'aamla_custom_bg_args', array(
			'default-image'          => '',
			'default-preset'         => 'default',
			'default-position-x'     => 'left',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
			'default-repeat'         => 'repeat',
			'default-attachment'     => 'scroll',
			'default-color'          => 'fff',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		)
	);

	/*
	This theme designed to work with plain white background. Therefore, custom backgrounds are not supported.
	Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', $bg_args );
	*/

	/**
	 * Filter custom logo args.
	 *
	 * @since 1.0.0
	 *
	 * @param arrray $logo_args Array of extra arguments for custom logo.
	 */
	$logo_args = apply_filters(
		'aamla_custom_logo_args', array(
			'width'       => 120,
			'height'      => 120,
			'flex-width'  => true,
			'flex-height' => false,
			'header_text' => '',
		)
	);
	// Set up the WordPress core custom logo feature.
	add_theme_support( 'custom-logo', $logo_args );

	/**
	 * Filter custom header args.
	 *
	 * @since 1.0.0
	 *
	 * @param arrray $header_args Array of extra arguments for custom header.
	 */
	$header_args = apply_filters(
		'aamla_custom_header_args', array(
			'default-image'          => '',
			'random-default'         => false,
			'width'                  => 1680,
			'height'                 => 600,
			'flex-width'             => false,
			'flex-height'            => true,
			'default_text_color'     => '',
			'header-text'            => false,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
			'video'                  => false,
			'video-active-callback'  => 'is_front_page',
		)
	);
	// Set up the WordPress core custom header feature.
	add_theme_support( 'custom-header', $header_args );

	/**
	 * Filter list of activated custom addon features for this theme.
	 *
	 * @since 1.0.0
	 *
	 * @param arrray $addons Array of addon features for this theme.
	 */
	$addons = apply_filters( 'aamla_theme_support', array() );

	// Load core files. These files provide basic functionality to this theme.
	require_once get_parent_theme_file_path( 'blackbox/multiuse-functions.php' );
	require_once get_parent_theme_file_path( 'blackbox/default-filters.php' );
	require_once get_parent_theme_file_path( 'blackbox/customizer/customize-frontend.php' );

	// Load files to build and customize website's front-end.
	require_once get_parent_theme_file_path( 'builder/customizer-data.php' );
	require_once get_parent_theme_file_path( 'builder/template-functions.php' );
	require_once get_parent_theme_file_path( 'builder/template-tags.php' );

	// Load optional files for add-on functionality.
	foreach ( $addons as $addon ) {
		if ( file_exists( "{$root}addon/{$addon}/{$addon}.php" ) ) {
			add_theme_support( "aamla_{$addon}" );
			require_once get_parent_theme_file_path( "add-on/{$addon}/{$addon}.php" );
		}
	}

	// Load theme customizer initiation file at last.
	require_once get_parent_theme_file_path( 'blackbox/customizer/customize-register.php' );
}
add_action( 'after_setup_theme', 'aamla_setup', 5 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @since 1.0.0
 *
 * @global int $content_width
 */
function aamla_content_width() {

	$content_width = $GLOBALS['content_width'];

	/**
	 * Filter content width of the theme.
	 *
	 * @since 1.0.0
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'aamla_content_width', $content_width );
}
add_action( 'template_redirect', 'aamla_content_width', 0 );

/**
 * Register widget area.
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aamla_widgets_init() {

	/**
	 * Filter register widgets args.
	 *
	 * @since 1.0.0
	 *
	 * @param array $widgets {
	 *     Array of arguments for the sidebar being registered.
	 *
	 *     @type string $name          The name or title of the sidebar displayed in the Widgets
	 *                                 interface. Default 'Sidebar $instance'.
	 *     @type string $id            The unique identifier by which the sidebar will be called.
	 *                                 Default 'sidebar-$instance'.
	 *     @type string $description   Description of the sidebar, displayed in the Widgets interface.
	 *                                 Default empty string.
	 *     @type string $class         Extra CSS class to assign to the sidebar in the Widgets interface.
	 *                                 Default empty.
	 */
	$widgets = apply_filters( 'aamla_widgets', array(
		array(
			'name'        => esc_html__( 'Site Sidebar', 'aamla' ),
			'id'          => 'sidebar',
			'description' => esc_html__( 'Add widgets here to appear in site sidebar. You can make this sidebar to appear left or right to main content using Appearance > Customize > Theme options. Remove all widgets to hide this sidebar.', 'aamla' ),
		),
	) );

	$defaults = array(
		'description'   => esc_html__( 'Add widgets here.', 'aamla' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	);

	foreach ( $widgets as $widget ) {
		register_sidebar( wp_parse_args( $widget, $defaults ) );
	}
}
add_action( 'widgets_init', 'aamla_widgets_init' );

/**
 * Get Google fonts url to register and enqueue.
 *
 * This function incorporates code from Twenty Fifteen WordPress Theme,
 * Copyright 2014-2016 WordPress.org & Automattic.com Twenty Fifteen is
 * distributed under the terms of the GNU GPL.
 *
 * @since 1.0.0
 *
 * @return string Google fonts URL for the theme.
 */
function aamla_font_url() {

	$fonts     = array();
	$fonts_url = '';
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Roboto, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'aamla' ) ) {
		$fonts[] = 'Muli:300,400,500,700,300italic,400italic,500italic,700italic';
	}

	/**
	 * Filter google fonts to be used for the theme.
	 *
	 * @since 1.0.0
	 *
	 * @param array $fonts Array of google fonts to be used for the theme.
	 */
	$fonts = apply_filters( 'aamla_fonts', $fonts );

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	/**
	 * Filter google font url.
	 *
	 * @since 1.0.0
	 *
	 * @param string $fonts_url Google fonts url.
	 */
	return apply_filters( 'aamla_font_url', $fonts_url );
}

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * This function incorporates code from Twenty Seventeen WordPress Theme,
 * Copyright 2016-2017 WordPress.org. Twenty Seventeen is distributed
 * under the terms of the GNU GPL.
 *
 * @since 1.0.0
 */
function aamla_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'aamla_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function aamla_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'aamla-style', get_stylesheet_uri() );
	wp_add_inline_style( 'aamla-style', 'aamla_get_inline_css' );

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style(
		'aamla-fonts',
		esc_url( aamla_font_url() ),
		array(),
		null
	);

	// Theme localize scripts data.
	$l10n = apply_filters( 'aamla_localize_script_data', array(
		'menu' => 'primary-menu', // ID of nav-menu first UL element.
	) );

	// Theme scripts.
	wp_enqueue_script(
		'aamla-scripts',
		get_theme_file_uri( '/scripts.js' ),
		array(),
		'1.0.0',
		true
	);
	wp_localize_script( 'aamla-scripts', 'aamlaScreenReaderText', $l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aamla_scripts' );

/**
 * Add preconnect for Google Fonts.
 *
 * This function incorporates code from Twenty Seventeen WordPress Theme,
 * Copyright 2016-2017 WordPress.org. Twenty Seventeen is distributed
 * under the terms of the GNU GPL.
 *
 * @since 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function aamla_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'aamla-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'aamla_resource_hints', 10, 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * This function incorporates code from Twenty Seventeen WordPress Theme,
 * Copyright 2016-2017 WordPress.org. Twenty Seventeen is distributed
 * under the terms of the GNU GPL.
 *
 * @since 1.0.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function aamla_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];
	if ( 1100 <= $width ) {
		$sizes = '(max-width: 1024px) 100vw, (max-width: 1600px) 70vw, 1100px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'aamla_content_image_sizes_attr', 10, 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * This function incorporates code from Twenty Seventeen WordPress Theme,
 * Copyright 2016-2017 WordPress.org. Twenty Seventeen is distributed
 * under the terms of the GNU GPL.
 *
 * @since 1.0.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function aamla_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 640px) 100vw, (max-width: 1024px) 30vw, (max-width: 1600px) 21vw, 640px';
	} else {
		$attr['sizes'] = '(max-width: 1024px) 100vw, (max-width: 1600px) 70vw, 1100px';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'aamla_post_thumbnail_sizes_attr', 10, 3 );

/*
 * Note: Do not add any custom code here. Please use a custom plugin or child theme, so that your
 * customizations aren't lost during theme updates.
 */
