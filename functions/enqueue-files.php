<?php 
/*
 * generator Enqueue css and js files
*/
function generator_enqueue()
{
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css',array(),'','');
	wp_enqueue_style('style',get_stylesheet_uri(),array(),'','');
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/font-awesome.css',array(),'','');
	wp_enqueue_script('bootstrapjs',get_template_directory_uri().'/js/bootstrap.js',array('jquery'),'','');		
	wp_enqueue_script('default',get_template_directory_uri().'/js/default.js',array('jquery'));	
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
}
add_action('wp_enqueue_scripts', 'generator_enqueue');