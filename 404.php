<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Automobile Hub
 * @subpackage automobile_hub
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">
		<section class="error-404 not-found">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'automobile-hub' ); ?></h1>
			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'automobile-hub' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</section>
	</div>
</div>

<?php get_footer();