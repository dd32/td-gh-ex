<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bayn Lite
 */

get_header(); ?>

	<div class="page-header">
		<?php
		post_type_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</div><!-- .page-header -->

	<div class="container">
		<div id="primary" class="content-area u-text-center">
			<main id="main" class="site-main grid grid--3">

				<?php
				if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content' );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

			</main><!-- #main -->
			<?php the_posts_pagination(); ?>
		</div><!-- #primary -->
	</div>

<?php

get_footer();
