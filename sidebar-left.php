<?php
/**
 * The sidebar containing the Left sidebar widget area
 *
 */
?>

<aside id="sidebar-left">

	<?php
		/**
		 * Display Widgets dragged in the 'Sidebar' Widget Area
		 */
	?>
	<?php if ( !dynamic_sidebar( 'left-sidebar-widget-area' ) ) : ?>

			<?php
				/**
				 * Add Default Widgets for 'Sidebar Widget Area'
			     * If you want to customize it, log in to your WordPress Admin Panel,
			     * Goto Appearance -> Widgets and drag widgets to 'Sidebar'
		         */
			?>
			<?php
			
				the_widget( 'WP_Widget_Categories', array(), array ('before_title' => '<h3 class="sidebar-title">',
																	'after_title'  => '</h3><div class="sidebar-after-title"></div>') );
			?>

	<?php endif; ?>
	
</aside><!-- #sidebar -->