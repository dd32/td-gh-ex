<?php
/**
 * Displaying search forms in Academic Education
 * @package Academic Education
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'academic-education' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'academic-education' ); ?>" value="<?php echo esc_attr( get_search_query()) ?>" name="s">
	</label> 
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'academic-education' ); ?>">
</form>