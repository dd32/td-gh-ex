<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package advance-pet-care
 */

get_header(); ?>

<main id="maincontent" class="content-ts">
	<div class="container">
        <div class="middle-align">
			<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'advance-pet-care' ), esc_html__( 'Not Found', 'advance-pet-care' ) ) ?></h1>
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'advance-pet-care' ); ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'advance-pet-care' ); ?></p>
			<div class="read-moresec">
        		<a href="<?php echo esc_url(home_url() ) ?>" alt="<?php esc_html_e( 'Home link', 'advance-pet-care' ); ?>" class="button"><?php esc_html_e( 'Back to Home Page', 'advance-pet-care' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'advance-pet-care' ); ?></span></a>
        	</div>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>