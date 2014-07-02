<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Aperture
 */
?>
	<div id="right-sidebar" class="sidebar-widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'right-sidebar' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #right-sidebar -->
