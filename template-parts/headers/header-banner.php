<?php
if ( has_post_thumbnail() ): ?>
	<header id="masthead" class="site-header-thumbnail" role="banner">
<?php else: ?>
	<header id="masthead" class="site-header" role="banner">
<?php endif; ?>

	<a class="screen-reader-text skip-link" href="#main"><?php _e( 'Skip to content', 'acuarela' ); ?></a>
	<div id="site-identity" class="site-identity">
<?php if ( has_custom_logo() ) :
		the_custom_logo();
	else : ?>
		<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<h1 class="site-title"><?php esc_html( bloginfo( 'name' ) ); ?></h1>
			<h2 class="site-description"><?php esc_html( bloginfo( 'description' ) ); ?></h2>
		</a> 

<?php endif ?>
	</div><!--/site-identity-->
	<button id="nav-button" class="menu-toggle" role="navigation button"><?php _e( 'Menu', 'acuarela' ); ?></button>

	<div id="navigation">
		<nav id="main-menu" class="site-navigation primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu ', 'acuarela' ); ?>">
			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' => 'ul',
				'menu_id' => 'primary-menu',
			) ); ?>
		</nav><!--main-menu-->

	<?php if ( has_nav_menu( 'social' ) ) : ?>
		<nav id="header-social-menu" class="site-navigation social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Menu ', 'acuarela' ); ?>" >
		<?php wp_nav_menu( array(
			'theme_location' => 'social',
			'container' => 'ul',
			'depth' => 1,
			'menu_class' => 'social-menu',
			'link_before'	=> '<span class="screen-reader-text">',
			'link_after'	=> '</span>',
		) ); ?>
		</nav><!--social-menu-->
	<?php endif ?>

	</div><!--/navigation-->
<?php get_search_form(); ?>
</header><!--/header-->