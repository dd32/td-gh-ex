<?php

/* 	Easy Theme's 404 Error Page
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Easy 1.0
*/

get_header(); ?>
<div id="container">
	<div id="content-full">
		<h1 class="page-title"><?php esc_html_e('Not Found', 'easy'); ?></h1><br /><br />
		<h3 class="arc-src"><span><?php esc_html_e('Apologies, but the page you requested could not be found. Perhaps searching will help.', 'easy'); ?></span></h3>
		<?php get_search_form(); ?>
		<p><a href="<?php echo esc_url(home_url()); ?>" title="<?php esc_attr_e('Browse the Home Page', 'easy'); ?>">&laquo; <?php _e('Or Return to the Home Page', 'easy'); ?></a></p><br /><br />
		<h2 class="post-title-color"><?php esc_html_e('You can also Visit the Following. These are the Featured Contents', 'easy'); ?></h2>
	</div>
<?php get_footer(); ?>