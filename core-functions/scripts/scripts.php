<?php
function becorp_scripts()
{
 /*--------Css----------*/
	$becorp_options=becorp_theme_default_data(); 
	$becorp_custom_css = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options ); 
	$custom_css= esc_attr($becorp_custom_css['becorp_custom_css']);
		
	wp_enqueue_style('becorp-style', get_stylesheet_uri());
	wp_add_inline_style( 'becorp-style', $custom_css );
    
	 wp_enqueue_style('default', BECORP_TEMPLATE_DIR_URI . '/css/default.css');
	 wp_enqueue_style('becorp-bootstrap', BECORP_TEMPLATE_DIR_URI . '/css/bootstrap.css');
	 wp_enqueue_style('becorp-photobox',BECORP_TEMPLATE_DIR_URI . '/css/photobox.css');
	 wp_enqueue_style('becorp-media-responsive', BECORP_TEMPLATE_DIR_URI . '/css/media-responsive.css');
	 wp_enqueue_style('becorp-font',BECORP_TEMPLATE_DIR_URI . '/css/font/font.css');
	 wp_enqueue_style('becorp-animations',BECORP_TEMPLATE_DIR_URI.'/css/animate.css');
	/*-- Css Font Awesome------*/	
	wp_enqueue_style('becorp-font-awesome-4.4.0',BECORP_TEMPLATE_DIR_URI . '/css/font-awesome-4.4.0/css/font-awesome.min.css');
	wp_enqueue_style('becorp-font-awesome-4.4.0',BECORP_TEMPLATE_DIR_URI . '/css/font-awesome-4.4.0/css/font-awesome.css');
	/*------Js-------------*/
	wp_enqueue_script('jquery');
	wp_enqueue_script('becorp-content', BECORP_TEMPLATE_DIR_URI .'/js/becorp-content.js');
	wp_enqueue_script('becorp-bootstrap', BECORP_TEMPLATE_DIR_URI .'/js/bootstrap.js');
	wp_enqueue_script('becorp-carousel', BECORP_TEMPLATE_DIR_URI .'/js/carousel.js');
	wp_enqueue_script('becorp-menu', BECORP_TEMPLATE_DIR_URI .'/js/menu.js',array('jquery'));
	wp_enqueue_script('becorp-page-scroll-js' , BECORP_TEMPLATE_DIR_URI.'/js/page-scroll.js');
	
	/******* becorp tab js*********/
	wp_enqueue_script('becorp-lightbox', BECORP_TEMPLATE_DIR_URI .'/js/jquery.photobox.js');
	
	/** animation Wow js **/
	wp_enqueue_script('becorp-wow-animations',BECORP_TEMPLATE_DIR_URI.'/js/wow.min.js');

	
	if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}
}
add_action('wp_enqueue_scripts', 'becorp_scripts');
?>