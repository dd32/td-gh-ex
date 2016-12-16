<?php
/**
 * Template for displaying search forms in Bassist
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'bassist' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'bassist' ).' &hellip;'; ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'bassist' ); ?>" />
	</label>
	<button type="submit" class="search-submit"><i class="fa fa-search" aria-hidden="true"></i><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'bassist' ); ?></span></button>
</form>
