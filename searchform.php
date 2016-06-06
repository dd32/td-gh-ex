<form role="search" method="get" class="search-form" action="<?php echo home_url(); ?>">
	<label>
		<span class="screen-reader-text">Search for:</span>
		<input type="search" class="search-text" placeholder="<?php esc_attr_e( 'Search', 'ace' ); ?>" value="" name="s" />
	</label>
  <button type="submit" class="search-button input-button ease-in-out"><i class="fa fa-search sideform-button"></i></button>
</form>