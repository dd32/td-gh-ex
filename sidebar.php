<?php
/**
 * The primary sidebar template.
 *
 * @package aesblo
 * @since 1.0.0
 */
?>
<div id="primary-sidebar" class="primary-sidebar primary-sidebar-expand">
	<header id="masthead" class="site-header" role="banner">
		<?php 
			aesblo_site_branding();
			aesblo_quicklinks(); 
		?>		
	</header><!-- #masthead -->
	
	
	<div id="primary-sidebar-content" class="primary-sidebar-content">
		
		<div class="sidebar-buttons clearfix">
			<?php if ( is_active_sidebar( 'secondary-sidebar' ) ) : ?>
				<button type="button" class="active-secondary-sidebar button-toggle">
        	<span class="screen-reader-text"><?php _e( 'Toggle to the secondary sidebar', 'aesblo' ); ?> </span>
          <span class="fa fa-ellipsis-h fa-2x"></span>
        </button>
			<?php endif; ?>
			<button type="button" class="close-primary-sidebar button-toggle">
      	<span class="screen-reader-text"><?php _e( 'Close the primary sidebar', 'aesblo' ); ?> </span>
        <span class="fa fa-close fa-2x"></span>
      </button>
		</div>
	
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="navigation" class="site-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'aesblo' ); ?>">
				<?php 
					wp_nav_menu( array(
						'theme_location'		=> 'primary',
						'container'				=> '',
						'menu_class'			=> 'primary-menu',
						'walker'				=> new aesblo_walker_primary_nav_menu
					) );
				?>
			</nav><!-- #navigation -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'primary-sidebar' ) ) : ?>
			<aside id="primary-widget" class="primary-widget" role="complementary" aria-label="<?php esc_attr_e( 'Primary sidebar', 'aesblo' ); ?>">
				<?php dynamic_sidebar( 'primary-sidebar' ); ?>
			</aside><!-- #primary-widget -->
		<?php endif; ?>
	</div>
</div><!-- #primary-sidebar -->