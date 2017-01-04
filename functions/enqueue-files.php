<?php 
/*
 * besty Enqueue css and js files
*/
function besty_enqueue() {
	//wp_enqueue_style('besty-istok-web-font','//fonts.googleapis.com/css?family=Istok+Web',array(),'','');
	// Add istok web font, used in the main stylesheet.
	wp_enqueue_style( 'besty-istok-web', besty_font_url(), array(), null );
	
	wp_enqueue_style('besty-bootstrap',get_template_directory_uri().'/css/bootstrap.css',array(),'','');
	wp_enqueue_style('besty-style',get_stylesheet_uri());
	wp_enqueue_style('besty-theme',get_template_directory_uri().'/css/theme.css',array(),'','');
	wp_enqueue_style('besty-basecss', get_template_directory_uri().'/css/base.css',array(),'','');
	wp_enqueue_script('besty-bootstrapjs',get_template_directory_uri().'/js/bootstrap.js',array('jquery'), '20120206', true );
	wp_enqueue_script('besty-enscrolljs', get_template_directory_uri() . '/js/enscroll.js',array('jquery'), '20120216', true );
	wp_enqueue_script('besty-default',get_template_directory_uri().'/js/default.js',array('jquery'), '20120226', true );

	
	wp_enqueue_script('jquery-masonry');
	wp_enqueue_script( 'besty-base', get_template_directory_uri() . '/js/base.js', array('jquery'), '1.0' );	
	
	if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']))
	{
	    // if IE<=8
	    wp_enqueue_script('besty-respond', get_stylesheet_directory_uri() . '/js/respond.js',array('jquery'), '', true );	   
	}
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
}
add_action('wp_enqueue_scripts', 'besty_enqueue'); ?>