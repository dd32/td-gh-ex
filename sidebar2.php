		<div id="navigation2">
			<h2>&nbsp;</h2>
			<h2 class="small">Latest Posts</h2>
			<ul>
				<?php wp_get_archives('type=postbypost&limit=5'); ?>
			</ul>
			<h2 class="small">Archives</h2>
			<ul>
				<?php wp_get_archives(); ?>
			</ul>
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>				<?php endif; ?>
		</div>