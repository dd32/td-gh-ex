<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Chip Life
 */

if ( ! chip_life_has_sidebar() ) {
	return;
}
?>
<div id="site-sidebar" class="sidebar-area <?php chip_life_layout_class( 'sidebar' ); ?>">
	<div id="secondary" class="sidebar widget-area">
		<?php do_action( 'before_sidebar' ); ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- .sidebar -->
</div><!-- .col-* columns of main sidebar -->
