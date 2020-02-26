<?php
/**
 * The template for displaying search results pages.
 *
 * @package Chip Life
 */

get_header(); ?>

	<div class="container">
		<div class="row">

			<div id="primary" class="content-area <?php chip_life_layout_class( 'content' ); ?>">
				<main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php printf( '<h1 class="page-title"><span class="page-title-label">%1$s</span> <span class="page-title-value">%2$s</span></h1>', esc_html__( 'Search Results for:', 'chip-life' ), get_search_query() ); ?>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );
						?>

					<?php endwhile; ?>

					<?php chip_life_the_posts_pagination(); ?>

				<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar(); ?>

		</div><!-- .row -->
	</div><!-- .container -->

<?php get_footer(); ?>
