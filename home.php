<?php
/**
 * default home page
 *
 * @package WordPress
 * @subpackage spasalon
 */
 
get_header(); 
?>

<?php

	if( 'page' == get_option('show_on_front') )
	{ 
		get_template_part('index');
	}
	else
	{
		get_template_part('index','slider');
		
		get_template_part('index','service');
		
		get_template_part('index','product');
		
		get_template_part('index','news');
	}
	
?>

<?php get_footer(); ?>