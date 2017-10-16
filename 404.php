<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package atoz
 */

get_header(); ?>

<section class="error-404 not-found" style="padding:80px 0;">
	<div class="container">
		<div class="row">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'atoz'); ?></h1>
			</header>
			<!-- .page-header -->

			<div class="page-content">
				<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'atoz'); ?>
			</div>
			<!-- .page-content -->

			<div class="col-md-4">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();