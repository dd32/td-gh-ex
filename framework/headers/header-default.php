<?php
	if( ! get_theme_mod( 'agama_top_navigation', true ) ) {
		$agama_top_nav_social_class = 'class="col-md-12"';
	} else {
		$agama_top_nav_social_class = 'class="col-md-6"';
	}
	
	if( ! get_theme_mod( 'agama_top_nav_social', true ) ) {
		$agama_top_nav_class = 'class="top-navigation col-md-12"';
	} else {
		$agama_top_nav_class = 'class="top-navigation col-md-6"';
	}
?>

	<div class="top-nav-wrapper">
		<div class="top-nav-sub-wrapper">
			
			<?php if( get_theme_mod( 'agama_top_navigation', true ) ): // Top navigation ?>
			<nav id="top-navigation" <?php echo $agama_top_nav_class; ?> role="navigation">
				
				<?php echo Agama::menu( 'top', 'top-nav-menu' ); ?>
			
			</nav><!-- .top-navigation -->
			<?php endif; ?>
			
			<?php if( get_theme_mod( 'agama_top_nav_social', true ) ): ?>
			<!-- Social Icons -->
			<div id="top-nav-social" <?php echo $agama_top_nav_social_class; ?>>
				
				<?php Agama::sociali('bottom'); ?>
					
			</div><!-- #top-nav-social -->
			<?php endif; ?>
		
		</div>
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
	
		<?php echo Agama::menu( 'primary', 'nav-menu' ); ?>
		
	</nav><!-- #main-navigation -->

	<div class="mobile-nav">
		<div class="mobile-nav-icons">
			<?php if( class_exists('Woocommerce') ): global $woocommerce; ?>
			<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="fa fa-2x fa-shopping-cart"></a>
			<?php endif; ?>
			<a class="fa fa-2x fa-bars"></a>
		</div>
		<?php echo Agama::menu( 'primary', 'mobile-nav-menu' ); ?>
	</div><!-- .mobile-nav -->