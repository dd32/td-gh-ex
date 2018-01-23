<?php

// Preview Check
function ashe_is_preview() {
	$theme    	  = wp_get_theme();
	$theme_name   = $theme->get( 'TextDomain' );
	$active_theme = ashe_get_raw_option( 'template' );
	return apply_filters( 'ashe_is_preview', ( $active_theme != strtolower( $theme_name ) && ! is_child_theme() ) );
}

// Get Raw Options
function ashe_get_raw_option( $opt_name ) {
	$alloptions = wp_cache_get( 'alloptions', 'options' );
	$alloptions = maybe_unserialize( $alloptions );
	return isset( $alloptions[ $opt_name ] ) ? maybe_unserialize( $alloptions[ $opt_name ] ) : false;
}

// Random Images
function ashe_get_preview_img_src( $i = 0 ) {
	// prevent infinite loop
	if ( 7 == $i ) {
		return '';
	}

	$path = get_template_directory() . '/assets/images/';

	// Build or re-build the global dem img array
	if ( ! isset( $GLOBALS['ashe_preview_images'] ) || empty( $GLOBALS['ashe_preview_images'] ) ) {
		$imgs       = array( 'image_1.jpg', 'image_2.jpg', 'image_3.jpg', 'image_4.jpg', 'image_5.jpg', 'image_6.jpg', 'image_7.jpg' );
		$candidates = array();

		foreach ( $imgs as $img ) {
			$candidates[] = $img;
		}
		$GLOBALS['ashe_preview_images'] = $candidates;
	}
	$candidates = $GLOBALS['ashe_preview_images'];
	// get a random image name
	$rand_key = array_rand( $candidates );
	$img_name = $candidates[ $rand_key ];

	// if file does not exists, reset the global and recursively call it again
	if ( ! file_exists( $path . $img_name ) ) {
		unset( $GLOBALS['ashe_preview_images'] );
		$i++;
		return ashe_get_preview_img_src( $i );
	}

	// unset all sizes of the img found and update the global
	$new_candidates = $candidates;
	foreach ( $candidates as $_key => $_img ) {
		if ( substr( $_img, 0, strlen( "{$img_name}" ) ) === "{$img_name}" ) {
			unset( $new_candidates[ $_key ] );
		}
	}
	$GLOBALS['ashe_preview_images'] = $new_candidates;
	return get_template_directory_uri() . '/assets/images/' . $img_name;
}

// Featured Images
function ashe_the_post_thumbnail( $input ) {
	if ( empty( $input ) && ashe_is_preview() ) {
		$placeholder = ashe_get_preview_img_src();
		return '<img src="' . esc_url( $placeholder ) . '" class="attachment-ashe-blog size-ashe-blog wp-post-image">';
	}
	return $input;
}
add_filter( 'post_thumbnail_html', 'ashe_the_post_thumbnail' );