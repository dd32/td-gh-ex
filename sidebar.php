			  <!-- Spa-Saloon Sidebar -->
			 

					<div class="span4" id="sidebar">	
			       <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-primary') ) : ?> 
				    	   <?php the_widget('Spa_Recent_Posts'); ?>
						   <?php the_widget('Spa_Recent_Products'); ?>
					      <?php the_widget('WP_spa_contact'); ?>
										  
					<?php endif;?>
					</div><!-- /Spa-Saloon Sidebar -->
		  