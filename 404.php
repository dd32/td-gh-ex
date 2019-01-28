<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Aamla
 * @since 1.0.0
 */

get_header();
?>
<div id="content"<?php aamla_attr( 'site-content' ); ?>>
<div id="primary"<?php aamla_attr( 'content-area' ); ?>>
	<main id="main" role="main"<?php aamla_attr( 'site-main' ); ?>>

		<section<?php aamla_attr( 'error-404' ); ?>>
			<header<?php aamla_attr( 'page-header' ); ?>>
				<h1<?php aamla_attr( 'page-title' ); ?>>
					<?php esc_html_e( 'ERROR 404', 'aamla' ); ?>
				</h1>
			</header><!-- .page-header -->

			<div<?php aamla_attr( 'page-content' ); ?>>
				<h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'aamla' ); ?></h2>
				<p><?php esc_html_e( 'You might ensure the URL is spelled correctly, or if you followed a link here, please let us know. Please try a search to reach your desired destination.', 'aamla' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
