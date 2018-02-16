<?php
wp_nav_menu( array(
	'theme_location'  => 'top-menu',
	'menu_class'      => 'topbar-menu',
	'container'       => 'nav',
	'container_class' => 'topbar-menu-nav',
	'fallback_cb'     => 'atlast_business_wp_menu_fallback'
) );