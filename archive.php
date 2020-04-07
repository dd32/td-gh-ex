<?php
/**
 * The template for displaying Archive pages
 *
 * @package Fmi
 */

// header
get_header();

// archive heading (year, month, day, etc), blog posts with pagination, and sidebar
get_template_part( 'template-parts/archive' );

// footer
get_footer();
