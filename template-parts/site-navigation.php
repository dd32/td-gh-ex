<?php
/**
 * The template for displaying site navigation
 * @package Keratin
 */
?>

<nav id="site-navigation" class="main-navigation">
	<div class="main-navigation-inside">
		<div class="toggle-menu-wrapper">
			<a href="#header-menu-responsive" title="<?php esc_attr_e( 'Menu', 'keratin' ); ?>" class="toggle-menu-control">
				<span class="toggle-menu-label"><?php esc_html_e( 'Menu', 'keratin' ); ?></span>
			</a>
		</div>

		<?php
		// Header Menu
		wp_nav_menu( apply_filters( 'keratin_header_menu_args', array(
			'container'       => 'div',
			'container_class' => 'site-header-menu-wrapper',
			'theme_location'  => 'header-menu',
			'menu_class'      => 'site-header-menu sf-menu',
			'menu_id'         => 'menu-1',
			'depth'           => 3,
		) ) );
		?>
	</div><!-- .main-navigation-inside -->
</nav><!-- .main-navigation -->
