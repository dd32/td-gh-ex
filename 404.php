<?php

/* 	Writing Board's 404 Error Page
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Writing Board 1.0
*/

get_header(); ?><div id="container" class="searchinfo">
<h1 class="page-title"><?php _e('Not Found', 'writing-board'); ?></h1>
<h3 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'writing-board'); ?></span></h3>

<?php get_search_form(); ?>
<span id="page-nav"><a class="alignleft" href="<?php echo home_url(); ?>" ><?php _e('Or Return to the Home Page', 'writing-board'); ?></a></span></p>
<div class="clear"> </div>

<?php get_footer(); ?>