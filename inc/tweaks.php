<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Skirmish
 * @since Skirmish 1.6
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since skirmish 1.0
 */
function skirmish_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'skirmish_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since skirmish 1.0
 */
function skirmish_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'skirmish_body_classes' );

/**
* Custom background fix by JustinTadlock.com. Thanks!
*/

add_custom_background( 'skirmish_background_callback' );

function skirmish_background_callback() {

	/* Get the background image. */
	$image = get_background_image();

	/* If there's an image, just call the normal WordPress callback. We won't do anything here. */
	if ( !empty( $image ) ) {
		_custom_background_cb();
		return;
	}

	/* Get the background color. */
	$color = get_background_color();

	/* If no background color, return. */
	if ( empty( $color ) )
		return;

	/* Use 'background' instead of 'background-color'. */
	$style = "background: #{$color};";

?>
<style type="text/css">body { <?php echo trim( $style ); ?> }</style>
<?php

}

/**
*  END Custom background fix by JustinTadlock.com. Thanks!
*/

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 * @since skirmish 1.0
 */
function skirmish_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'skirmish_enhanced_image_navigation', 10, 2 );