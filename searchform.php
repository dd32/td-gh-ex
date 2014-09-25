<?php
/**
 * The template for displaying search forms in Electa
 *
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'electa' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'electa' ); ?>" />
	</label>
	<input type="submit" class="search-submit pc-bg" value="<?php echo esc_attr_x( '&nbsp;', 'submit button', 'electa' ); ?>" />
</form>