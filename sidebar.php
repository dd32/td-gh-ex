<?php
/*	@Theme Name	:	Wallstreet
* 	@file         :	sidebar.php
* 	@package      :	Wallstreet
* 	@filesource   :	wp-content/themes/Wallstreet/sidebar.php
*/	
?>
<!--Sidebar Area-->
		<div class="col-md-4">
			<div class="sidebar-section">
			<?php if ( is_active_sidebar( 'sidebar_primary' ) )
			{ dynamic_sidebar( 'sidebar_primary' );	}
			else {
			$args=array(
			'before_widget' => '<div class="sidebar-widget" >',
			'after_widget' => '</div>',
			'before_title' => '<div class="sidebar-widget-title"><h2>',
			'after_title' => '</h2></div>',);  
			the_widget('WP_Widget_Archives','',$args); 	
			the_widget('WP_Widget_Categories','',$args);	
			the_widget('WP_Widget_Pages','',$args); 
			the_widget('WP_Widget_Tag_Cloud','',$args);
			} ?>
				<!--Tags Widget-->
			</div>
		</div>
		<!--Sidebar Area-->