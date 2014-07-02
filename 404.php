<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Aperture
 */

get_header(); ?>

<?php if ( is_active_sidebar( 'right-sidebar' ) ) { ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php } else { ?>
	<div id="primary" class="content-area-no-sidebar">
		<main id="main" class="site-main" role="main">
<?php } ?>

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found...', 'aperture' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Try using the navigation menu or the search box to locate the page you were looking for.', 'aperture' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'right' ); ?>
<?php get_footer(); ?>
