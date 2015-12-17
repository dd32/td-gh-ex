<?php
/**
 * The secondary sidebar template.
 *
 * @package aesblo
 * @since 1.0.0
 */
?>
<div id="secondary-sidebar" class="secondary-sidebar">
	<div class="sidebar-buttons clearfix">
		<?php if ( has_nav_menu( 'primary' ) || is_active_sidebar( 'primary-sidebar' ) ) : ?>
			<button type="button" class="active-primary-sidebar button-toggle">
      	<span class="screen-reader-text"><?php _e( 'Toggle to the primary sidebar', 'aesblo' ); ?> </span>
        <span class="fa fa-bars fa-2x"></span>
      </button>
		<?php endif; ?>
		<button type="button" class="close-secondary-sidebar button-toggle">
    	<span class="screen-reader-text"><?php _e( 'Close the secondary sidebar', 'aesblo' ); ?> </span>
      <span class="fa fa-close fa-2x"></span>
    </button>
	</div>	
	
	<?php if ( is_active_sidebar( 'secondary-sidebar' ) ) : ?>
		<aside id="secondary-widget" class="secondary-widget" role="complementary" aria-label="<?php esc_attr_e( 'Secondary sidebar', 'aesblo' ); ?>">
			<?php dynamic_sidebar( 'secondary-sidebar' ); ?>
		</aside><!-- #secondary-widget -->
	<?php endif; ?>
</div><!-- #secondary-sidebar -->