<div id="sidebar">
	<ul>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			
			<?php wp_list_pages('title_li=<h2>' . __('Pages', 'rcg-forest') . '</h2>' ); ?>
			
			<li id="archives">
				<h2><?php _e( 'Archives', 'twentyten' ); ?></h2>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<?php if ( is_home() || is_page() ) { ?>
				<?php wp_list_bookmarks(); ?>

				<li><h2><?php _e('Meta', 'rcg-forest'); ?></h2>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</li>
			<?php } ?>
		<?php endif; ?>
	</ul>
</div>
