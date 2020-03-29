<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s"></label>
	<input type="text" value="<?php echo esc_attr( get_search_query() );?>" placeholder="Baena, WordPress, ..." name="s" id="s" />
	<button type="submit" id="searchsubmit">
		<?php echo esc_html_e( 'Search', 'baena' ); ?>
	</button>
</form>