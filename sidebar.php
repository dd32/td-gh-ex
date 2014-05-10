	<aside id="oloWidget">
		<ul>
			<?php if (is_home()) { ?>
				<?php if ( !dynamic_sidebar('home') ) : ?>
					<li id="archives" class="widget widget_archive">
						<h2><span><?php _e( 'Archives', 'olo' ); ?></span></h2>
						<ul>
							<?php wp_get_archives( array( 'type' => 'monthly', 'show_post_count' => true ) ); ?>
						</ul>
					</li>

					<li id="meta" class="widget">
						<h2><span><?php _e( 'Meta', 'olo' ); ?></span></h2>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
					</li>
				<?php endif; ?>
			<?php } elseif( is_single() ) { ?>
				<?php dynamic_sidebar( 'single' ); ?>
			<?php } else { ?>
				<?php dynamic_sidebar( 'other' ); ?>
			<?php } ?>
		</ul>
	</aside><!-- #oloWidget-->