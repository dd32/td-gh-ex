
<!-- begin sidebar -->

		<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar') ) : ?>
			
			<div class="widg">
				<div class="title"><h1>Pages</h1></div>
				<ul>
					<?php wp_list_pages('title_li='); ?>
				</ul>
			</div>
		
			<div class="widg">
				<div class="title"><h1>Categories</h1></div>
				<ul>
					 <?php wp_list_cats('sort_column=name'); ?>
				</ul>
			</div>
		
		<?php endif; ?>
		
		
<!-- end sidebar -->
