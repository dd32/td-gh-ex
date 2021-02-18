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
				<h2><?php esc_html_e( 'What you should do now?', 'aamla' ); ?></h2>
				<ol class="not-found-details">
					<li><?php esc_html_e( 'You can use site search box to find the content you are looking for.', 'aamla' ); ?></li>
					<li><?php esc_html_e( 'Please explore our site using top navigation menu or visit our ', 'aamla' ); ?><a href= "<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html_e( 'home page.', 'aamla' ); ?></a></li>
				</ol>
			</div><!-- .page-content -->
			<img class="image-404" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/404.jpg' ) ); ?>">
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
