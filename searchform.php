<?php
/**
 * The template for displaying the search form
 *
 * @package ariel
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="form-control" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="toggle"><i class="fa fa-search"></i></button>
</form>