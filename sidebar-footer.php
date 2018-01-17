<?php
/**
 * The Sidebar containing the Sidebar
 *
 * @package Gump
 * @since Gump 1.0.0
 */
if (   ! is_active_sidebar( 'footer-sidebar-1' )
	&& ! is_active_sidebar( 'footer-sidebar-2' )
	&& ! is_active_sidebar( 'footer-sidebar-3' )
	) {
return;
}
?>

	<div class="footer-sidebar clear">
		<?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>
			<div id="footer-sidebar-1" class="footer-widget" role="complementary">
				<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
			<div id="footer-sidebar-2" class="footer-widget" role="complementary">
				<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
			<div id="footer-sidebar-3" class="footer-widget" role="complementary">
				<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
	</div><!-- #footer-sidebar -->