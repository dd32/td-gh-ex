( function( $, api ) {

    api.sectionConstructor['changelog'] = api.Section.extend( {
        attachEvents: function () {},
        isContextuallyActive: function () {
            return true;
        }
    } );
} )( jQuery, wp.customize );


