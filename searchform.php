<?php
/**
 * The template for displaying search forms
 *
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" autocomplete='off'>
	<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'undedicated' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'undedicated' ); ?>" />
</form>
<div class="clear"></div>