<?php

/* 	Socialia Theme's 404 Error Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Socialia 2.0
*/

get_header(); ?>

<h1 class="page-title"><?php esc_html_e('Not Found', 'd5-socialia'); ?></h1>
<h3 class="arc-src"><span><?php esc_html_e('Apologies, but the page you requested could not be found. Perhaps searching will help.', 'd5-socialia'); ?></span></h3>

<?php get_search_form(); ?>
<p><a href="<?php echo esc_url(home_url()); ?>" title="<?php esc_attr_e('Browse the Home Page', 'd5-socialia'); ?>">&laquo; <?php esc_html_e('Or Return to the Home Page', 'd5-socialia'); ?></a></p><br /><br />

<?php get_footer(); ?>