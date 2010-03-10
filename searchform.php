<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
	<div id="search-form-wrap" class="livesearch">
		<label for="s" id="search-label">Type for search</label>
		<input type="text" id="s" name="s" value="<?php the_search_query(); ?>" accesskey="4" />
	</div>
</form>
