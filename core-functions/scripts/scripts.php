<?php
function becorp_scripts()
{
 /*--------Css----------*/
	
		$becorp_custom_css = get_option('becorp_options');
		$custom_css= esc_attr($becorp_custom_css['becorp_custom_css']);
		
	
	wp_enqueue_style('becorp-style', get_stylesheet_uri());
	
	wp_add_inline_style( 'becorp-style', $custom_css );
   
	 wp_enqueue_style('becorp-bootstrap', BECORP_TEMPLATE_DIR_URI . '/css/bootstrap.css');
	 wp_enqueue_style('becorp-media-responsive', BECORP_TEMPLATE_DIR_URI . '/css/media-responsive.css');
	 wp_enqueue_style('becorp-font',BECORP_TEMPLATE_DIR_URI . '/css/font/font.css');
	 wp_enqueue_style('becorp-lightbox',BECORP_TEMPLATE_DIR_URI . '/css/lightbox/lightbox.css');
	 wp_enqueue_style('becorp-google-fonts','//fonts.googleapis.com/css?family=Lato:400italic,700italic,100,200,300,400,500,600,700,900',array() );
	 wp_enqueue_style('becorp-google-fonts','//fonts.googleapis.com/css?family=Roboto:400italic,700italic,100,200,300,400,500,600,700,900,
	italic,Courgette',array() );
	
	/*-- Css Font Awesome------*/	
	wp_enqueue_style('becorp-font-awesome-4.4.0',BECORP_TEMPLATE_DIR_URI . '/css/font-awesome-4.4.0/css/font-awesome.min.css');
	wp_enqueue_style('becorp-font-awesome-4.4.0',BECORP_TEMPLATE_DIR_URI . '/css/font-awesome-4.4.0/css/font-awesome.css');

	/*------Js-------------*/
	wp_enqueue_script('jquery');
	wp_enqueue_script('becorp-content', BECORP_TEMPLATE_DIR_URI .'/js/becorp-content.js');
	wp_enqueue_script('becorp-bootstrap', BECORP_TEMPLATE_DIR_URI .'/js/bootstrap.js');
	wp_enqueue_script('becorp-carousel', BECORP_TEMPLATE_DIR_URI .'/js/carousel.js');
	wp_enqueue_script('becorp-lightbox', BECORP_TEMPLATE_DIR_URI .'/js/lightbox/lightbox-2.6.min.js');
	wp_enqueue_script('becorp-menu', BECORP_TEMPLATE_DIR_URI .'/js/menu.js',array('jquery'));
	wp_enqueue_script('becorp-page-scroll-js' , BECORP_TEMPLATE_DIR_URI.'/js/page-scroll.js');
	
	/******* becorp tab js*********/
	wp_enqueue_script('becorp-tab-js',BECORP_TEMPLATE_DIR_URI.'/js/becorp-tab-js.js');
	
	/** Switcher js **/
	 wp_enqueue_script('becorp-animations.min-js',BECORP_TEMPLATE_DIR_URI.'/js/animations.min.js');
	
	// /** Animation CSS **/
	wp_enqueue_style('becorp-animations.min-css',BECORP_TEMPLATE_DIR_URI.'/css/animations.min.css');
	
	if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}
}
add_action('wp_enqueue_scripts', 'becorp_scripts');

?>