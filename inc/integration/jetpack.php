<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package bellini
 */



/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */

if ( class_exists( 'Jetpack' )):

	function bellini_jetpack_setup() {

	if(Jetpack::is_module_active( 'infinite-scroll' )):
		add_theme_support( 'infinite-scroll', array(
			'container' => 'content',
			'render'    => 'bellini_infinite_scroll_render',
			'footer'    => 'page',
		) );
	endif;

		add_theme_support( 'jetpack-responsive-videos' );
		add_theme_support( 'site-logo', array( 'size' => 'full' ) );
	}

	add_action( 'after_setup_theme', 'bellini_jetpack_setup' );

endif;


function bellini_infinite_scroll_render() {
	get_template_part( 'template-parts/content-lb-1');
}