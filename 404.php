<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package advance-it-company
 */

get_header(); ?>

<main id="maincontent" class="content-ts">
	<div class="container">
        <div class="middle-align">
			<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'advance-it-company' ), esc_html__( 'Not Found', 'advance-it-company' ) ) ?></h1>
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'advance-it-company' ); ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'advance-it-company' ); ?></p>
			<div class="read-moresec">
        		<a href="<?php echo esc_url(home_url() ) ?>" alt="<?php esc_html_e( 'Home link', 'advance-it-company' ); ?>" class="button"><?php esc_html_e( 'Back to Home Page', 'advance-it-company' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'advance-it-company' ); ?></span></a>
        	</div>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>