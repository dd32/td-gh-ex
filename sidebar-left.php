<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Accesspress Mag
 */

if ( ! is_active_sidebar( 'sidebar-left' ) ) {
	return;
}
?>

<div id="secondary-left-sidebar" class="" role="complementary">
	<div id="secondary">
		<?php dynamic_sidebar( 'sidebar-left' ); ?>
	</div>
</div><!-- #secondary -->