<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agency Lite
 */

if ( ! is_active_sidebar( 'agency-lite-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'agency-lite-sidebar' ); ?>
</aside><!-- #secondary -->
