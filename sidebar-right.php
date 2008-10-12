				<div id="rightCol" class="grid_3 omega">
					<?php	/* Widgetized sidebar */
							if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-right') ) : 
						?>
					<div class="menu opacity">
						<h3><span class="unibullet">&raquo;</span> links</h3>
						<ul class="">
							<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
						</ul>
					</div>
					<?php endif; ?>
				</div><!-- /#rightCol -->

