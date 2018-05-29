<?php

/* 	SunRain Theme's 404 Error Page
	Copyright: 2012-2018, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SunRain 1.0
*/

get_header(); ?>
<div id="container">
<h1 class="page-title"><?php _e('Not Found', 'sunrain'); ?></h1>
<h3 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'sunrain'); ?></span></h3>

<?php get_search_form(); ?>
<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page">&laquo; <?php _e('Or Return to the Home Page', 'sunrain'); ?></a></p><br /><br />

<h2 class="post-title-color"><?php _e('You can also Visit the Following. These are the Featured Contents', 'sunrain'); ?></h2>
<div class="content-ver-sep"></div></div>
<?php get_template_part( 'featured-box' ); ?>
 
<?php get_footer(); ?>