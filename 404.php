<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Automotive Centre
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-vw">
	<div class="container">
		<div class="page-content">
	    	<h1><?php echo esc_html(get_theme_mod('automotive_centre_404_page_title','404 Not Found'));?></h1>
			<p class="text-404"><?php echo esc_html(get_theme_mod('automotive_centre_404_page_content','Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.'));?></p>
			<div class="more-btn">
		        <a href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html(get_theme_mod('automotive_centre_404_page_button_text','GO BACK'));?><span class="screen-reader-text"><?php esc_html_e( 'GO BACK','automotive-centre' );?></span></a>
		    </div>
		</div>
		<div class="clearfix"></div>
	</div>
</main>

<?php get_footer(); ?>