<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @since Akyuz 1.0
 */

?>
	<div id="secondary" class="widget-area span-8 last" role="complementary">
		
		<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>

			<aside id="archives" class="widget">
				<h3 class="widget-title"><?php _e( 'Archives', AKYUZ_TEXT_DOMAIN ); ?></h3>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h3 class="widget-title"><?php _e( 'Meta', AKYUZ_TEXT_DOMAIN ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary .widget-area -->