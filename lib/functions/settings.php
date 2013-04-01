<?php
/** Loads the Chiplife theme setting. */
function chiplife_get_settings() {
	global $chiplife;

	/* If the settings array hasn't been set, call get_option() to get an array of theme settings. */
	if ( !isset( $chiplife->settings ) ) {
		$chiplife->settings = get_option( 'chiplife_options' );
	}
	
	/** return settings. */
	return $chiplife->settings;
}
?>