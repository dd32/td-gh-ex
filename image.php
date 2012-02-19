<?php
/**
 * The template for displaying image attachments.
 *
 * @since Akyuz 1.0
 */

get_header(); ?>

		<div id="primary" class="span-24">
			<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'image' ); ?>
				
					<?php comments_template(); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>