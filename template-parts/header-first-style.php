<?php
	/* Header style 1 for anorya theme */
?>



			<div class="container center-logo">
				<?php the_custom_logo(); ?>
			</div>
				
			
				
				<?php wp_nav_menu( array('theme_location' => 'primary_navigation', 
										 'walker'=>new Anorya_Primary_Nav_Walker(),
										 'container' => 'nav',
										 'container_class' => 'navbar',
										 'container_id' => 'primaryNav',
										 'menu_class'=>'nav navbar-nav' ) );
										 
?>