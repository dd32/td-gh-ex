<?php
/**
 * Main navigation bar.
 *
 */   
 
                                          
?>
<nav id="site-navigation" class="navbar navbar-expand-lg <?php echo esc_attr(apply_filters( 'bahotel_l_navbar_style', '')); ?>" role="navigation">

	<div class="container">
	
		<!-- Brand -->
		<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo( 'name' )); ?>" rel="home">
			<?php if ( has_custom_logo() ) : ?>
				<?php $custom_logo_id = get_theme_mod( 'custom_logo' ); ?>
				<?php $image = wp_get_attachment_image_src( $custom_logo_id, 'full' ); ?>
				<img class="site-logo" src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_bloginfo( 'name' )); ?>" />
			<?php else : ?>
				<h1><?php echo esc_attr(get_bloginfo( 'name' )); ?></h1>
			<?php endif; ?>
			<?php if ( ( $tagline = get_bloginfo('description') ) && ( ! has_custom_logo() ) ) : ?>
				<span class="site-description"><?php echo esc_attr( $tagline ); ?></span>
			<?php endif; ?>
		</a>
        
     <div class="header-top-row">   
        
        <div class="header-menu-row">
		
		<!-- Main menu -->
		<?php
		$walker = apply_filters( 'bahotel_l_nav_menu_walker', '' );
		$fallback = apply_filters( 'bahotel_l_nav_menu_fallback', '' );
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_class' => 'navbar-nav',
			'menu_id' => 'nav_menu',
			'container' => 'div',
			'container_class' => 'collapse navbar-collapse navbar-collapse-primary justify-content-end',
			'container_id' => 'nav_menu_container',
			'walker' => new $walker,
			'fallback_cb' => $fallback,
		) );
		?>
        
           <span class="menu-underline"></span>
        
        </div>
        
        <?php do_action( 'bahotel_l_header_navbar_after' ); ?>
        
        <!-- Toggler/collapsible button -->
        <div class="header-contacts-toggler navbar-toggler">
		  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse-primary" aria-controls="primary-menu" aria-expanded="false">
			<span class="navbar-toggler-icon"></span>
		  </button>
        </div>
        
      </div>
        
	</div>
	
</nav><!-- #site-navigation -->