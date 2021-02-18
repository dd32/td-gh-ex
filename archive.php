<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0
 */

get_header(); ?>

<?php if ( ast_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>
		
<?php endif ?>

	<div id="primary" <?php ast_primary_class(); ?>>
		
		<?php if ( have_posts() ) : ?>
		
			<?php /* Archive Page info */
				ast_archive_page_info();
			?>

		<?php endif; ?>
		
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php ast_content_while_before(); ?>

			<div class="ast-row">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', ast_get_post_format() );
					?>

				<?php endwhile; ?>

			</div>
			
			<?php ast_content_while_after(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->

		<?php ast_pagination(); ?>

	</div><!-- #primary -->

<?php if ( ast_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>
		
<?php endif ?>

<?php get_footer(); ?>
