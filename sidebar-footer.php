<?php
/**
 * The Footer widget areas.
 *
 * @since Akyuz 1.0
 */
?>

<?php
	if (   ! is_active_sidebar( 'sidebar-3' )
		&& ! is_active_sidebar( 'sidebar-4' )
		&& ! is_active_sidebar( 'sidebar-5' )
		&& ! is_active_sidebar( 'sidebar-6' )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<div id="supplementary" <?php akyuz_footer_sidebar_class(); ?> >
	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div id="first" class="widget-area span-6" role="complementary">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div><!-- #first .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<div id="second" class="widget-area span-6" role="complementary">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div><!-- #second .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
	<div id="third" class="widget-area span-6" role="complementary">
		<?php dynamic_sidebar( 'sidebar-5' ); ?>
	</div><!-- #third .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
	<div id="fourty" class="widget-area span-6 last" role="complementary">
		<?php dynamic_sidebar( 'sidebar-6' ); ?>
	</div><!-- #third .widget-area -->
	<?php endif; ?>
	
</div><!-- #supplementary -->