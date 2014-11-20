<?php
/**
 * Returns theme options
 *
 * Use sane defaults in case the user has not configured any theme options yet.
 */


// Return theme options
function rubine_theme_options() {
    
	// Merge Theme Options Array from Database with Default Options Array
	$theme_options = wp_parse_args( 
		
		// Get saved theme options from WP database
		get_option( 'rubine_theme_options', array() ), 
		
		// Merge with Default Options if setting was not saved yet
		rubine_default_options() 
		
	);

	// Return theme options
	return $theme_options;
	
}


// Build default options array
function rubine_default_options() {

	$default_options = array(
		'layout' 							=> 'right-sidebar',
		'header_logo' 						=> '',
		'header_content' 					=> '',
		'header_search' 					=> false,
		'header_icons' 						=> false,
		'post_thumbnails_single' 			=> true,
		'excerpt_text' 						=> false
	);
	
	return $default_options;
}


?>