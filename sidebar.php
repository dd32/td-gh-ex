<?php
/**
 * Sidebar template containing the primary and secondary widget areas
 *
 * @package Acuarela
 * @since Acuarela 1.0
 */

if ( is_active_sidebar( 'sidebar' ) ) : ?>
<div class="sidebars">
	<div id="sidebar" class="widget-area sidebar" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div><!-- #primary .widget-area -->
</div>
<?php   endif; ?>
