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
<div id="primary"<?php aamla_attr( 'content-area' ); ?>>
	<main id="main"<?php aamla_attr( 'site-main' ); ?>>

		<section class="error-404">
			<header class="page-header">
				<h1 class="page-header-title"><?php esc_html_e( 'Sorry! We can&rsquo;t find the page you are looking for.', 'aamla' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<h2><?php esc_html_e( 'Why this has happened?', 'aamla' ); ?></h2>
				<ol class="not-found-details">
					<li><?php esc_html_e( 'The page may have been moved, updated or deleted. if you followed a link to reach here, please let us know.', 'aamla' ); ?></li>
					<li><?php esc_html_e( 'You may have typed the web address incorrectly. Please check the address and spelling.', 'aamla' ); ?></li>
					<li><?php esc_html_e( 'There might be some problem with the website.', 'aamla' ); ?></li>
				</ol>
				<p><?php esc_html_e( 'Please try our site navigation or search to reach your desired destination.', 'aamla' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .page-content -->
			<img class="404-image" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/404.png' ) ); ?>">
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
