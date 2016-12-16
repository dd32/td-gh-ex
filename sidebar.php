<?php
/**
 * Sidebar template containing the primary and secondary widget areas
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */
?>

<?php 
	// A first sidebar for widgets.
		if(is_active_sidebar('sidebar-1') ) : ?>
			<div id="primary-sidebar" class="widget-area sidebar" role="complementary">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- #primary .widget-area -->
<?php 	endif; ?>


