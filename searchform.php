<?php
/**
 * The template for displaying search forms in advance-fitness-gym
 *
 * @package advance-fitness-gym
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'advance-fitness-gym' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder','advance-fitness-gym' ); ?>" value="<?php echo get_search_query() ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_html_x( 'Search', 'submit button','advance-fitness-gym' ); ?>">
</form>