<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Aperture
 */
?>  
	<div id="footer-sidebar" class="footer-widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'footer-sidebar' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #footer-sidebar -->
