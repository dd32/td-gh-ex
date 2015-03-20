<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Accesspress Mag
 */

if ( ! is_active_sidebar( 'sidebar-right' ) ) {
	return;
}
?>

<div id="secondary-right-sidebar" class="widget-area" role="complementary">
	<div id="secondary">
		<?php dynamic_sidebar( 'sidebar-right' ); ?>
	</div>
</div><!-- #secondary -->