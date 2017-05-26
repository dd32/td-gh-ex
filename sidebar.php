<?php
/**
 * Sidebar template containing the primary and secondary widget areas
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
 */
?>

<?php 
	// A first sidebar for widgets.
		if(is_active_sidebar('sidebar') ) : ?>
			<div id="primary-sidebar" class="widget-area sidebar" role="complementary">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</div><!-- #primary .widget-area -->
<?php 	endif; ?>
