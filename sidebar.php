<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @since Akyuz 1.0
 */

?>
	<div id="secondary" class="widget-area span-8 last" role="complementary">
		<aside id="advertise-first" class="widget">
			<ul>
				<?php echo akyuz_get_options_value(AKYUZ_SHORTNAME.'_advertising_ads_sidebar_1');?>
			</ul>
		</aside>
		
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

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

		<aside id="advertise-last" class="widget">
			<ul>
				<?php echo akyuz_get_options_value(AKYUZ_SHORTNAME.'_advertising_ads_sidebar_2');?>
			</ul>
		</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary .widget-area -->