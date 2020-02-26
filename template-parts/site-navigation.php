<?php
/**
 * The template for displaying site navigation
 * @package Chip Life
 */
?>

<nav id="site-navigation" class="main-navigation">
	<div class="container">
		<div class="row">
			<div class="col-xxl-12">
				<div class="main-navigation-inside">
					<div class="toggle-menu-wrapper">
						<a href="#header-menu-responsive" title="<?php esc_attr_e( 'Menu', 'chip-life' ); ?>" class="toggle-menu-control">
							<span class="toggle-menu-label"><?php esc_html_e( 'Menu', 'chip-life' ); ?></span>
						</a>
					</div>

					<?php
					// Header Menu
					wp_nav_menu( apply_filters( 'chip_life_header_menu_args', array(
						'container'       => 'div',
						'container_class' => 'site-header-menu-wrapper',
						'theme_location'  => 'header-menu',
						'menu_class'      => 'site-header-menu sf-menu',
						'menu_id'         => 'menu-1',
						'depth'           => 3,
					) ) );
					?>
				</div><!-- .main-navigation-inside -->
			</div><!-- .col-xxl-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
</nav><!-- .main-navigation -->
