<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bayn Lite
 */

get_header(); ?>

	<div class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bayn-lite' ); ?></h1>
	</div><!-- .page-header -->

	<div class="container clearfix">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<section class="error-404 not-found">

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try other search?', 'bayn-lite' ); ?></p>

						<?php get_search_form(); ?>
					</div><!-- .page-content -->

				</section><!-- .error-404 -->
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>

<?php
get_footer();
