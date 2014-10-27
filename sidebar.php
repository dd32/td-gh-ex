<?php
/*	@Theme Name	:	Wallstreet
* 	@file         :	sidebar.php
* 	@package      :	Wallstreet
* 	@filesource   :	wp-content/themes/Wallstreet/sidebar.php
*/	
?>
<!--Sidebar Area-->
<?php if ( is_active_sidebar( 'sidebar_primary' ) ){ ?>
		<div class="col-md-4">
			<div class="sidebar-section">
			<?php dynamic_sidebar( 'sidebar_primary' ); ?>
			</div>
		</div>
<?php } ?>		
		<!--Sidebar Area-->