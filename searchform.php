<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div><label class="screen-reader-text" for="s"></label>
        <input type="text" value="" name="s" id="s"  onFocus="this.value=''" />
			<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'redesign' ); ?>"/>
    </div>
</form>