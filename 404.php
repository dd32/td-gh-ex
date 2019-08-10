<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package BB Mobile Application
 */

get_header(); ?>

<main id="maincontent" class="content-ts">
	<div class="container">
        <div class="page-content">
			<h1><?php esc_html_e('404 Not Found', 'bb-mobile-application' ); ?></h1>
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn', 'bb-mobile-application' ); ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry it happens to the best of us.', 'bb-mobile-application' ); ?></p>
			<div class="read-moresec">
        		<a href="<?php echo esc_url(home_url() ); ?>" alt="<?php esc_html_e( 'Home link', 'bb-mobile-application' ); ?>" class="button"><?php esc_html_e( 'Back to Home Page', 'bb-mobile-application' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'bb-mobile-application' ); ?></span></a>
			</div>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>