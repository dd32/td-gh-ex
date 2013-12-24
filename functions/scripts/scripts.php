<?php
/**
* @Theme Name	:	rambo
* @file         :	scripts.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
*/
function rambo_scripts()
{	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	/*Template Color Scheme CSs*/
	/*Font Awesome CSS*/
	wp_enqueue_style ('font-awesome',WEBRITI_TEMPLATE_DIR_URI .'/font-awesome-4.0.0/css/font-awesome.css');	
		
	wp_enqueue_style ('style-media',WEBRITI_TEMPLATE_DIR_URI .'/css/style-media.css'); //Style-Media
	wp_enqueue_style ('bootstrap',WEBRITI_TEMPLATE_DIR_URI.'/css/bootstrap.css');		//bootstrap css
	wp_enqueue_style ('bootstrap-responsive',WEBRITI_TEMPLATE_DIR_URI .'/css/bootstrap-responsive.css'); //boot rsp css
	wp_enqueue_style ('docs',WEBRITI_TEMPLATE_DIR_URI .'/css/docs.css'); //docs css
	wp_enqueue_style ('font',WEBRITI_TEMPLATE_DIR_URI.'/css/font/font.css'); // font css
	
	/*Flex Slider Css */
	wp_enqueue_style ('flex_css',WEBRITI_TEMPLATE_DIR_URI.'/css/flex_css/flexslider.css');// Flex Slider CSS
	//Template Color Scheme Js
	wp_enqueue_script('jquery',WEBRITI_TEMPLATE_DIR_URI.'/js/jquery.js');
	wp_enqueue_script('bootstrap',WEBRITI_TEMPLATE_DIR_URI.'/js/menu/bootstrap.min.js');
	wp_enqueue_script('menu',WEBRITI_TEMPLATE_DIR_URI.'/js/menu/menu.js'); 
	wp_enqueue_script('Bootstrap-transtiton',WEBRITI_TEMPLATE_DIR_URI.'/js/bootstrap-transition.js');
}
	add_action( 'wp_enqueue_scripts', 'rambo_scripts' );
?>