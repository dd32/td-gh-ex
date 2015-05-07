<?php
/* Includes all style and script files
 */
function appointment_scripts()
 {
		wp_enqueue_style('appointment-style', get_stylesheet_uri() );
        wp_enqueue_style('appointment-bootstrap-css',WEBRITI_TEMPLATE_DIR_URI.'/css/bootstrap.css');
		wp_enqueue_style('appointment-menu-css',WEBRITI_TEMPLATE_DIR_URI.'/css/theme-menu.css');
	/* Font Awesome */
        wp_enqueue_style('font-awesome-min','//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');	
    /* Media Responsive Css */
		wp_enqueue_style('appointment-media-responsive-css',WEBRITI_TEMPLATE_DIR_URI.'/css/media-responsive.css');	
	/* Bootstrap Js */
        wp_enqueue_script('appointment-jquery-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/jquery-1.11.0.js');
        wp_enqueue_script('appointment-bootstrap-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/bootstrap.min.js');
		wp_enqueue_script('appointment-menu-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/menu/menu.js');
		wp_enqueue_script('appointment-page-scroll-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/page-scroll.js');
		wp_enqueue_script('appointment-carousel-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/carousel.js');
		wp_enqueue_script( 'jquery' );
		if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}
		}
add_action('wp_enqueue_scripts','appointment_scripts');
?>