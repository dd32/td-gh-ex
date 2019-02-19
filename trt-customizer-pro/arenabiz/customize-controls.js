( function( api ) {

	// Extends our custom "arenabiz" section.
	api.sectionConstructor['arenabiz'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
