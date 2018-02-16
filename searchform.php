<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <label for="s" class="assistive-text screen-reader-text"><?php _e( 'Search', 'atlast-business' ); ?></label>
    <div class="input-group">
        <input type="text" class="form-input field" name="s" placeholder="<?php echo esc_attr( 'Search', 'atlast-business' ); ?>">
        <input class="btn btn-primary input-group-btn" type="submit" name="submit" id="searchsubmit" value="Search">
    </div>
</form>