<?php
/**
 * astrology theme's functions and definitions.
 *
 * @package astrology
 */

if ( ! function_exists( 'AstrologySetup' ) ) :

function AstrologySetup() {
	
	load_theme_textdomain( 'astrology', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	global $wp_version;

	if ( version_compare( $wp_version, '3.4', '>=' ) ) :
		add_theme_support( 'custom-header' );
		define( 'NO_HEADER_TEXT', true );
	endif;

	add_theme_support( 'custom-logo', array(
			'height'      => 80,
			'width'       => 500,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	add_editor_style();
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'astrology' ),
		'footer' => esc_html__( 'Footer', 'astrology' ),
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	 ) );
}

endif;

add_action( 'after_setup_theme', 'AstrologySetup' );

function AstrologyContentWidth() {
	$GLOBALS['content_width'] = apply_filters( 'astrology_content_width', 640 );
}
add_action( 'after_setup_theme', 'AstrologyContentWidth', 0 );

/**
 * wp enqueue style and script.
 */
require_once get_template_directory() . '/inc/enqueue-file.php';

/**
 * widgets.
 */
require_once get_template_directory() . '/inc/widgets.php';

/**
 * customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * default astrology functions.
 */
require_once get_template_directory() . '/inc/default.php';