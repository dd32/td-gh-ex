<?php
/**
 * The template for displaying all single posts.
 *
 * @package BBird Under
 */

get_header(); ?>

	<main id="primary" class="site-main large-8 columns" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>
            
            
		</main><!-- #main -->
	

<?php get_sidebar(); ?>
<?php get_footer(); ?>
