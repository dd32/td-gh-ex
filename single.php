<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Absolutte
 */

get_header(); ?>

	<?php

	if ( absolutte_is_portfolio_type( get_post_type() ) ) :
	?>
		<div id="content" class="<?php echo esc_attr( absolutte_content_css_class() ); ?>">

			<?php get_template_part( 'template-parts/single-portfolio', 'single' ); ?>

		</div><!-- #content -->
	<?php
	else:
	?>

		<div id="content" class="site-content <?php echo esc_attr( absolutte_content_css_class() ); ?>" role="content">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php absolutte_post_navigation(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</div><!-- #content -->

	<?php endif; ?>


	
<?php 
if ( ! absolutte_is_portfolio_type( get_post_type() ) ) :
	get_sidebar(); 
endif;
?>

<?php get_footer(); ?>
