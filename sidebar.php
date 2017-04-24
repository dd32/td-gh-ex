<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package basicstore
 */

if ( ! is_active_sidebar( 'sidebar-site' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-md-3">

	<?php dynamic_sidebar( 'sidebar-site' ); ?>

</aside><!-- #secondary -->
