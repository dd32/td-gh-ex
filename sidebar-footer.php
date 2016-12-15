<?php
/**
 * The sidebar containing the footer widget areas.
 *
 * @package Azalea
 */
?>
<aside id="footer-widgets" class="footer-widgets" aria-label="<?php esc_attr_e( 'Footer Widgets', 'azalea' ); ?>">
	<div class="inner">
		<div class="grid">
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div class="widget-area one-third">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
			<div class="widget-area one-third">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
			<div class="widget-area one-third">
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
		</div><!-- .grid -->
	</div><!-- .inner -->
</aside><!-- .footer-widgets -->
