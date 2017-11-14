<?php
/**
 * Anorya Search Form
 */
?>


<form  method="get" autocomplete="off" action="<?php  echo esc_url_raw( home_url( '/' ) ); ?>">
	<input type="text" name="s" class="search-form-input" value=""  placeholder="<?php print __('Search and hit enter...','anorya'); ?>"/>
	<button class="search-form-submit btn-primary" name="submit" id="searchsubmit" type="submit"></button>
</form>