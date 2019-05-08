<?php
/**
 * Front Page Template
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Elementor Pagebuilder Template
 * @package Academic_Hub
 */
get_header(); 
academic_hub_after_header();
academic_hub_before_mainsec();
while ( have_posts() ) :
    the_post();
    the_content();
endwhile;
academic_hub_after_mainsec();
get_footer();