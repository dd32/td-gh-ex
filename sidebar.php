<div class="span4" id="sidebar">	
   <?php if (  !dynamic_sidebar('sidebar-primary') ) : ?> 
	   <?php the_widget('WP_Widget_Archives'); ?>
	   <?php the_widget('WP_Widget_Categories'); ?>
	  <?php the_widget('WP_Widget_Recent_Comments'); ?>						  
	<?php endif;?>
</div>