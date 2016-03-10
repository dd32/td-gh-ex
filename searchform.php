<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="search_widget_input"  name="s" id="s" placeholder="<?php esc_attr_e( "Search Here", 'corpbiz' ); ?>" />
	<input type="submit" class="search_btn" name="submit" value="<?php esc_attr_e( "Search", 'corpbiz' ); ?>" />
</form>