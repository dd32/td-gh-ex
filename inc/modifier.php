<?php
/**
 * Hook into WordPress core or the Theme to modify default contents
 *
 * @package Aamla
 * @since 1.0.0
 */

/**
 * Extend the default WordPress body classes.
 *
 * @since 1.0.0
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function aamla_body_classes( $classes ) {
	// Adds a class for Single and Index view pages.
	if ( is_singular() ) {
		$classes[] = 'singular';
	} else {
		$classes[] = 'index-view';
		// Adds a class for posts layout on index page.
		$classes[] = is_search() ? 'list' : aamla_get_mod( 'aamla_index_layout', 'attr' ); // Value Escaped.
	}

	// Adds a class to know primary sidebar layout.
	if ( ! is_active_sidebar( 'sidebar' ) ) {
		$classes[] = 'no-sidebar';
	} elseif ( is_singular() ) {
		if ( is_page_template( 'page-templates/without-sidebar.php' ) ) {
			$classes[] = 'no-sidebar';
		} elseif ( is_page_template( 'page-templates/sidebar-left.php' ) ) {
			$classes[] = 'sidebar-left';
		} elseif ( is_page_template( 'page-templates/sidebar-right.php' ) ) {
			$classes[] = 'sidebar-right';
		} elseif ( is_singular( 'page' ) ) {
			$classes[] = aamla_get_mod( 'aamla_page_sidebar_layout', 'attr' ); // Value Escaped.
		} elseif ( is_singular( 'post' ) ) {
			$classes[] = aamla_get_mod( 'aamla_post_sidebar_layout', 'attr' ); // Value Escaped.
		}
	} else {
		$classes[] = aamla_get_mod( 'aamla_archive_sidebar_layout', 'attr' ); // Value Escaped.
	}

	return $classes;
}
add_filter( 'body_class', 'aamla_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * @since 1.0.0
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function aamla_post_classes( $classes ) {
	// Adds a class for posts.
	$classes[] = 'entry';

	return $classes;
}
add_filter( 'post_class', 'aamla_post_classes' );

/**
 * Adds a class to control maximum width of primary site elements.
 *
 * @since 1.0.0
 *
 * @param array $attr attribute values array.
 * @return array
 */
function aamla_primary_wrapper( $attr ) {
	$attr['class'] .= ' wrapper';
	return $attr;
}
add_filter( 'aamla_get_attr_header_items', 'aamla_primary_wrapper' );
add_filter( 'aamla_get_attr_contact_wrapper', 'aamla_primary_wrapper' );
add_filter( 'aamla_get_attr_site_content', 'aamla_primary_wrapper' );
add_filter( 'aamla_get_attr_footer_items', 'aamla_primary_wrapper' );

/**
 * Adds class to site footer.
 *
 * @since 1.0.2
 *
 * @param array $attr attribute values array.
 * @return array
 */
function aamla_site_footer_classes( $attr ) {
	if ( is_active_sidebar( 'footer' ) ) {
		$attr['class'] .= ' has-footer-widgets';
	}
	return $attr;
}
add_filter( 'aamla_get_attr_site_footer', 'aamla_site_footer_classes' );

/**
 * Change excerpt length.
 *
 * Change excerpt length to be displayed on main, archive and search
 * pages, default excerpt length is 20.
 *
 * @since 1.0.0
 *
 * @param int $length excert length.
 * @return integer
 */
function aamla_excerpt_length( $length ) {
	// Number of words to be shown in post excerpt.
	$length = 20;
	return $length;
}
add_filter( 'excerpt_length', 'aamla_excerpt_length' );

/**
 * Add horizontal scrolling arrow buttons to primary menu.
 *
 * @since 1.0.0
 *
 * @param string   $nav_menu The HTML content for the navigation menu.
 * @param stdClass $args     An object containing wp_nav_menu() arguments.
 * @return array
 */
function aamla_add_menu_scrolling_buttons( $nav_menu, $args ) {
	$args = (object) $args;
	if ( 'primary' !== $args->theme_location ) {
		return $nav_menu;
	}

	$left_button = sprintf(
		'<button class="scroll-btn scroll-btn-Left" type="button" aria-hidden="true">%s</button>',
		aamla_get_icon( [ 'icon' => 'angle-left' ] )
	);

	$right_button = sprintf(
		'<button class="scroll-btn scroll-btn-Right" type="button" aria-hidden="true">%s</button>',
		aamla_get_icon( [ 'icon' => 'angle-right' ] )
	);

	$nav_menu .= $left_button . $right_button;

	return $nav_menu;
}
add_filter( 'wp_nav_menu', 'aamla_add_menu_scrolling_buttons', 10, 2 );
add_filter( 'wp_page_menu', 'aamla_add_menu_scrolling_buttons', 10, 2 );

/**
 * Adding Custom Images Sizes to the WordPress Media Library (Admin).
 *
 * @since 1.0.0
 *
 * @param array $size_names Array of image sizes and their names.
 * @return array
 */
function aamla_custom_image_sizes_to_admin( $size_names ) {
	return array_merge( $size_names,
		[
			'aamla-small'  => esc_html__( 'Aamla Small', 'aamla' ),
			'aamla-medium' => esc_html__( 'Aamla Medium', 'aamla' ),
			'aamla-large'  => esc_html__( 'Aamla Large', 'aamla' ),
			'aamla-laptop' => esc_html__( 'Aamla Laptop', 'aamla' ),
		]
	);
}
add_filter( 'image_size_names_choose', 'aamla_custom_image_sizes_to_admin' );

/**
 * Do not autoplay audio on archive pages.
 *
 * @since 1.0.0
 *
 * @param array $result   The shortcode_atts() merging of $defaults and $atts.
 * @param array $defaults The default attributes defined for the shortcode.
 * @param array $atts     The attributes supplied by the user within the shortcode.
 * @return array
 */
function aamla_audio_autoplay_off( $result, $defaults, $atts ) {
	if ( is_home() || is_archive() ) {
		$result['autoplay'] = false;
	}
	return $result;
}
add_filter( 'shortcode_atts_audio', 'aamla_audio_autoplay_off', 10, 3 );

/**
 * Strip Tags from manual page excerpts on search pages.
 *
 * @since 1.0.0
 *
 * @param string  $excerpt The post excerpt.
 * @param WP_Post $post Post object.
 * @return string
 */
function aamla_strip_page_excerpts( $excerpt, $post ) {
	if ( ! is_search() ) {
		return $excerpt;
	}
	if ( 'page' === $post->post_type ) {
		$excerpt = wp_strip_all_tags( $excerpt );
	}
	return $excerpt;
}
add_filter( 'get_the_excerpt', 'aamla_strip_page_excerpts', 10, 2 );
