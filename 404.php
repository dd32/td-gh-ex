<?php

/* 	SPARK Theme's 404 Error Page
	Copyright: 2012-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/

get_header(); ?>
<div id="container">
<h1 class="page-title"><?php echo __('Not Found', 'spark') ?></h1>
<h3 class="arc-src"><span><?php echo __('Apologies, but the page you requested could not be found. Perhaps searching will help.', 'spark') ?></span></h3>
<?php get_search_form(); ?>
<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page">&laquo; <?php echo __('Or Return to the Home Page', 'spark') ?></a></p><br /><br />

<h2 class="post-title-color"><?php echo __('You can also Visit the Following. These are the Featured Contents', 'spark') ?></h2>
<div class="content-ver-sep"></div><br />
<?php get_template_part( 'featured-box' ); ?>
 
<?php get_footer(); ?>