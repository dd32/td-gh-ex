<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Avien_Light
 */
?>
<div class="col-md-3">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
		<div id="sidebar" role="complementary">
			<div class="sidebar-inner">
				<aside class="widget-area">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</aside>
			</div>
		</div>
	<?php } ?>
</div>
