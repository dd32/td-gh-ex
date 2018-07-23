<?php
	/* Header style 5 for anorya theme */
?>

		<div class="container-fluid cover-header-background">
			<div class="container header-area">
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<?php if( has_custom_logo()): ?>
							<div itemscope itemtype="http://schema.org/Brand">
								<?php the_custom_logo(); ?>
							</div>
						<?php else: ?>
							<h1><a href="<?php print esc_url_raw(home_url( '/' )); ?>">
								<?php print esc_attr(get_bloginfo( 'name', 'display' ) ); ?>
							</a></h1>
						<?php endif; ?>
					</div>
					<div class="col-md-8  col-sm-12 header-area-content">
						<?php dynamic_sidebar( 'anorya_widget_header_banner' ); ?>
					</div>
				</div>
			</div>
		</div>	
				
		<?php wp_nav_menu( array('theme_location' => 'primary_navigation', 
								 'walker'=>new Anorya_Primary_Nav_Walker(),
								 'container' => 'nav',
								 'container_class' => 'navbar',
								 'container_id' => 'primaryNav',
								 'menu_class'=>'nav navbar-nav' ) );
?>