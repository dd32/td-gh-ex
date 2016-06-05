<?php
/**
 * The template for displaying all single posts.
 *
 * @package miranda
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php 
			while ( have_posts() ) : the_post();
				the_post_navigation();

 				get_template_part( 'content', 'single' );

				the_post_navigation();

				// If comments are open, load up the comment template
				if ( comments_open()) :
					comments_template();
				endif;
			
			 endwhile; // end of the loop. 
			 ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
