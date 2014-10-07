<?php
/**
 * The template for displaying all single posts.
 *
 * @package blogghiamo
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				$format = get_post_format();
				if ( false === $format ) {
					$format = 'standard';
				}
				get_template_part( 'post-formats/single', $format );
			?>

			<?php blogghiamo_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>