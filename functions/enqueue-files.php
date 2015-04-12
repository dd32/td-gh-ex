<?php 
/*
 * avocation Enqueue css and js files
*/
function avocation_enqueue()
{
	wp_enqueue_style('avocation-bootstrap',get_template_directory_uri().'/css/bootstrap.css',array());
	wp_enqueue_style('avocation-style',get_stylesheet_uri(),array());
	wp_enqueue_style('avocation-font-awesome',get_template_directory_uri().'/css/font-awesome.css',array());
	wp_enqueue_style('avocation-owl.theme',get_template_directory_uri().'/css/owl.theme.css',array());
	wp_enqueue_style('avocation-owl.carousel',get_template_directory_uri().'/css/owl.carousel.css',array());
	wp_enqueue_script('avocation-bootstrapjs',get_template_directory_uri().'/js/bootstrap.js',array('jquery'));
	   
	wp_enqueue_script('avocation-defaultjs',get_template_directory_uri().'/js/default.js',array('jquery'));
	wp_enqueue_script('avocation-owl.carouseljs',get_template_directory_uri().'/js/owl.carousel.js',array('jquery'));
	wp_enqueue_script('jquery');  
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
}
add_action('wp_enqueue_scripts', 'avocation_enqueue');