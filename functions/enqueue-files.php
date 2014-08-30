<?php 
/*
 * medics Enqueue css and js files
*/
function medics_enqueue()
{
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('style',get_stylesheet_uri());
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/font-awesome.min.css');
	wp_enqueue_style('owl-carousel-css',get_template_directory_uri().'/css/owl.carousel.css');
	wp_enqueue_script('bootstrapjs',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'));
	wp_enqueue_script('sliderjs',get_template_directory_uri().'/js/owl.carousel.min.js',array('jquery'));
	wp_enqueue_script('defaultjs',get_template_directory_uri().'/js/default.js',array('jquery'));
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
}
add_action('wp_enqueue_scripts', 'medics_enqueue');