<?php if (is_single()) : ?>

				<div class="navigation grid_8">
					<span class="previous"><?php previous_post_link('&laquo; %link') ?></span>
					<span class="next"><?php next_post_link('%link &raquo;') ?></span>
				</div>
				<div class="clear">&nbsp;</div>

<?php else : ?>

				<div class="navigation grid_8">
					<div class="previous"><?php next_posts_link('&laquo; Previous Entries') ?></div>
					<div class="next"><?php previous_posts_link('Next Entries &raquo;') ?></div>
				</div>
				<div class="clear">&nbsp;</div>

<?php endif; ?>