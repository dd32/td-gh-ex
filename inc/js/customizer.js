jQuery(document).ready(function($) {
	
	/* Move widgets to their respective sections */
	wp.customize.section( 'sidebar-widgets-google-map' ).panel( 'bakes_and_cakes_home_page_settings' );
	wp.customize.section( 'sidebar-widgets-google-map' ).priority( '40' );
    
});