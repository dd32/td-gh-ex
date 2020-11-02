( function( api ) {

	// Extends our custom "avid-magazine" section.
	api.sectionConstructor['avid-magazine'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
