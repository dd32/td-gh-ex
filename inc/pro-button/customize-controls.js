( function( api ) {
	api.sectionConstructor['attesaProVersion'] = api.Section.extend( {
		attachEvents: function () {},
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
