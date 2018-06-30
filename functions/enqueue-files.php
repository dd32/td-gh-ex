<?php 
/*
 * Impressive Enqueue css and js files
*/
function impressive_enqueue()
{

	wp_enqueue_style('impressive-google-font-Josefin-sans','//fonts.googleapis.com/css?family=Josefin+Sans:400,700',array());
	wp_enqueue_style('impressive-google-font-dancing-script','//fonts.googleapis.com/css?family=Dancing+Script',array());

	wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css',array());
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/font-awesome.css',array());
	wp_enqueue_style('impressive-default',get_template_directory_uri().'/css/default.css',array());
	
	
	wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.js',array('jquery'));    
	wp_enqueue_script('impressive-defaultjs',get_template_directory_uri().'/js/default.js',array('jquery'));
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
	
	impressive_custom_css();
}
add_action('wp_enqueue_scripts', 'impressive_enqueue');