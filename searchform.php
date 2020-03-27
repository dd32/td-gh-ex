<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<label class="screen-reader-text" for="s"></label>
	<input type="text" value="<?php echo esc_attr( get_search_query() );?>" placeholder="Test, WordPress, ..." name="s" id="s" />
	<button type="submit" id="searchsubmit">
		<?php _e("Search", "baena"); ?>
	</button>
</form>