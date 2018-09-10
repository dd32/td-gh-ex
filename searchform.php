<?php
/**
 * Anorya Search Form
 */
?>


<form  method="get" autocomplete="off" action="<?php  echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" name="s" class="search-form-input" value=""  placeholder="<?php esc_attr_e('Search and hit enter...','anorya'); ?>"/>
	<button class="search-form-submit btn-primary" name="submit"  type="submit"></button>
</form>