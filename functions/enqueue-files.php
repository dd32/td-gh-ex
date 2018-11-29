<?php 
/*
 * topmag Enqueue css and js files
*/
function top_mag_enqueue()
{
	wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Lato');
	/* CSS Files */
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/font-awesome.css',false,null);
	wp_enqueue_style('owl-carousel',get_template_directory_uri().'/css/owl.carousel.css',false,null);
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css',false,null);
	wp_enqueue_style('tickercss',get_template_directory_uri().'/css/ticker-style.css',false,null);
	
	/* JS Files */	
	wp_enqueue_script('owl-carousel',get_template_directory_uri().'/js/owl.carousel.js',array('jquery'),false,null);
	wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.js',array('jquery'),false,null);	
	wp_enqueue_script('ticker',get_template_directory_uri().'/js/jquery.ticker.js',array('jquery'),false,null);
	
	wp_enqueue_script('default',get_template_directory_uri().'/js/default.js',array('jquery'),false,null);
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
	wp_enqueue_style('style',get_stylesheet_uri(),false,null);
}
add_action('wp_enqueue_scripts', 'top_mag_enqueue');
