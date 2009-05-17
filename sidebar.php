<ul><?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
		
		<?php wp_list_categories('show_count=1&title_li=<div id="before_title"><h1>' . __('Categories','artsavius') .'</h1></div>&hierarchical=true'); ?>
		
		<?php wp_list_bookmarks('title_before=<div id="before_title"><h1>&title_after=</h1></div>&class=widget_links'); ?>
		<li class="widget widget_stags_cloud">
		<div id="before_title"><h1><?php _e('Tags','artsavius'); ?></h1></div>
		<div class="st-tag-cloud">
		<?php wp_tag_cloud(); ?>
		</div>
		</li>

<?php endif; ?></ul>