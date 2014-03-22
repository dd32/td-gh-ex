<?php
/**
 * Theme Functions
 *
 * Various functions to use through out site such as breadcrumb, pagination, etc
 *
 * @package URVR
 *
 * @since 1.0
 *
 */

	// cleaning up excerpt
	add_filter('excerpt_more', 'urvr_excerpt_more');

	// This removes the annoying […] to a Read More link
	function urvr_excerpt_more($excerpt) {
		global $post;
		// edit here if you like
		return '<p class="readmore"><a href="'. get_permalink($post->ID) . '" title="Read '.get_the_title($post->ID).'">Read more &raquo;</a></p>';
	}

	function custom_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	add_action( 'wp_head', 'urvr_custom_css' );

	function urvr_custom_css() {
		global $urvr;
		if( isset( $urvr['custom-css'] ) ) {
			$custom_css = '<style type="text/css">' . $urvr['custom-css'] . '</style>';
			echo $custom_css;
		}
	}

	add_action( 'wp_footer', 'urvr_custom_js', 99 );
	
	function urvr_custom_js() {
		global $urvr;
		if( isset( $urvr['custom-js'] ) ) {
			$custom_js = '<script type="text/javascript"><!--';
	 		$custom_js .= $urvr['custom-js'];
	 		$custom_js .= '//--><!]]></script>';
	 		echo $custom_js;
		}
	}

	global $urvr;
	if( isset( $urvr['analytics-place'] ) && $urvr['analytics-place'] == 1 ) {
		add_action( 'wp_footer', 'urvr_add_analytics' );
	} else {
		add_action( 'wp_head', 'urvr_add_analytics' );
	}

	function urvr_add_analytics() {
		global $urvr;

		if( isset( $urvr['google-analytics'] ) ) {

			$ga = "<script type='text/javascript'><!--\r\n";
			$ga .= $urvr['google-analytics'];
			$ga .= "\r\n//--><!]]></script>";
			echo $ga;

		}

	}