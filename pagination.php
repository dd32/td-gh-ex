<!-- pagination -->
		<?php
			if(function_exists('wp_pagenavi')) :
				
			else :
		?>
			<div class="wp-pagenavi">
				<div class="alignleft"><?php next_posts_link('&laquo; '.__('Older posts','safreen')) ?></div> 
				<div class="alignright"><?php previous_posts_link(__('Newer posts','safreen').' &raquo;') ?></div>
			</div>
		<?php endif; ?>      
<!-- /pagination -->

