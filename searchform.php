<?php
/**
 * Template for displaying search form
 *
 * @package arena
 */

?>

<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'arena' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'arena' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit btn search-btn"><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'arena' ); ?></span><i class="fa fa-search"></i></button>
</form>
