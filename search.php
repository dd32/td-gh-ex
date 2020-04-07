<?php
/**
 * The template for displaying search results pages
 *
 * @package Fmi
 */

// header
get_header();

// archive heading (search query and number of found posts), blog posts with pagination, and sidebar
get_template_part( 'template-parts/archive' );

// footer
get_footer();
