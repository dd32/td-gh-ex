<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package advance-ecommerce-store
 */

get_header(); ?>

<div id="content-ts">
	<div class="container">
        <div class="middle-align">
			<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'advance-ecommerce-store' ), esc_html__( 'Not Found', 'advance-ecommerce-store' ) ) ?></h1>
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'advance-ecommerce-store' ); ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'advance-ecommerce-store' ); ?></p>
			<div class="read-moresec">
        		<a href="<?php echo esc_url(home_url() ) ?>" class="button"><?php esc_html_e( 'Back to Home Page', 'advance-ecommerce-store' ); ?></a>
        	</div>
			<div class="clearfix"></div>
        </div>
	</div>
</div>
<?php get_footer(); ?>