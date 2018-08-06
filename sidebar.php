<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package atlas-concern
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>
<div class="col-md-4">
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside><!-- #secondary -->
</div>
