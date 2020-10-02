<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Bexley
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function bexley_infinite_scroll_init() {

	add_theme_support(
		'infinite-scroll',
		array(
			'container' => 'main-content',
			'footer_widgets' => 'sidebar-2',
			'footer' => 'footer-widgets',
		)
	);

	add_theme_support( 'tonesque' );

	add_theme_support( 'jetpack-responsive-videos' );

	add_theme_support(
		'social-links',
		array(
			'facebook',
			'twitter',
			'linkedin',
			'tumblr',
			'google_plus',
		)
	);

}

add_action( 'after_setup_theme', 'bexley_infinite_scroll_init' );


/**
 * Get social links from jetpack publicise functionality
 * See: http://jetpack.me/support/social-links/
 */
function bexley_social_links() {

	$social_links = array(
		'twitter',
		'facebook',
		'tumblr',
		'linkedin',
		'google_plus',
	);
	$links = '';

	foreach ( $social_links as $social ) {

		$url = get_theme_mod( 'jetpack-' . $social );
		if ( $url ) {
			$links .= '<a href="' . esc_url( $url ) . '" class="' . esc_attr( 'social_link_' . $social ) . '"><span>' . esc_html( $social ) . '</span></a>';
		}

	}

	if ( $links ) {
		echo '<div class="social_links">' . $links . '</div>';
	}

}
