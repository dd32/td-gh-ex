( function( api ) {

	// Extends our custom "aagaz-startup" section.
	api.sectionConstructor['aagaz-startup'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );