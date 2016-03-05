<?php
/**
 * The template for displaying search forms in Webulous
 *
 * @package Webulous
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'greenr' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'greenr' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
		<button class="fa fa-search btn-search"></button>
	</label>
</form>
