<?php 
/*
 * medics Enqueue css and js files
*/
function medics_enqueue()
{
	/* CSS Files */	
	wp_enqueue_style('google-font-api-scada','//fonts.googleapis.com/css?family=Scada');	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/font-awesome.css',array(),'','');
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css',array(),'','');
	wp_enqueue_style('owl-carousel',get_template_directory_uri().'/css/owl.carousel.css',array(),'','');
	/* JS Files */	
	wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.js',array('jquery'));
	wp_enqueue_script('owl-carousel',get_template_directory_uri().'/js/owl.carousel.js',array('jquery'));
	wp_enqueue_script('medics-default',get_template_directory_uri().'/js/default.js',array('jquery'));
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
	wp_enqueue_style('medics-style',get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'medics_enqueue');