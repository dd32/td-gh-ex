<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Aperture
 */

get_header(); ?>

<?php if ( is_active_sidebar( 'right-sidebar' ) ) { ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php } else { ?>
	<div id="primary" class="content-area-no-sidebar">
		<main id="main" class="site-main" role="main">
<?php } ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php get_template_part( 'after', 'post' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

			<?php aperture_post_nav(); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'right' ); ?>
<?php get_footer(); ?>
