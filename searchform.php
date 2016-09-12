<?php // Display the custom search form ?>

<form role="search" method="get" id="searchform" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <div class="search-form-wrap">
		<input type="text" value="" name="s" id="s" class="search-form-input" placeholder="<?php _e( 'Search', 'bento' ); ?>.." />
        <input type="submit" id="searchsubmit" class="button submit-button" value="&#xf179" />
    </div>
</form>