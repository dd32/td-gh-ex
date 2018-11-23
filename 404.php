<?php

/* 	Easy Theme's 404 Error Page
	Copyright: 2012-2018, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Easy 1.0
*/

get_header(); ?>
<div id="container">
	<div id="content-full">
		<h1 class="page-title"><?php _e('Not Found', 'easy'); ?></h1><br /><br />
		<h3 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help.', 'easy'); ?></span></h3>
		<?php get_search_form(); ?>
		<p><a href="<?php echo home_url(); ?>" title="<?php _e('Browse the Home Page', 'easy'); ?>">&laquo; <?php _e('Or Return to the Home Page', 'easy'); ?></a></p><br /><br />
		<h2 class="post-title-color"><?php _e('You can also Visit the Following. These are the Featured Contents', 'easy'); ?></h2>
	</div>
<?php get_footer(); ?>