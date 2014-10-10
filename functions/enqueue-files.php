<?php 
/*
 * besty Enqueue css and js files
*/
function besty_enqueue()
{
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.min.css',array(),'','');
	wp_enqueue_style('style',get_stylesheet_uri());
	wp_enqueue_style('theme',get_template_directory_uri().'/css/theme.css',array(),'','');
	wp_enqueue_style( 'basecss', get_stylesheet_directory_uri().'/css/base.css',array(),'','');
	wp_enqueue_script('bootstrapjs',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'), '20120206', true );
	wp_enqueue_script( 'enscroll-script', get_template_directory_uri() . '/js/enscroll.min.js',array('jquery'), '20120216', true );
	wp_enqueue_script('default',get_template_directory_uri().'/js/default.js',array('jquery'), '20120226', true );	
	wp_enqueue_script('jquery-masonry');
	wp_enqueue_script( 'base', get_template_directory_uri() . '/js/base.js', array('jquery'), '1.0' );	
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
}
add_action('wp_enqueue_scripts', 'besty_enqueue');
