<div class="top-nav-wrapper">

	<?php if( get_theme_mod( 'agama_top_navigation', '1' ) == '1' || is_customize_preview() ): // Top navigation?>
		<nav id="top-navigation" class="top-navigation col-md-6" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'top', 'menu_class' => 'top-nav-menu' ) ); ?>
		</nav><!-- .top-navigation -->
	<?php endif; ?>
	
	<?php if( get_theme_mod( 'agama_top_nav_social', false ) ): // Social icons ?>
		<div id="top-nav-social" class="col-md-6">
			<?php agama_social_icons( $tip_position = 'bottom' ); ?>
		</div><!-- #top-nav-social -->
	<?php endif; ?>

</div><!-- .top-wrapper -->

<hgroup>
	<?php if( get_theme_mod( 'agama_logo' ) ): ?>
	<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		<img src="<?php echo esc_url( get_theme_mod( 'agama_logo', '' ) ); ?>" class="logo">
	</a>
	<?php else: ?>
	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	<?php endif; ?>
</hgroup><!-- hgroup -->

<nav id="site-navigation" class="main-navigation" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
</nav><!-- #main-navigation -->

<div class="mobile-nav">
	<div class="mobile-nav-icons">
		<?php if( class_exists('Woocommerce') ): global $woocommerce; ?>
		<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="fa fa-2x fa-shopping-cart"></a>
		<?php endif; ?>
		<a class="fa fa-2x fa-bars"></a>
	</div>
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'mobile-nav-menu' ) ); ?>
</div><!-- .mobile-nav -->