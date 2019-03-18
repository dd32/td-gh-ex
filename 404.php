<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage apelle-uno
 * @since 1.0.0
 */

get_header();
?>

	<div class="page-wrapper page-wrapper page-wrapper">
		<main class="container" id="main-content" role="main" style="max-width:<?php echo $content_width?>" data-view="responsive/AnimationHandler" aria-hidden="false">
			<div class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'apelle-uno' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'apelle-uno' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->
		</main>
	</div>

<?php
get_footer();
