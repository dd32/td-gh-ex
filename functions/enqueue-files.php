<?php 
/*
 * besty Enqueue css and js files
*/
function besty_enqueue() {
	wp_enqueue_style('google-font-api-istok-web','//fonts.googleapis.com/css?family=Istok+Web|Roboto',array(),NULL);	
	/* CSS Files */	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/font-awesome.css',array(),'','');
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css',array(),'','');
	wp_enqueue_style('besty-theme',get_template_directory_uri().'/css/theme.css',array(),false,null);
	/* JS Files */	
	wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.js',array('jquery'), '20120206', true );
	wp_enqueue_script('besty-enscroll', get_template_directory_uri() . '/js/enscroll.js',array('jquery'), '20120216', true );
	wp_enqueue_script('besty-default',get_template_directory_uri().'/js/default.js',array('jquery'), '20120226', true );
	wp_enqueue_script('jquery-masonry');
	wp_enqueue_script( 'besty-base', get_template_directory_uri() . '/js/base.js', array('jquery'), '1.0' );	

	if(isset($_SERVER['HTTP_USER_AGENT']))
	{
	    // if IE<=8
	    wp_enqueue_script('besty-respond', get_stylesheet_directory_uri() . '/js/respond.js',array('jquery'), '', true );	   
	}
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
	wp_enqueue_style('besty-style',get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'besty_enqueue'); ?>