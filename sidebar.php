<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agensy
 */

if ( ! is_active_sidebar( 'agensy-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'agensy-sidebar' ); ?>
</aside><!-- #secondary -->
