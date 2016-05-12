<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Basic Shop
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function igthemes_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
    
    // If our main sidebar doesn't contain widgets, adjust the layout to be full-width.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'full-width-content';
	}
    //grid style
    if ( ! is_singular() && igthemes_option('grid_style')==true) {
        $classes[] = 'grid-style';
    }
	return $classes;
}
add_filter( 'body_class', 'igthemes_body_classes' );

// add class to post
function igthemes_post_classes( $classes ) {
	global $wp_query;
    //grid style
    if ( !is_single() && igthemes_option('grid_style')==true) {
        $classes[] = ( $wp_query->current_post%2 === 0 ? 'col1' : 'col2' );
    }
	return $classes;
}
add_filter( 'post_class', 'igthemes_post_classes' );
