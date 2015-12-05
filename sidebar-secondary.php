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
			<button type="button" class="active-primary-sidebar"><span class="fa fa-bars fa-2x"></span></button>
		<?php endif; ?>
		<button type="button" class="close-secondary-sidebar"><span class="fa fa-close fa-2x"></span></button>
	</div>	
	
	<?php if ( is_active_sidebar( 'secondary-sidebar' ) ) : ?>
		<div id="secondary-widget" class="secondary-widget">
			<?php dynamic_sidebar( 'secondary-sidebar' ); ?>
		</div><!-- #secondary-widget -->
	<?php endif; ?>
</div><!-- #secondary-sidebar -->