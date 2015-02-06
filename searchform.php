<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>/" role="search">
	<label>
		<span class='screen-reader-text'><?php _e( 'Search', 'star' ); ?></span>
		<input type="text" name="s" placeholder="<?php _e( 'Search...', 'star' ); ?>" />
	</label> 
	<input type="submit" name="submit" value="<?php _e( 'Search', 'star' ); ?>" class="search-submit" />
</form>
