<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package agency-x
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function agency_x_body_classes( $classes ) {
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
add_filter( 'body_class', 'agency_x_body_classes' );

if ( ! function_exists( 'agency_x_simple_breadcrumb' ) ) :

    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     */
    function agency_x_simple_breadcrumb() {

        // Load Breadcrumb.
        if ( ! function_exists( 'agency_x_breadcrumb_trail' ) ) {
            require_once get_template_directory() . '/inc/breadcrumbs.php';
        }

        $breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false,
        );
        agency_x_breadcrumb_trail( $breadcrumb_args );

    }

endif;

add_action( 'agency_x_breadcrumb', 'agency_x_simple_breadcrumb', 10 );