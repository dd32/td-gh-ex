<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Aperture
 */
?>
	<div id="after-post-sidebar" class="after-post-widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'after-post-sidebar' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #after-post-sidebar -->
