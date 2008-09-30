				<div id="doubleCol" class="grid_6 alpha omega opacity">
					<?php	/* Widgetized sidebar */
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-double') ) : 
					?>
					<h3><span class="unibullet">&raquo;</span> tags</h3>
					<div id="doubleColInset">
						<?php if ( function_exists('wp_tag_cloud') ) 
							{ 
								wp_tag_cloud('smallest=8&largest=22'); 
							}
						?>
					</div>
					<?php endif; ?>
				</div><!-- /#doubleCol -->
