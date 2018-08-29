<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package  Az_Authority
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="page-404">

			<div class="col-full">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'azauthority' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Please check your URL or use the search form below.', 'azauthority' ); ?></p>

						<?php
							get_search_form();
							
						?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</div>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->
<?php
do_action( 'azauthority_sidebar' );
get_footer();
