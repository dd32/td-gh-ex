<?php
/**
 * Theme Functions
 *
 * Various functions to use through out site such as breadcrumb, pagination, etc
 *
 * @package BOXY
 *
 * @since 1.0
 *
 */

	// cleaning up excerpt
	add_filter('excerpt_more', 'boxy_excerpt_more');

	// This removes the annoying […] to a Read More link
	function boxy_excerpt_more($excerpt) {
		global $post;
		// edit here if you like
		return '<p class="readmore"><a href="'. get_permalink($post->ID) . '" title="Read '.get_the_title($post->ID).'">Read more &raquo;</a></p>';
	}

	function boxy_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'boxy_excerpt_length', 999 );

	add_action( 'wp_head', 'boxy_custom_css' );

	function boxy_custom_css() {
		global $boxy;
		if( isset( $boxy['custom-css'] ) ) {
			$custom_css = '<style type="text/css">' . $boxy['custom-css'] . '</style>';
			echo $custom_css;
		}
	}