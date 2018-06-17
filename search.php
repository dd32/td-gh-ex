<?php
/**
 * The template for displaying Search Results pages.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php asagi_content_class(); ?>>
		<main id="main" <?php asagi_main_class(); ?>>
			<?php
			/**
			 * asagi_before_main_content hook.
			 *
			 */
			do_action( 'asagi_before_main_content' );

			if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						printf( // WPCS: XSS ok.
							/* translators: 1: Search query name */
							__( 'Search Results for: %s', 'asagi' ),
							'<span>' . get_search_query() . '</span>'
						);
						?>
					</h1>
				</header><!-- .page-header -->

				<?php while ( have_posts() ) : the_post();

					get_template_part( 'content', 'search' );

				endwhile;

				asagi_content_nav( 'nav-below' );

			else :

				get_template_part( 'no-results', 'search' );

			endif;

			/**
			 * asagi_after_main_content hook.
			 *
			 */
			do_action( 'asagi_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * asagi_after_primary_content_area hook.
	 *
	 */
	 do_action( 'asagi_after_primary_content_area' );

	 asagi_construct_sidebars();

get_footer();
