<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div><label for="s" class="widgettitle"><?php _e( 'Search', 'cherish' ); ?> </label>
        <br/><input type="text" value="" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'cherish' ); ?>" />
    </div>
</form>