<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Aileron
 */

if ( ! aileron_has_sidebar() ) {
	return;
}
?>
<div id="site-sidebar" class="sidebar-area <?php aileron_layout_class( 'sidebar' ); ?>">
	<div id="secondary" class="sidebar widget-area sidebar-widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- .sidebar -->
</div><!-- .col-* columns of main sidebar -->
