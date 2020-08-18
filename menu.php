
		
		<div id="logo">
			<?php the_custom_logo(); ?>
		</div>

	<div id="header-text">
	
		<div class="site-title">
		     <a href="<?php echo esc_url(home_url( '/' )); ?>"><?php bloginfo('name'); ?></a>  
		</div>
                  
		<div class="site-description"><?php echo esc_html(get_bloginfo( 'description', 'display' )); ?></div>   

	</div>
	

		<div id="wrapper">
	
		<div id="header">




		<?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'container_class' => 'nav', 'container_id' => 'topmenu', 'fallback_cb' => 'false' )); ?>

	<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container_class' => 'nav', 'container_id' => 'primmenu', 'fallback_cb' => 'false' )); ?>
		
		</div>