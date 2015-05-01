<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Atomic
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function atomic_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'atomic_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function atomic_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'atomic_body_classes' );


/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function atomic_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'atomic_setup_author' );
/* Google fonts URL */
function atomic_google_fonts_url() {

	// The default Roboto font
	wp_register_style('atomic-roboto-condensed', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,700', array(), false, 'all');
	wp_enqueue_style('atomic-roboto-condensed');
	wp_register_style('atomic-lato', '//fonts.googleapis.com/css?family=Lato:400,300,400italic,700,700italic', array(), false, 'all');
    wp_enqueue_style('atomic-lato');
	
	$atomic_font_families = array();

	// Check if body font is not Lato
	if ( 'Lato' != get_theme_mod( 'body_font', 'Lato' ) ) {
		$atomic_font_families[] = get_theme_mod( 'body_font' ) . ':400,300,400italic,700,700italic';
	} 
	// Check if heading font is not Roboto and it is different from the body font
	if ( 'Roboto Condensed' != get_theme_mod( 'headings_font', 'Roboto Condensed' ) && get_theme_mod( 'body_font' ) != get_theme_mod( 'headings_font' ) ) {
		$atomic_font_families[] = get_theme_mod( 'headings_font' ) . ':700,400,400italic';
	} 

	if ( ! empty( $atomic_font_families ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $atomic_font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );

		return $fonts_url;
	}

	return false;
}
