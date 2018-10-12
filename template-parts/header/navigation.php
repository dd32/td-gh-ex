<?php
/**
 * The template file to display the header navigation
 *
 * @package agncy
 */

?>
<div class="desktop-nav" role="navigation">
	<?php

		/*
		 * Call the header nav menu
		 */
		$args = array(
			'theme_location'  => 'header',
			'menu_class'      => 'desktop-menu clearfix header',
			'container'       => 'nav',
			'container_class' => 'header-menu-desktop',
			'link_class'      => 'color-primary--hover',
			'fallback_cb'     => false,
			'depth'           => 3,
		);
		wp_nav_menu( $args );
		?>
</div>
