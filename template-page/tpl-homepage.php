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
		<div class="bcorporate_banner_section bcorporate_home_banner_section">
			<div class="center_text caption-text text-center">
				<h2 class="caption-text-heading">
					 <?php the_content(); ?> 
				</h2>
			</div>
			<?php if( has_post_thumbnail() ): ?>
				<img src="<?php echo esc_url( get_the_post_thumbnail_url() );?>" class="banner_img home_banner_img" />
			<?php else: ?>
				<img src="<?php echo esc_url( get_template_directory_uri() );?>/inc/img/blog_header_img.jpg" class="banner_img home_banner_img" />
			<?php endif; ?>
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
	<!-- end of the header part -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			 

				<!-- About section home -->
				<?php do_action('bcorporate_home_about_sec', 'bcorporate'); ?>
				
				<!-- Our Features section home -->
				<?php do_action('bcorporate_home_feature_sec', 'bcorporate'); ?>

				<!-- Our Portfolio section home -->
				<?php do_action('bcorporate_home_portfolio_sec', 'bcorporate'); ?>

				<!-- Our cta one section home -->
				<?php do_action('bcorporate_home_ctaone_sec', 'bcorporate'); ?>

				<!-- Our Services section home -->
				<?php do_action('bcorporate_home_services_sec', 'bcorporate'); ?>

				<!-- Our Services section home -->
				<?php do_action('bcorporate_home_blog_sec', 'bcorporate'); ?>

				<!-- Testimonial section home -->
				<?php do_action('bcorporate_home_testimonial_sec', 'bcorporate'); ?>

				<!-- CATA two section home -->
				<?php do_action('bcorporate_home_ctatwo_sec', 'bcorporate'); ?>

				
	 

		</main><!-- #main -->
	</div><!-- #primary -->
<?php endwhile; ?>

<?php
get_footer();
