<div id="sidebar">

	<ul id="widgets">

		<li class="widget recent">
			<ul class="tabs">
				<li><a class="active" href="#tab-comments">Comments</a></li>
				<li><a href="#tab-categories">Categories</a></li>
				<li><a href="#tab-tags">Tags</a></li>
			</ul>
			<ul id="tab-comments">
				<?php dp_recent_comments(); ?>
			</ul>
			<ul id="tab-categories">
				<?php wp_list_categories('sort_column=name&title_li=&show_count=1&hierarchical=0'); ?>
			</ul>
			<ul id="tab-tags">
				<li><?php wp_tag_cloud(''); ?></li>
			</ul>
		</li>

<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar('sidebar') ) : ?>
<?php endif; ?>

	</ul>
			
</div>