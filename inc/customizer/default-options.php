<?php
/**
 * Returns theme options
 *
 * Use sane defaults in case the user has not configured any theme options yet.
 */


// Return theme options
function anderson_theme_options() {
    
	// Merge Theme Options Array from Database with Default Options Array
	$theme_options = wp_parse_args( 
		
		// Get saved theme options from WP database
		get_option( 'anderson_theme_options', array() ), 
		
		// Merge with Default Options if setting was not saved yet
		anderson_default_options() 
		
	);

	// Return theme options
	return $theme_options;
	
}


// Build default options array
function anderson_default_options() {

	$default_options = array(
		'layout' 							=> 'right-sidebar',
		'image_grayscale' 					=> false,
		'deactivate_google_fonts'			=> false,
		'header_icons' 						=> false,
		'header_ad_code' 					=> '',
		'posts_length' 						=> 'excerpt',
		'post_thumbnails_index'				=> true,
		'post_thumbnails_single' 			=> true,
		'excerpt_text' 						=> false,
		'slider_active' 					=> false,
		'slider_active_magazine' 			=> false,
		'slider_animation' 					=> 'horizontal'
	);
	
	return $default_options;
}


?>