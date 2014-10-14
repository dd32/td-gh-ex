<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Accent
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function accent_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'accent_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function accent_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'accent_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function accent_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'accent' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'accent_wp_title', 10, 2 );

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
function accent_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'accent_setup_author' );

/* Google fonts URL */
function accent_google_fonts_url() {
	$accent_font_families = array();

	// Check if body font is not Source Sans Pro 
	if ( 'Source Sans Pro' != get_theme_mod( 'body_font', 'Source Sans Pro' ) ) {
		$accent_font_families[] = get_theme_mod( 'body_font' ) . ':400,300,400italic,700,700italic';
	} 
	// Check if heading font is not Source Sans Pro and it is different from the body font
	if ( 'Source Sans Pro' != get_theme_mod( 'headings_font', 'Source Sans Pro' ) && get_theme_mod( 'body_font' ) != get_theme_mod( 'headings_font' ) ) {
		$accent_font_families[] = get_theme_mod( 'headings_font' ) . ':700,400,400italic';
	} 

	if ( ! empty( $accent_font_families ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $accent_font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );

		return $fonts_url;
	}

	return false;
}
