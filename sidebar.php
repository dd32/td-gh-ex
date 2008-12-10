			<div id="sidebar-content">
				<div id="left-column" class="column">
			    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
					<div>
						<h2>Categories</h2>
						<ul>
						  <?php wp_list_cats('sort_column=name'); ?>
						</ul>
					</div>
					<div>
					  <?php wp_list_bookmarks(array('title_before' => '<h2>', 'title_after' => '</h2>',	'category_before' => '', 'category_after' => '')); ?>
					</div>
					<div>
						<h2>Tag Cloud</h2>
            <?php if (function_exists('wp_tag_cloud')) { ?>

            <?php wp_tag_cloud(); ?>
            
            <?php } ?>
					</div>
          <?php endif; ?>
				</div>
			</div>