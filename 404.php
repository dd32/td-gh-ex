<?php

/* 	GREEN EYE Theme's 404 Error Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since GREEN 1.0
*/

get_header(); ?>
<div id="container">
<h1 class="page-title"><?php esc_html_e ('Not Found', 'green-eye'); ?></h1><br /><br />
<h3 class="arc-src"><span><?php esc_html_e ('Apologies, but the page you requested could not be found. Perhaps searching will help.', 'green-eye'); ?></span></h3>
<?php get_search_form(); ?>
<p><a href="<?php echo esc_url(home_url()); ?>" title="<?php esc_attr_e ('Browse the Home Page', 'green-eye'); ?>">&laquo; <?php _e ('Or Return to the Home Page', 'green-eye'); ?></a></p><br /><br />

<h2 class="post-title-color"><?php esc_html_e ('You can also Visit the Following. These are the Featured Contents', 'green-eye'); ?></h2>
<div class="content-ver-sep"></div><br />
<?php get_template_part( 'featured-box' ); ?>
 
<?php get_footer(); ?>