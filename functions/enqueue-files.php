<?php 
/*
 * avocation Enqueue css and js files
*/
function avocation_enqueue()
{
	wp_enqueue_style('google-font-lato','//fonts.googleapis.com/css?family=Lato',array());
	wp_enqueue_style('google-font-raleway','//fonts.googleapis.com/css?family=Raleway',array());

	wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css',array());
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/font-awesome.css',array());
	wp_enqueue_style('owl.carousel',get_template_directory_uri().'/css/owl.carousel.css',array());
	wp_enqueue_style('owl.theme',get_template_directory_uri().'/css/owl.theme.css',array());
	wp_enqueue_style('avocation-style',get_stylesheet_uri(),array());
	
	wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.js',array('jquery'));    
	wp_enqueue_script('owl.carousel',get_template_directory_uri().'/js/owl.carousel.js',array('jquery'));
	wp_enqueue_script('avocation-defaultjs',get_template_directory_uri().'/js/default.js',array('jquery'));	
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 

	avocation_custom_css();
}
add_action('wp_enqueue_scripts', 'avocation_enqueue'); ?>