<nav id="site-navigation" class="main-navigation" role="navigation">
	<span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
		 <span class="screen-reader-text">
			<?php esc_html_e('Primary Menu', 'advance-blog'); ?>
		</span>
		<i class="ham"></i>
	</span>

	<?php wp_nav_menu(array(
		'theme_location' => 'menu-1',
		'menu_id' => 'primary-menu',
		'container' => 'div',
		'container_class' => 'menu'
	)); ?>
</nav>
