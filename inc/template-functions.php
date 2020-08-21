<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     Acoustics
 * @version     1.0.0
 *
 */
if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function acoustic_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#content">' . __( 'Skip to the content', 'acoustics' ) . '</a>';
}

add_action( 'wp_body_open', 'acoustic_skip_link', 5 );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acoustics_body_classes( $classes ) {
  // Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
}

	//Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar' ) ) {
  $classes[] = 'no-sidebar';
}

return $classes;
}

add_filter( 'body_class', 'acoustics_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function acoustics_pingback_header() {
if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}

add_action( 'wp_head', 'acoustics_pingback_header' );

if ( ! function_exists( 'acoustics_layout_classes' ) ) :

	function acoustics_layout_classes( $layout ) {
switch ( $layout ) {
			case 'left-sidebar': $acoustics_class = "col-md-9 col-sm-12 pull-right";
break;
			case 'no-sidebar': $acoustics_class = "col-md-12";
break;
			case 'right-sidebar': $acoustics_class = "col-md-9 col-sm-12 pull-left";
break;
			default: $acoustics_class = "col-md-12";
break;
}

return $acoustics_class;
}

endif;
