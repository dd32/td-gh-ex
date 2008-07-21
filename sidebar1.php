		<div id="navigation1">
			<h2>Essentials</h2>
			<h2 class="small">Pages</h2>
			<ul>
				<li><a href="<?php bloginfo('url');?>">Home</a></li>
				<?php wp_list_pages('title_li=&sort_column=menu_order'); ?>
			</ul>
			<h2 class="small">Categories</h2>
			<ul>
				<?php wp_list_cats('show_count=1'); ?>
			</ul>
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>				<?php endif; ?>
		</div>