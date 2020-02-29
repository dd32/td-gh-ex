<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Arbutus
 */

if ( ! is_active_sidebar( 'footer' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'footer' ); ?>
</div><!-- #secondary -->
