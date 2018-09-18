<?php
/**
 * The template for displaying the full page without sidebar.
 *
 * Template name: Full Page
 *
 * @package adbooster
 */

get_header(); ?>
<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				do_action( 'adbooster_page_before' );

				get_template_part( 'template-parts/content', 'page' );
				
				/**
				 * Functions hooked in to adbooster_page_after action
				 *
				 * @hooked adbooster_display_comments - 10
				 */
				do_action( 'adbooster_page_after' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();