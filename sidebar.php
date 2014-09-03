<?php
/*	@Theme Name	:	Corpbiz
* 	@file         :	sidebar.php
* 	@package      :	corpbiz
* 	@author       :	Priyanshu Mittal
* 	@filesource   :	wp-content/themes/corpbiz/sidebar.php
*/	
?>
<div class="col-md-4 corpo_sidebar">	
	<?php if ( is_active_sidebar( 'sidebar-primary' ) )
			{ dynamic_sidebar( 'sidebar-primary' );	}
			else  { ?>
		<!--Sidebar-->			
		<?php the_widget('WP_Widget_Archives'); ?>
	   <?php the_widget('WP_Widget_Categories'); ?>
	  <?php the_widget('WP_Widget_Recent_Comments'); ?>	
			
		<!--Sidebar-->
		<?php } ?>	
</div><!-- Right sidebar ---->