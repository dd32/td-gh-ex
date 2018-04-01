<?php
/**
 * Hook into WordPress to enhance default contents
 *
 * @package Aamla
 * @since 1.0.0
 */

/**
 * Modify WordPress default custom logo attributes.
 *
 * Modify 'alt' attribute to address accessibility related errors.
 *
 * @since 1.0.0
 *
 * @param array   $attr       Attributes for the image markup.
 * @param WP_Post $attachment Image attachment post.
 * @return array
 */
function aamla_custom_logo_attr( $attr, $attachment ) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( $custom_logo_id === $attachment->ID ) {
		if ( ! get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ) ) {
			$attr['alt'] = get_bloginfo( 'name', 'display' );
		}
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'aamla_custom_logo_attr', 10, 2 );

/**
 * Add dropdown icon if primary menu item has children.
 *
 * @param  string $title The menu item's title.
 * @param  object $item  The current menu item.
 * @param  array  $args  An array of wp_nav_menu() arguments.
 * @param  int    $depth Depth of menu item. Used for padding.
 * @return string $title The menu item's title with dropdown icon.
 */
function aamla_dropdown_icon_to_menu_link( $title, $item, $args, $depth ) {
	if ( 'primary' === $args->theme_location ) {
		foreach ( $item->classes as $value ) {
			if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
				$title = $title . aamla_get_icon( array( 'icon' => 'angle-down' ) );
			}
		}
	}

	return $title;
}
add_filter( 'nav_menu_item_title', 'aamla_dropdown_icon_to_menu_link', 10, 4 );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function aamla_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'aamla_page_menu_args' );
