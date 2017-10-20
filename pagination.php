<!-- pagination -->
		<?php
			if(function_exists('bestblog_post_navi')) :
				 bestblog_post_navi();
			else :
		?>
			<div class="bestblog_nav">
			<?php	// Previous/next page navigation.
			the_posts_pagination(  array('prev_text' => '&laquo;', 'next_text' => '&raquo;') );?>

			</div>
		<?php endif; ?>
<!-- /pagination -->
