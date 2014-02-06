<?php

/* 	Socialia Theme's 404 Error Page
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Socialia 2.0
*/

get_header(); ?>

<h1 class="page-title"><?php echo of_get_option('notf', 'Not Found'); ?></h1>
<h3 class="arc-src"><span><?php echo of_get_option('apologies', 'Apologies, but the page you requested could not be found. Perhaps searching will help.'); ?></span></h3>

<?php get_search_form(); ?>
<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page">&laquo; <?php echo of_get_option('orhp', 'Or Return to the Home Page'); ?></a></p><br /><br />

<?php get_footer(); ?>