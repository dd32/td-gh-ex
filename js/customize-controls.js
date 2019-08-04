( function( api ) {

	// Extends our custom "advance-coaching" section.
	api.sectionConstructor['advance-coaching'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );