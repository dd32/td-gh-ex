<?php

/* COLORFUL Theme's404 Error Page
	Copyright: 2012-2016, D5 Creation, www.d5creation.com
	
	Since COLORFUL 1.0
*/

get_header(); ?>
<div id="content">
<h1 class="page-title"><?php _e('Not Found', 'd5-colorful'); ?></h1>
<h3 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'd5-colorful'); ?></span></h3>

<?php get_search_form(); ?>
<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page">&laquo; <?php _e('Or Return to the Home Page', 'd5-colorful'); ?></a></p><br /><br />
</div>
<?php get_footer(); ?>