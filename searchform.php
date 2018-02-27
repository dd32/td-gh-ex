<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-wrap">
    	<label class="screen-reader-text" for="s"><?php echo esc_attr( 'Search for:', 'appsetter' ); ?></label>
        <input type="search" placeholder="<?php echo esc_attr( 'Search', 'appsetter' ); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
        <input type="submit" class="search-submit" value="Search" />
    </div>
</form>