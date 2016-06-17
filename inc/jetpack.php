<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package WordPress
 * @subpackage Collect
 * @since Collect 1.0
 */
function abc_front_page_render() {
	while ( have_posts() ) : the_post();
		if ( 'product' == get_post_type() ) {
			wc_get_template_part( 'content', 'product' );
		} else {
			get_template_part( 'template-parts/content' );
		}
	endwhile;
}

add_filter( 'abc_infinite_scroll_args', 'custom_abc_infinite_scroll_args' );
function custom_abc_infinite_scroll_args() {
	return array(
	    'container' => 'primary',
		'wrapper' => false,
	    'footer_widgets' => 'extended-footer',
	    'footer' => false,
		'render'=> 'abc_front_page_render',
	);
}

add_filter( 'infinite_scroll_archive_supported', 'abc_infinite_scroll_archive_supported' );
function abc_infinite_scroll_archive_supported() {
	return current_theme_supports( 'infinite-scroll' ) && ( is_home() || is_archive() || is_search() ) && ! is_post_type_archive( 'product' );
}