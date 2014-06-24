<?php
/**
 * Returns theme options
 *
 * Use sane defaults in case the user has not configured any theme options yet.
 */


// Return theme options
function airballoon_theme_options() {
    
	// Get theme options from DB
	$theme_options = get_option( 'airballoon_theme_options' );
    
	// Check if user has already configured theme options
	if ( false === $theme_options ) :
		
		// Set Default Options
		$theme_options = airballoon_default_options();
		
    endif;
	
	// Return theme options
	return $theme_options;
}


// Build default options array
function airballoon_default_options() {

		$default_options = array(
		'layout' 							=> 'right-sidebar',
		'header_tagline' 					=> false,
		'header_search' 					=> true,
		'header_icons' 						=> false,
		'posts_length' 						=> 'index',
		'post_thumbnails_index'				=> true,
		'post_thumbnails_single' 			=> true,
		'credit_link' 						=> true,
		'slider_activated' 					=> false,
		'slider_animation' 					=> 'horizontal',
		'front_page_default_content'		=> true,
		'front_page_posts'					=> false,
		'front_page_posts_title'			=> ''
	);
	
	return $default_options;
}


?>