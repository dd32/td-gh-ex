<?php
/*
 * fKidd functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 */

require get_template_directory() . '/inc/utilities.php';
require get_template_directory() . '/inc/actions.php';
require get_template_directory() . '/inc/theme-options.php';

if ( ! function_exists( 'fkidd_setup' ) ) :
/**
 * fKidd setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */
function fkidd_setup() {

	load_theme_textdomain( 'fkidd', get_template_directory() . '/languages' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'primary menu', 'fkidd' ),
	) );

	// Add wp_enqueue_scripts actions
	add_action( 'wp_enqueue_scripts', 'fkidd_load_scripts' );

	// Add wp_head actions
	add_action( 'wp_head', 'fkidd_head_load_favicon_image' );

	add_action( 'widgets_init', 'fkidd_widgets_init' );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 'full', 'full', true );

	if ( ! isset( $content_width ) )
		$content_width = 900;

	add_theme_support( 'automatic-feed-links' );

	// add Custom background				 
	$args = array(
		'default-color' 	 => '#555555',
		'default-image' 	 => '%1$s/images/background.png',
		'default-repeat' 	 => 'background-repeat',
	);
	add_theme_support( 'custom-background', $args );

	// add custom header
	add_theme_support( 'custom-header', array (
					   'default-image'          => '',
					   'random-default'         => false,
					   'width'                  => 0,
					   'height'                 => 0,
					   'flex-height'            => false,
					   'flex-width'             => false,
					   'default-text-color'     => '',
					   'header-text'            => true,
					   'uploads'                => true,
					   'wp-head-callback'       => '',
					   'admin-head-callback'    => '',
					   'admin-preview-callback' => '',
					) );
					
	add_theme_support( "title-tag" );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );

	// add support for Post Formats.
	add_theme_support( 'post-formats', array (
											'aside',
											'image',
											'video',
											'audio',
											'quote', 
											'link',
											'gallery',
					) );

	// add the visual editor to resemble the theme style
	add_editor_style( array( 'css/editor-style.css' ) );
}
endif; // fkidd_setup
add_action( 'after_setup_theme', 'fkidd_setup' );

function fkidd_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'fkidd_post_classes' );

?>