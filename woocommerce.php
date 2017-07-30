<?php
/**
 * The template for displaying WooCommerce pages
 *
 * @package ariel
 */
get_header(); ?>

	<div class="contents">
		<div class="container">

			<div id="page-<?php the_ID(); ?>" <?php post_class('entry entry-page page-woocommerce'); ?>>
				<?php do_action( 'woocommerce_before_main_content' ); ?>

				<?php woocommerce_content(); ?>

				<?php do_action( 'woocommerce_after_main_content' ); ?>
			</div>
		</div>
	</div>

<?php
/**
 * Footer widgets area
 */
get_sidebar( 'footer-top' );
get_sidebar( 'footer' );
get_sidebar( 'footer-bottom' );
get_footer();