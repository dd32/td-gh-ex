<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Artist
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="widget-area-toggle">
	<span class="genericon genericon-plus"></span>
</div>
<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
