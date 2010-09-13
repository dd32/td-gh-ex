<!--create the searchfield-->
<h2>Search</h2>


<?php
/**
 * The template for displaying the search form.
 *
  */
?>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
	<div id="search-form-wrap">
		<label for="s" id="search-label"><?php _e('Search for:', 'anIMass'); ?></label>
		<input type="text" id="s" name="s" value="<?php the_search_query(); ?>" accesskey="4" />
		<input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search &raquo;', 'anIMass'); ?>" />
	</div>
</form>

