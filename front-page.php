<?php 
/**
 * 
 * @package Avvocato 
 */
get_header(); 
if ( have_posts() ) : 
if ( 'posts' == get_option( 'show_on_front')) {
	include( get_home_template() );
} else {	
	get_template_part( 'content', 'home' ); 
} 
endif; 
get_footer(); ?>