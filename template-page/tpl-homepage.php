<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bcorporate
 */

get_header(); ?>
<?php
	while ( have_posts() ) : the_post();
		?>
		<div class="bcorporate_banner_section bcorporate_home_banner_section" style="background-image: url(<?php if( has_post_thumbnail() ): echo esc_url( get_the_post_thumbnail_url() ); endif;?>)">
			<div class="center_text caption-text text-center">
				<h1 class="caption-text-heading">
					 <?php the_content(); ?> 
				</h1>
			</div>
			<div class="blaze_down_btn"  data-aos-once="true" data-aos="fade-up" data-aos-delay="550"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></div>
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
	<!-- end of the header part -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			 

				<!-- About section home -->
				<?php do_action('bcorporate_home_about_sec'); ?>
				
				<!-- Our Features section home -->
				<?php do_action('bcorporate_home_feature_sec'); ?>

				<!-- Our Portfolio section home -->
				<?php do_action('bcorporate_home_portfolio_sec'); ?>

				<!-- Our cta one section home -->
				<?php do_action('bcorporate_home_ctaone_sec'); ?>

				<!-- Our Services section home -->
				<?php do_action('bcorporate_home_services_sec'); ?>

				<!-- Our Services section home -->
				<?php do_action('bcorporate_home_blog_sec'); ?>

				<!-- Testimonial section home -->
				<?php do_action('bcorporate_home_testimonial_sec'); ?>

				<!-- CATA two section home -->
				<?php do_action('bcorporate_home_ctatwo_sec'); ?>

				
	 

		</main><!-- #main -->
	</div><!-- #primary -->
<?php endwhile; ?>

<?php
get_footer();
