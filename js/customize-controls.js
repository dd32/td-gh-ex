( function( api ) {

	// Extends our custom "advance-business" section.
	api.sectionConstructor['advance-business'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );