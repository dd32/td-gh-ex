<?php
/**
 * The template for displaying Search Results pages.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php bhaga_content_class(); ?>>
		<main id="main" <?php bhaga_main_class(); ?>>
			<?php
			/**
			 * bhaga_before_main_content hook.
			 *
			 */
			do_action( 'bhaga_before_main_content' );

			if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						printf( // WPCS: XSS ok.
							/* translators: 1: Search query name */
							__( 'Search Results for: %s', 'bhaga' ),
							'<span>' . get_search_query() . '</span>'
						);
						?>
					</h1>
				</header><!-- .page-header -->

				<?php while ( have_posts() ) : the_post();

					get_template_part( 'content', 'search' );

				endwhile;

				bhaga_content_nav( 'nav-below' );

			else :

				get_template_part( 'no-results', 'search' );

			endif;

			/**
			 * bhaga_after_main_content hook.
			 *
			 */
			do_action( 'bhaga_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * bhaga_after_primary_content_area hook.
	 *
	 */
	 do_action( 'bhaga_after_primary_content_area' );

	 bhaga_construct_sidebars();

get_footer();
