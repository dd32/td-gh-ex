<?php
/** Sets the post excerpt length to 30 words. */
add_filter( 'excerpt_length', 'chip_life_excerpt_length' );
function chip_life_excerpt_length( $length ) {
	return 35;
}

/** Returns a "Read More" link for excerpts */
function chip_life_continue_reading_link() {
	return '<span class="more-link-span"><a href="'. get_permalink() . '" class="more-link">'. apply_filters( 'chip_life_continue_reading_link', 'Read More' ) .' </a></span>';
}

/** Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and chip_life_continue_reading_link(). */
add_filter( 'excerpt_more', 'chip_life_auto_excerpt_more' );
function chip_life_auto_excerpt_more( $more ) {
	return ' &hellip;' . chip_life_continue_reading_link();
}	

/** Adds a pretty "Read More" link to custom post excerpts. */
add_filter( 'get_the_excerpt', 'chip_life_custom_excerpt_more' );
function chip_life_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= chip_life_continue_reading_link();
	}
	return $output;
}

/** Returns a "Read More" link for content */
add_filter( 'the_content_more_link', 'chip_life_content_more_link', 10, 2 );
function chip_life_content_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, 'Read More', $more_link );
}	
	
/** Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link. */
add_filter( 'wp_page_menu_args', 'chip_life_page_menu_args' );
function chip_life_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}	

/** Chip Remove Gallery CSS */
add_filter( 'gallery_style', 'chip_life_remove_gallery_css' );
function chip_life_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}		
?>