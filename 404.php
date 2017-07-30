<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package ariel
 */
get_header(); ?>

<div class="contents">
	<div class="container">
		<div class="error-404">
			<h1 class="entry-title"><?php _e( '404', 'ariel' ); ?></h1>
			<h3><?php _e( 'Page Not Found', 'ariel' ); ?></h3>
		</div>
	</div>
</div>

<?php get_footer();