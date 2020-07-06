<?php

/* 	Design Theme's 404 Error Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
*/

get_header(); ?>
<div class="pagenev"><div class="conwidth"><?php design_breadcrumbs(); ?></div></div>

<div id="container">

<h1 class="page-title"><?php esc_html_e('Not Found', 'd5-design'); ?></h1>
<h3 class="arc-src"><span><?php esc_html_e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'd5-design'); ?></span></h3>

<?php get_search_form(); ?><br />
<p><a href="<?php echo esc_url(home_url()); ?>" title="Browse the Home Page">&laquo; <?php esc_html_e('Or Return to the Home Page', 'd5-design'); ?></a></p><br /><br />

<h2 class="post-title-color"><?php esc_html_e('You can also Visit the Following. These are the Featured Contents', 'd5-design'); ?></h2>
<div class="content-ver-sep"></div><br />
<?php get_template_part( 'featured-box' ); ?>
 
<?php get_footer();