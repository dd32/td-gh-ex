<?php
/**
 * Backdrop Core (functions-setup.php)
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Config;

/**
 * Table of Content
 *
 * 1.0 - Config (Theme Setup)
 */

/**
 * 1.0 - Config (Theme Setup)
 */
function load_theme_setup() {
	/**
	 * Content width is a theme feature, when set, it can set the maximum allow width for any content in teh theme like
	 * oEmbeds and images added to posts.
	 */
	$GLOBALS['content_width'] = 810;

	/**
	 * By adding add_theme_support( 'title-tag' );, this will let WordPress manage all document titles and should be use instead of wp_title();.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * By adding add_theme_support( 'automatic-feed-links' );, this feature when enabled allows feed links for post and comments
	 * in the head of the theme. This feature should be used in place of of the deprecated function automatic_feed_links();.
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * By adding add_theme_support( 'html5', arrayy() );, this feature when enabled allows the user use of HTML5 markup for
	 * comment list, comment forms, search forms, galleries, and captions.
	 */
	add_theme_support(
		'html5',
		array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
		)
	);

	/**
	 * By adding add_theme_support( 'post-thumbnails' );, this feature when enabled allows you to setup featured images
	 * also known as featured image. If you need to use conditional, please consider using has_post_thumbnail.
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * By add_image_size( 'backdrop-small-thumbnails', 324, 324, true );. This should be used for content in the home for blogs.
	 */
	add_image_size( 'backdrop-small-thumbnails', 378, 225, true );

	/**
	 * By add_image_size( 'backdrop-medium-thumbnails', 810, 396, true );. This should be used for content that has sidebars.
	 */
	add_image_size( 'backdrop-medium-thumbnails', 810, 396, true );

	/**
	 * By add_image_size( 'backdrop-large-thumbnails', 1170, 582, true );. This should be used for content that has no sidebars.
	 */
	add_image_size( 'backdrop-large-thumbnails', 1170, 582, true );

	/**
	 * By adding register_nav_menus( array() );, this feature when enabled, allows you to create multiple menus inside of primary
	 * and secondary. Social Navigation is also included.
	 */
	register_nav_menus(
		array(
			'primary'   => esc_html__( 'Primary Navigation', 'auspicious' ),
			'secondary' => esc_html__( 'Secondary Navigation', 'auspicious' ),
			'social'    => esc_html__( 'Social Navigation', 'auspicious' ),
		)
	);
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\load_theme_setup' );
