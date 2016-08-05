<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Arouse
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function arouse_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	$display_slider = get_theme_mod( 'display_slider', true );
	if ( $display_slider == true && is_home() && ! is_paged() ) { $classes[] = 'slider-active'; }
	
	if ( $display_slider == true && is_page_template( 'template-slider.php' ) ) { $classes[] = 'slider-active'; }

	return $classes;
}
add_filter( 'body_class', 'arouse_body_classes' );


/**
 * Changes tag font size.
 */
function arouse_tag_cloud_sizes($args) {
	$args['smallest']	= 9;
	$args['largest'] 	= 9;
	return $args; 
}
add_filter('widget_tag_cloud_args','arouse_tag_cloud_sizes');

/**
 * Replaces content [...] with ...
 */
function arouse_excerpt_more() {
	return '&hellip; ';
}
add_filter( 'excerpt_more', 'arouse_excerpt_more' );