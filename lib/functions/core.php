<?php
/** Function for setting the content width of a theme. */
function chiplife_set_content_width( $width = '' ) {
	global $content_width;
	$content_width = absint( $width );
}

/** Function for getting the theme's content width. */
function chiplife_get_content_width() {
	global $content_width;
	return $content_width;
}

/** Function for getting the theme's data */
function chiplife_theme_data() {
	global $chiplife;
	
	/** If the parent theme data isn't set, let grab it. */
	if ( empty( $chiplife->theme_data ) ) {
		
		$chiplife_theme_data = array();
		$theme_data = wp_get_theme( 'chip-life' );
		$chiplife_theme_data['Name'] = $theme_data->get( 'Name' );
		$chiplife_theme_data['ThemeURI'] = $theme_data->get( 'ThemeURI' );
		$chiplife_theme_data['AuthorURI'] = $theme_data->get( 'AuthorURI' );
		$chiplife_theme_data['Description'] = $theme_data->get( 'Description' );
		
		$chiplife->theme_data = $chiplife_theme_data;
	
	}

	/** Return the parent theme data. */
	return $chiplife->theme_data;
}
?>