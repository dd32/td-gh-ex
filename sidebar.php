<?php
/**
 * The sidebar containing the main widget area
 *
 * @package anorya
 */

	if ( ! is_active_sidebar( 'anorya_widget_main_sidebar' ) ) {
		return;
	}
?>

	
	<aside id="secondary" class="main-sidebar widget-area col-md-4 col-sm-5">
		<?php dynamic_sidebar( 'anorya_widget_main_sidebar' ); ?>
	</aside>
