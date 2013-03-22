
 
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-primary') ) : ?>     
						
		<?php the_widget('WP_Widget_Archives'); ?><div class="bog_right_2bo"></div>
		<?php the_widget('WP_Widget_Categories'); ?><div class="bog_right_2bo"></div>
		<?php the_widget('WP_Widget_Meta'); ?><div class="bog_right_2bo"></div>
		<?php the_widget('WP_Widget_Pages'); ?><div class="bog_right_2bo"></div>
																					
								 
	<?php endif;?>
	
	
 