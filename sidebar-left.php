				<div id="leftCol" class="grid_3 alpha">
					<?php /* Menu for subpages of current page */
						//if($post->post_parent){ 
						//	$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
						//}else{
							$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0"); //}
						if ($children) { ?>
					<div class="menu opacity">
						<?php if(!$post->post_parent){ ?><h3><span class="unibullet">&raquo;</span> <?php the_title(); ?></h3><?php } ?>
						<ul class="">
							<?php echo $children; ?>
						</ul>
					</div>
						<?php } 
						/* Widgetized sidebar */
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
