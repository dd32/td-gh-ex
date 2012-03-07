<div id="right-column"> <!-- begin right-column -->
	<ul class="sidebar">
		<?php
		/* Widgetized sidebar */
		if ( !dynamic_sidebar('sidebar') ) : ?>
		<?php
			
			$args = array(
    			'type'            => 'postbypost',
    			'limit'           => 10,
    			'format'          => 'html', 
    			'show_post_count' => false,
    			'echo'            => 1 
    			); 
    			
    		?>
    		<li class="widget-container">
    			<h3 class="widget-title">Last Posts</h3>
				<ul>
			 		<?php wp_get_archives($args); ?>
				</ul>
			</li>
						
			<li class="widget-container">
				<h3 class="widget-title">Categories</h3>
				<ul>
					<?php $args = array(
				   	'orderby'            => 'name',
				   	'order'              => 'ASC',
				   	'show_last_update'   => 0,
				   	'style'              => 'list',
				   	'show_count'         => 0,
				   	'hide_empty'         => 1,
				   	'use_desc_for_title' => 1,
				   	'child_of'           => 0,
				   	'title_li'					 => '',
				   	'hierarchical'       => true,
				   	'number'             => NULL,
				   	'taxonomy'           => 'category',
				   	'walker'             => 'Walker_Category' 
				   	);
				   
					wp_list_categories($args); ?>
				</ul>
			</li>
			<li class="widget-container">	
				<h3 class="widget-title"><?php echo 'Search by Tags!', 'zbench'; ?></h3>
					<?php wp_tag_cloud('smallest=9&largest=18'); ?>
			</li>
		<?php endif; ?>
	</ul>
</div> <!-- end right-column -->