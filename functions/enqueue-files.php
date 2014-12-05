<?php 
/*
 * besty Enqueue css and js files
*/
function besty_enqueue()
{
	wp_enqueue_style('besty-bootstrap',get_stylesheet_directory_uri().'/css/bootstrap.min.css',array(),'','');
	wp_enqueue_style('besty-style',get_stylesheet_uri());
	wp_enqueue_style('besty-theme',get_stylesheet_directory_uri().'/css/theme.css',array(),'','');
	wp_enqueue_style('besty-basecss', get_stylesheet_directory_uri().'/css/base.css',array(),'','');
	wp_enqueue_script('besty-bootstrapjs',get_stylesheet_directory_uri().'/js/bootstrap.min.js',array('jquery'), '20120206', true );
	wp_enqueue_script('besty-enscrolljs', get_stylesheet_directory_uri() . '/js/enscroll.min.js',array('jquery'), '20120216', true );
	wp_enqueue_script('besty-default',get_stylesheet_directory_uri().'/js/default.js',array('jquery'), '20120226', true );
	if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']))
	{
	    // if IE<=8
	    wp_enqueue_script('besty-respond', get_stylesheet_directory_uri() . '/js/respond.min.js',array('jquery'), '', true );
	}
	
	wp_enqueue_script('jquery-masonry');
	wp_enqueue_script( 'besty-base', get_stylesheet_directory_uri() . '/js/base.js', array('jquery'), '1.0' );	
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
}
add_action('wp_enqueue_scripts', 'besty_enqueue');
