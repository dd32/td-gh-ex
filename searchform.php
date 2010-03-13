<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
	<div id="search-form-wrap">
		<label for="s" id="search-label"><?php _e('Search for:'); ?></label>
		<input type="text" id="s" name="s" value="<?php the_search_query(); ?>" accesskey="4" />
			<span id="searchreset" title="<?php esc_attr_e('Reset Search'); ?>"></span>
			<span id="searchload"></span>
	</div>
</form>
