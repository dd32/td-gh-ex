<?php
/**
 * The template for right sidebar
 *
 * @package History
 * @since History 1.0
 */
?>

		<div id="right-sidebar" class="widget-area" role="complementary">
			<ul class="xoxo">

			<?php // The primary sidebar used in all layouts
			if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>



			<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->
