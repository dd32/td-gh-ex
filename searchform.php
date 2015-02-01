<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>/" role="search">
	<label>
		<span class='screen-reader-text'><?php _e( 'Search', 'aaron' ); ?></span>
		<input type="text" name="s" placeholder="<?php _e( 'Search...', 'aaron' ); ?>" />
	</label> 
	<input type="submit" name="submit" value="<?php _e( 'Search', 'aaron' ); ?>" class="search-submit" />
</form>
