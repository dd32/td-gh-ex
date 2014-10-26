<?php
/**
 * Returns theme options
 *
 * Use sane defaults in case the user has not configured any theme options yet.
 */


// Return theme options
function rubine_theme_options() {
    
	// Get theme options from DB
	$theme_options = get_option( 'rubine_theme_options' );
    
	// Check if user has already configured theme options
	if ( false === $theme_options ) :
		
		// Set Default Options
		$theme_options = rubine_default_options();
		
    endif;
	
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
		'header_icons' 						=> false
	);
	
	return $default_options;
}


?>