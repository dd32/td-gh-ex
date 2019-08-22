<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package advance-startup
 */

get_header(); ?>

<main id="maincontent" class="content-ts">
	<div class="container">
        <div class="middle-align">
			<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'advance-startup' ), esc_html__( 'Not Found', 'advance-startup' ) ) ?></h1>
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'advance-startup' ); ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'advance-startup' ); ?></p>
			<div class="read-moresec">
        		<a href="<?php echo esc_url(home_url() ) ?>" alt="<?php esc_html_e( 'Home link', 'advance-startup' ); ?>" class="button"><?php esc_html_e( 'Back to Home Page', 'advance-startup' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'advance-startup' ); ?></span></a>
        	</div>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>