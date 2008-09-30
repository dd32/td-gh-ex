			<form action="<?php bloginfo('url'); ?>/" id="searchform" method="get">
			<label for="s" class="hidden"><?php _e('Search for:'); ?></label>
			<input class="grid_6 alpha push_gutter" type="text" id="s" name="s" value="<?php the_search_query(); ?>"/>
			<input class="pull_gutter omega" type="submit" value="Search" id="searchsubmit" />
			</form>
