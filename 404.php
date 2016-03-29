<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AcmeThemes
 * @subpackage AcmePhoto
 */
get_header();
global $acmephoto_customizer_all_values;
?>
<div class="wrapper inner-main-title init-animate fadeInDown animated">
	<header>
		<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'acmephoto' ); ?></h1>
	</header>
</div>
<div id="content" class="site-content">
	<?php
	if( 1 == $acmephoto_customizer_all_values['acmephoto-show-breadcrumb'] ){
		acmephoto_breadcrumbs();
	}
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'acmephoto' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- #content -->
<?php get_footer(); ?>
