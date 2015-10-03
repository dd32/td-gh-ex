<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Araiz
 */

get_header(); ?>

	<div id="primary" class="content-area">
            <div class="container clear">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'araiz' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'araiz' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
                </div><!-- .container -->
	</div><!-- #primary -->

<?php get_footer(); ?>
