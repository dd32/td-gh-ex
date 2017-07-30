<?php
/**
 * Navigation Header
 *
 * Template part for rendering header navigation.
 *
 * @package ariel
 */
?>
<nav class="navbar navbar-default">
	<?php
		if ( has_nav_menu( 'header' ) ) :
			$args = array(
				'theme_location'    => 'header',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'navbar-collapse',
				'menu_class'        => 'nav navbar-nav',
			);

			wp_nav_menu( $args );

		else :

			ariel_default_nav();

		endif; // has_nav_menu( 'header' ) ?>

</nav>