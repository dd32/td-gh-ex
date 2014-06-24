<?php 
/***
 * Custom Javascript Options
 *
 * Passing Variables from custom Theme Options to the javascript files
 * of theme navigation and frontpage slider. 
 *
 */

// Passing Variables to Theme Navigation ( js/navigation.js)
add_action('wp_enqueue_scripts', 'airballoon_custom_jscript_navigation');

if ( ! function_exists( 'airballoon_custom_jscript_navigation' ) ):
function airballoon_custom_jscript_navigation() { 

	// Set Parameters array
	$params = array(
		'menuTitle' => __('Menu', 'airballoon-lite'),
		'topmenuTitle' => __('Top Menu', 'airballoon-lite')
	);
	
	// Passing Parameters to Javascript
	wp_localize_script( 'airballoon-lite-jquery-navigation', 'airballoon_navigation_params', $params );
}
endif;


// Passing Variables to Frontpage Slider ( js/slider.js)
add_action('wp_enqueue_scripts', 'airballoon_custom_jscript_slider');

if ( ! function_exists( 'airballoon_custom_jscript_slider' ) ):
function airballoon_custom_jscript_slider() { 
	
	// Get Theme Options from Database
	$theme_options = airballoon_theme_options();
	
	// Set Parameters array
	$params = array();
	
	// Define Slider Animation
	if( isset($theme_options['slider_animation']) ) :
		$params['animation'] = esc_attr($theme_options['slider_animation']);
	endif;
	
	// Define Slider Speed
	if( isset($theme_options['slider_speed']) ) :
		$params['speed'] = esc_attr($theme_options['slider_speed']);
	endif;
	
	// Passing Parameters to Javascript
	wp_localize_script( 'airballoon-lite-jquery-frontpage_slider', 'airballoon_slider_params', $params );
}
endif;


?>