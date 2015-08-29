<div class="sticky-header clear">
	<div class="sticky-header-inner clear">
	
		<div class="col-md-4">
			<?php if( get_theme_mod( 'agama_logo', '' ) ): ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					<img src="<?php echo esc_url( get_theme_mod( 'agama_logo' ) ); ?>" class="logo">
				</a>
			<?php else: ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; ?>
		</div>
		
		<nav role="navigation" class="col-md-8">
			<?php wp_nav_menu( array( 'theme_location' => 'top', 'menu_class' => 'sticky-nav' ) ); ?>
		</nav><!-- .top-navigation -->
		
		<div class="mobile-nav col-md-8">
			<div class="mobile-nav-icons">
				<?php if( class_exists('Woocommerce') ): global $woocommerce; ?>
				<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="fa fa-2x fa-shopping-cart"></a>
				<?php endif; ?>
				<a class="fa fa-2x fa-bars"></a>
			</div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'mobile-nav-menu' ) ); ?>
		</div><!-- .mobile-nav -->
		
	</div>
</div>