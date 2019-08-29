<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Automotive Centre
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-vw">
	<div class="container">
    	<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404','automotive-centre' ), esc_html__( 'Not Found', 'automotive-centre' ) ) ?></h1>
		<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'automotive-centre' ); ?></p>
		<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'automotive-centre' ); ?></p>
		<div class="more-btn">
	        <a href="<?php echo esc_url(get_permalink()); ?>"><i class="fas fa-plus"></i><?php esc_html_e( 'READ MORE', 'automotive-centre' ); ?><i class="fas fa-angle-right"></i><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','automotive-centre' );?></span></a>
	    </div>
		<div class="clearfix"></div>
	</div>
</main>

<?php get_footer(); ?>