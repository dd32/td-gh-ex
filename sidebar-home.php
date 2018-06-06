<?php
/**
 * The sidebar containing the main home columns widget areas
 *
 */
?>

<div id="top-widget">

	<?php if ( is_active_sidebar( 'homepage-top-widget-area' ) ) : ?>

			<div id="top-widget-inner">

				<?php if ( !dynamic_sidebar( 'homepage-top-widget-area' ) && current_user_can('edit_theme_options') ) : ?>

						<h2 class="sidebar-title">
							<?php esc_html_e('Homepage Above Columns', 'ayaairport'); ?>
						</h2><!-- .sidebar-title -->
								
						<div class="sidebar-after-title">
						</div><!-- .sidebar-after-title -->
								
						<div class="textwidget">
							<?php esc_html_e('This is homepage above columns widget area. To customize it, please navigate to Admin Panel -> Appearance -> Widgets and add widgets to Homepage Above Columns.', 'ayaairport'); ?>
						</div><!-- .textwidget -->

				<?php endif; // end of ! dynamic_sidebar( 'homepage-top-widget-area' )
						  ?>

				<div class="clear">
				</div>

			</div>

	<?php endif; ?>

</div>
