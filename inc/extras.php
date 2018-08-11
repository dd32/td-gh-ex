<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Bayn Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bayn_lite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'bayn_lite_body_classes' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bayn_lite_hide_sidebar( $classes ) {
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'bayn_lite_hide_sidebar' );

/**
 * Adds custom classes to the .site-branding if logo width is larger than 96px.
 *
 * @return string
 */
function bayn_lite_logo_class() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( ! $custom_logo_id ) {
		return '';
	}

	$logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
	if ( is_array( $logo ) && isset( $logo[1] ) && 96 < $logo[1] ) {
		return ' site-branding--vertical';
	}

	return '';
}
