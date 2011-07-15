<?php
/** Sets the post excerpt length to 30 words. */
function chip_life_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length'	, 'chip_life_excerpt_length' );

/** Returns a "Read More" link for excerpts */
function chip_life_continue_reading_link() {
	return '<div class="margin10t"><a href="'. get_permalink() . '" class="more-link">Read More</a></div>';
}

/** Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and chip_life_continue_reading_link(). */
function chip_life_auto_excerpt_more( $more ) {
	return ' &hellip;' . chip_life_continue_reading_link();
}
add_filter( 'excerpt_more', 'chip_life_auto_excerpt_more' );

/** Adds a pretty "Read More" link to custom post excerpts. */
function chip_life_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= chip_life_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'chip_life_custom_excerpt_more' );

/** Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link. */
function chip_life_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'chip_life_page_menu_args' );

/** Chip Remove Gallery CSS */
function chip_life_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style'		, 'chip_life_remove_gallery_css' );
?>