<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Academic_Hub
 * @since 1.0.0
 */

get_header();
?>
<?php academic_hub_before_mainsec(); ?>
	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php academic_hub_content_top(); ?>

					<section class="error-404 not-found">
						<div class="page-content">
							<div class="page-not-found text-center academic-title">
								<h1><?php echo esc_html__( '404 Page Not Found', 'academic-hub' ); ?></h1>
								<p><?php echo esc_html__( 'The page you were looking for appears to have been moved, deleted or does not exist. You could go back to where you were.', 'academic-hub' ); ?></p>
								<p><?php esc_html_e( 'Try searching or ', 'academic-hub' ); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html_e( 'Go back to Home', 'academic-hub' ); ?></a></p>
							</div>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				<?php academic_hub_content_bottom(); ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php academic_hub_after_mainsec(); ?>
<?php
get_footer();
