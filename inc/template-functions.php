<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Aribiz
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function aribiz_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	 

	return $classes;
}
add_filter( 'body_class', 'aribiz_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function aribiz_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'aribiz_pingback_header' );

/**
 * Custom styles. See customizer-typography for typography styles.
 */
function aribiz_custom_styles() {
	echo '<style type="text/css">';

	 

	 

	echo '</style>';

}
add_action( 'wp_head', 'aribiz_custom_styles' );

/***
 * Basic support for a custom mobile logo.
 */
function aribiz_logo() {

	if ( has_custom_logo() ) {
		the_custom_logo();
	}

	 

}

/**
 * Add the dropdown arrow to links with submenus.
 *
 * @param string   $item_output The menu item's starting HTML output.
 * @param WP_Post  $item        Menu item data object.
 * @return string
 */
add_filter( 'walker_nav_menu_start_el', function( $item_output, $item ) {
	$has_children = in_array( 'menu-item-has-children', $item->classes );
	if ( $has_children ) {
		$item_output = str_replace(
			'</a>',
			'<i class="fa fa-angle-down"></i></a>',
			$item_output
		);
	}
	return $item_output;
}, 10, 2 );

