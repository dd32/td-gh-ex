<?php
	/* Header style 4 for anorya theme */
?>

		<div class="container-fluid cover-header-background" >
			<div class="container center-logo">
				<?php anorya_display_logo(); ?>
			</div>
		</div>		
			
				
		<?php wp_nav_menu( array('theme_location' => 'primary_navigation', 
								 'walker'=>new Anorya_Primary_Nav_Walker(),
								 'container' => 'nav',
								 'container_class' => 'navbar',
								 'container_id' => 'primaryNav',
								 'menu_class'=>'nav navbar-nav' ) );
										 
?>