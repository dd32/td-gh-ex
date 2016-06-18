<?php
/**
 * Template Name: Business Template
 *
 * @package WordPress
 * @subpackage spasalon
 */
 
get_header(); 
?>

<?php

	get_template_part('index','slider');
	
	get_template_part('index','service');
	
	get_template_part('index','product');
	
	get_template_part('index','news');

?>

<?php get_footer(); ?>