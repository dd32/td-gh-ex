<?php
/* 	Selfie Theme's General Page to display all Pages
	Copyright: 2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Selfie 1.0
*/

get_header(); ?>
<div id="container">
<?php get_template_part( 'post-content' ); ?>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>