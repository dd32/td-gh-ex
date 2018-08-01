( function( $, api ) {

    api.sectionConstructor['getting_started'] = api.Section.extend( {
        attachEvents: function () {},
        isContextuallyActive: function () {
            return true;
        }
    } );
} )( jQuery, wp.customize );


