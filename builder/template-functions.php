<?php
/**
 * Hook into WordPress core or the Theme to modify default contents
 *
 * @package Aamla
 * @since 1.0.0
 */

/**
 * Extend the default WordPress body classes.
 *
 * @since 1.0.0
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function aamla_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class for Index view pages.
	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'index-view';
	}

	// Adds a class for Single view pages.
	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	return $classes;
}
add_filter( 'body_class', 'aamla_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * @since 1.0.0
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function aamla_post_classes( $classes ) {
	// Adds a class for posts.
	$classes[] = 'entry';

	return $classes;
}
add_filter( 'post_class', 'aamla_post_classes' );

/**
 * Adds a class to control maximum width of primary site elements.
 *
 * @since 1.0.0
 *
 * @param array $attr attribute values array.
 * @return array
 */
function aamla_primary_wrapper( $attr ) {
	$attr['class'] .= ' wrapper';
	return $attr;
}
add_filter( 'aamla_get_attr_header_items', 'aamla_primary_wrapper' );
add_filter( 'aamla_get_attr_site_content', 'aamla_primary_wrapper' );
add_filter( 'aamla_get_attr_footer_items', 'aamla_primary_wrapper' );

/**
 * Change excerpt length.
 *
 * Change excerpt length to be displayed on main, archive and search
 * pages, default excerpt length is 55.
 *
 * @since 1.0.0
 *
 * @param int $length excert length.
 * @return integer
 */
function aamla_excerpt_length( $length ) {
	// Number of words to be shown in post excerpt.
	$length = 35;
	return $length;
}
add_filter( 'excerpt_length', 'aamla_excerpt_length' );

/**
 * Add horizontal scrolling arrow buttons to primary menu.
 *
 * @since 1.0.0
 *
 * @param string   $nav_menu The HTML content for the navigation menu.
 * @param stdClass $args     An object containing wp_nav_menu() arguments.
 * @return array
 */
function aamla_add_menu_scrolling_buttons( $nav_menu, $args ) {
	if ( 'primary' !== $args->theme_location ) {
		return $nav_menu;
	}

	$left_button = sprintf(
		'<button class="scroll-btn scroll-btn-Left" type="button">%s</button>',
		aamla_get_icon( array( 'icon' => 'angle-left' ) )
	);

	$right_button = sprintf(
		'<button class="scroll-btn scroll-btn-Right" type="button">%s</button>',
		aamla_get_icon( array( 'icon' => 'angle-right' ) )
	);

	$nav_menu .= $left_button . $right_button;

	return $nav_menu;
}
add_filter( 'wp_nav_menu', 'aamla_add_menu_scrolling_buttons', 10, 2 );
