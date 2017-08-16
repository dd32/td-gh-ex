<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fmi
 */

if ( ! is_active_sidebar( 'fmi_left_sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'fmi_left_sidebar' ); ?>
</aside><!-- #secondary -->
