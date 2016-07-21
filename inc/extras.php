<?php
/**
 * Custom functions that are not template related
 *
 * @package Rubine Lite
 */


// Add Default Menu Fallback Function
function rubine_default_menu() {
	echo '<ul id="mainnav-menu" class="main-navigation-menu menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}


// Get Featured Posts
function rubine_get_featured_content() {
	return apply_filters( 'rubine_get_featured_content', false );
}


// Check if featured posts exists
function rubine_has_featured_content() {
	return ! is_paged() && (bool) rubine_get_featured_content();
}


// Change Excerpt Length
add_filter('excerpt_length', 'rubine_excerpt_length');
function rubine_excerpt_length($length) {
    return 80;
}


// Slideshow Excerpt Length
function rubine_featured_content_excerpt_length($length) {
    return 15;
}


// Change Excerpt More
add_filter('excerpt_more', 'rubine_excerpt_more');
function rubine_excerpt_more($more) {

	// Get Theme Options from Database
	$theme_options = rubine_theme_options();

	// Return Excerpt Text
	if ( isset($theme_options['excerpt_text']) and $theme_options['excerpt_text'] == true ) :
		return ' [...]';
	else :
		return '';
	endif;
}