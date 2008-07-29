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
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>				<?php endif; ?>
		</div>