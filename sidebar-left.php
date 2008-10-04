				<div id="leftCol" class="grid_3 alpha">
					<?php /* Menu for subpages of current page */
						global $notfound;
						if (is_page() and ($notfound != '1')) 
						{
							$current_page = $post->ID;
							while($current_page) 
							{
						    $page_query = $wpdb->get_row("SELECT ID, post_title, post_status, post_parent FROM $wpdb->posts WHERE ID = '$current_page'");
						    $current_page = $page_query->post_parent;
						  }
						  $parent_id = $page_query->ID;
						  $parent_title = $page_query->post_title;
						  
						  if ($wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id' AND post_type != 'attachment'")) 			 
							{
					?>
					<div class="menu opacity">
						<h3><span class="unibullet">&raquo;</span> <?php echo $parent_title; ?></h3>
						<ul class="">
							<?php wp_list_pages('sort_column=menu_order&title_li=&child_of='. $parent_id); ?>
						</ul>
					</div>
					<?php
							} 
						} 
					?>
					<?php	/* Widgetized sidebar */
							if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-left') ) : 
					?>
					<div class="menu opacity">
						<h3><span class="unibullet">&raquo;</span> topics</h3>
						<ul class="">
							<?php wp_list_categories('title_li=&show_count=0&hierarchical=0'); ?>
						</ul>
					</div>
					<div class="menu opacity">
						<?php wp_widget_calendar(); ?>
					</div
					<?php endif; ?>
				</div><!-- /#leftCol -->
