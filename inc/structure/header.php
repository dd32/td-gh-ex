<?php
/**
 * Template functions used for the site header.
 *
 * @package actions
 */

if ( ! function_exists( 'actions_site_branding' ) ) {
	/**
	 * Display Site Branding
	 * @since  1.0.0
	 * @return void
	 */
	function actions_site_branding() {
		
	?>
		<div class="main">
			<div class="header-elements">
				<?php actions_the_custom_logo(); ?>					
				<span class="site-title">
					<?php 
					$title = get_bloginfo('name');
					$description = get_bloginfo( 'description'); ?>						
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $description ); ?>" alt="<?php echo esc_attr( $title ); ?>">
							<?php bloginfo( 'name' ); ?>
						</a>
				</span>
			</div>
		</div>
			
	<?php 
	}
}

if ( ! function_exists( 'actions_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 * @since  1.0.0
	 * @return void
	 */
	function actions_primary_navigation() {
		if ( has_nav_menu( 'primary' ) ) : ?>
			<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'actions' ); ?></button>
			<div id="site-header-menu" class="site-header-menu">
				<div class="main">
					<?php if ( has_nav_menu( 'primary' ) ) : ?>
						<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'actions' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class'     => 'primary-menu',
							) );
						?>
						</nav><!-- .main-navigation -->
					<?php endif; ?>
				</div>
			</div><!-- .site-header-menu -->
		<?php endif; ?>
	<?php
	}
}

if ( ! function_exists( 'actions_skip_links' ) ) {
	/**
	 * Skip links
	 * @since  1.4.1
	 * @return void
	 */
	function actions_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#site-navigation"><?php _e( 'Skip to navigation', 'actions' ); ?></a>
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'actions' ); ?></a>
		<?php
	}
}