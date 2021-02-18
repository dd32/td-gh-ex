<?php
/**
 * Template Name: Page Full Width Template
 *
 * @package boxy
 */

get_header(); ?>

<?php  get_template_part('breadcrumb'); ?>	

	<?php do_action('boxy_before_content'); ?>
	<?php do_action('boxy_single_page_flexslider_featured_image'); ?>
	<div id="content" class="site-content container">
         <div id="primary" class="content-area  sixteen columns">

			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
<?php get_footer(); ?>
