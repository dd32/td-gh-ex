<?php
/**
 * The template for displaying all single posts.
 *
 * @package miranda
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<?php miranda_post_nav(); ?>
			
			<?php get_template_part( 'content', 'single' ); ?>

			<?php miranda_post_nav(); ?>

			<?php
				// If comments are open, load up the comment template
				if ( comments_open()) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

 
<?php get_sidebar(); ?>
<?php get_footer(); ?>
