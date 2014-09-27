<?php

/* 	Writing Board's 404 Error Page
	Copyright: 2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Writing Board 1.0
*/

get_header(); ?><div id="container" class="searchinfo">
<h1 class="page-title fa-times-circle"><?php echo of_get_option('nfound1', 'Not Found'); ?></h1>
<h3 class="arc-src"><span>Apologies, but the Page/Post/Content you requested could not be found. Perhaps searching will help</span></h3>

<?php get_search_form(); ?>
<span id="page-nav"><a class="alignleft" href="<?php echo home_url(); ?>" >Or Return to the Home Page</a></span></p>
<div class="clear"> </div>

<?php get_footer(); ?>