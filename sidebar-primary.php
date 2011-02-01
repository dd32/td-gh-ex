<?php
/**
 * The left; fixed Sidebar containing the primary widget areas.
 */
?>

		<ul class="sidebar">

<?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
			<li>
				<h3><?php _e( 'Archives', 'ari' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li>
				<h3><?php _e( 'Meta', 'ari' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php endif; // end primary widget area ?>
		</ul>
		<!--end Sidebar-->
