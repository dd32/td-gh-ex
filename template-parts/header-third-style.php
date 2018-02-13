<?php
	/* Header style 3 for anorya theme */
?>



			<div class="container header-area">
				<div class="row">
					<div class="col-md-4">
						<?php the_custom_logo(); ?>
					</div>
					<div class="col-md-8 header-area-content">
						<?php wp_nav_menu( array('theme_location' => 'primary_navigation', 
									 'walker'=>new Anorya_Primary_Nav_Walker(),
									 'container' => 'nav',
									 'container_class' => 'navbar',
									 'container_id' => 'primaryNav',
									 'menu_class'=>'nav navbar-nav' ) ); ?>
					</div>
				</div>
			</div>
