(function( $, customize ) {
	customize.bind( 'ready', function () {

		customize.control( 'blogdescription' ).priority( 20 );		
		disableInput = function( setting, controlField ) {
			customize( setting, function( value ) {
				var input = customize.control( controlField ).container.find( 'input' );
				input.prop( 'disabled', !value.get() );
				value.bind( function( to ) {
					input.prop( 'disabled', !to );
				} );
			} );
		};
		disableInput( 'aamla_display_site_title', 'blogname' );
		disableInput( 'aamla_display_site_desc', 'blogdescription' );
	} );
}( jQuery, wp.customize ));
