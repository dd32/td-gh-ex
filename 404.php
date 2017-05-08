<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package beetech
 */

get_header(); ?>
<div class="bt-wrapper">
    <div class="content-wrap-main">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<span class="404-style"><?php esc_html_e( '404', 'beetech' ); ?></span>
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'beetech' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'Nothing Found Please Try Again With Another Link', 'beetech' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
?></div>
</div><?php 
get_footer();
