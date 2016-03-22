<?php
/**
 * The template for displaying pages.
 *
 * @package Barletta
 */

get_header(); ?>

	<section class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( get_theme_mod( 'barletta_page_comments' ) == 1 ) :
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main>
	</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>