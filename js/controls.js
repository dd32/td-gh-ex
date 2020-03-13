( function( $, api ) {

	// Taxonomies.
	api.controlConstructor['artblog-dropdown-taxonomies'] = api.Control.extend( {
		ready: function() {
			var control = this;

			$( 'select', control.container ).change(
				function() {
					control.setting.set( $( this ).val() );
				}
			);
		}
	} );


})(jQuery, wp.customize);
