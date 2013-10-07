<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package ThinkUpThemes
 */
?>

		<div id="sidebar">
		<div id="sidebar-core">

			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( thinkup_input_sidebars() ) ) : ?>

				<aside id="search" class="widget widget_search">
					<h3 class="widget-title">Please Add Widgets</h3>
					<div class="widget-main"><div class="error-icon">
						<p>Remove this message by adding widgets to the Sidebar from the Widgets section of the Wordpress admin area.</p>
						<a href="<?php echo admin_url( 'admin.php' ); ?>" title="No Widgets Selected">Click here to go to Widget area.</a>
					</div></div>
				</aside>

			<?php endif; ?>

		</div>
		</div><!-- #sidebar -->
				