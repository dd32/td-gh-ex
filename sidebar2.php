		<div id="navigation2">
			<h2>&nbsp;</h2>
			<h2 class="small">Meta</h2>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			</ul>
			<h2 class="small">Archives</h2>
			<ul>
				<?php wp_get_archives(); ?>
			</ul>
			<h2 class="small">RSS Feeds</h2>
			<ul>
				<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
			</ul>
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>				<?php endif; ?>
		</div>