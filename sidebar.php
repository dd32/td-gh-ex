	<aside id="oloWidget">
		<ul>
			<?php if (is_home()) { ?>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(''.__('Home', 'olo').'') ) : ?>
					<li id="archives" class="widget">
						<h3 class="widget-title"><?php _e( 'Archives', 'olo' ); ?></h3>
						<ul>
							<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
						</ul>
					</li>

					<li id="meta" class="widget">
						<h3 class="widget-title"><?php _e( 'Meta', 'olo' ); ?></h3>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
					</li>
				<?php endif; ?>
			<?php } elseif( is_single() ) { ?>
				<?php dynamic_sidebar( 'Single' ); ?>
			<?php } else { ?>
				<?php dynamic_sidebar( 'Other' ); ?>
			<?php } ?>
		</ul>
	</aside><!-- #oloWidget-->