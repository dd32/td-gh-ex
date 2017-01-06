<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Big Blue
 */

if ( ! is_active_sidebar( 'big-blue-sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'big-blue-sidebar-1' ); ?>
</aside><!-- #secondary -->
