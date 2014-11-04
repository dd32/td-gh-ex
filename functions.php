<?php
/*
 * tisho functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 */

require_once( 'inc/utilities.php' );

require_once( 'inc/actions.php' );

require_once( 'inc/theme-options.php' );

require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

load_theme_textdomain( 'tishonator', get_template_directory() . '/languages' );

add_theme_support( 'menus' );

// Add wp_enqueue_scripts actions
add_action( 'wp_enqueue_scripts', 'tishonator_load_scripts' );

// Add wp_head actions
add_action( 'wp_head', 'tishonator_head_load_favicon_image' );

// Add wp_footer actions
add_action( 'wp_footer', 'tishonator_footer_load_footer_scripts' );

add_action( 'widgets_init', 'tishonator_widgets_init' );

if ( function_exists( 'add_theme_support' ) ) { 

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 'full', 'full', true );
}

if ( ! isset( $content_width ) )
	$content_width = 900;

add_theme_support( 'automatic-feed-links' );

// add Custom background				 
$args = array(
	'default-color' 	 => '#ffcc00',
	'default-attachment' => 'fixed',
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

function tishonator_wp_title_for_home( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}
	
	if ( $sep == '') {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'tishonator' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'tishonator_wp_title_for_home', 10, 2 );

?>