<?php
	/* Header style 1 for anorya theme */
?>



			<div class="container center-logo">
				<?php if( has_custom_logo()): ?>
					<div itemscope itemtype="http://schema.org/Brand">
						<?php the_custom_logo(); ?>
					</div>
				<?php else: ?>
					<h1><a href="<?php print esc_url(home_url( '/' )); ?>">
						<?php print esc_attr(get_bloginfo( 'name', 'display' ) ); ?>
					</a></h1>
				<?php endif; ?>
			</div>
				
			
				
				<?php wp_nav_menu( array('theme_location' => 'primary_navigation', 
										 'walker'=>new Anorya_Primary_Nav_Walker(),
										 'container' => 'nav',
										 'container_class' => 'navbar',
										 'container_id' => 'primaryNav',
										 'menu_class'=>'nav navbar-nav' ) );
										 
?>