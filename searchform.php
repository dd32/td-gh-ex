<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>/" role="search">
	<label>
		<span class='screen-reader-text'><?php _e( 'Search', 'star' ); ?></span>
		<input type="search" name="s" />
	</label> 
	<input type="submit" name="submit" value="<?php esc_attr_e( 'Search', 'star' ); ?>" class="search-submit" />
</form>
