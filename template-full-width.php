<?php
/*
Template Name: Full Width Template
*/

get_header(); ?>


			<main id="primary" class="site-main large-12 columns" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
                </div>
     
	</div><!-- #primary -->


<?php get_footer(); ?>
