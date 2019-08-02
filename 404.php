<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package advance-education
 */

get_header(); ?>

<main role="main" id="maincontent" class="content-ts">
	<div class="container">
        <div class="middle-align">
			<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'advance-education' ), esc_html__( 'Not Found', 'advance-education' ) ) ?></h1>
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'advance-education' ); ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'advance-education' ); ?></p>
			<div class="read-moresec">
        		<a href="<?php echo esc_url(home_url() ) ?>" class="button"><?php esc_html_e( 'Back to Home Page', 'advance-education' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'advance-education' ); ?></span></a>
        	</div>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>