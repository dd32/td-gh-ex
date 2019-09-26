<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package advance-portfolio
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-ts">
	<div class="container">
        <div class="middle-align">
			<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'advance-portfolio' ), esc_html__( 'Not Found', 'advance-portfolio' ) ) ?></h1>
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'advance-portfolio' ); ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'advance-portfolio' ); ?></p>
			<div class="read-moresec">
        		<a href="<?php echo esc_url(home_url() ) ?>" class="button"><?php esc_html_e( 'Back to Home Page', 'advance-portfolio' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'advance-portfolio' ); ?></span></a>
        	</div>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>