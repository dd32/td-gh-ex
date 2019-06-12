<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Acuarela
 * @since Acuarela 1.0
 */

get_header(); ?>
<main id="main" role="main">
<div id="main-content">
	<section class="error-404 not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can not be found.', 'acuarela' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'acuarela' ); ?></p>

			<?php get_search_form(); ?>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->
</div><!--/main-content-->
<?php get_sidebar( 'sidebar' ); ?>
</main>
<?php get_footer();



