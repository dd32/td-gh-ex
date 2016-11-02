/**
 * Custom Functionality
 */
( function( $ ) {
    
    jQuery( document ).ready( function() {
        
        // Sticky Header
        var sticky_header_offset = -38;
        if ( $( 'body' ).hasClass( 'admin-bar' ) ) {
            sticky_header_offset = -10;
        }
        $( '.stick-header' ).waypoint( 'sticky', {
            handler: function(direction) {
                if ( direction == 'down' ) {
                    $( '.site-header' ).addClass( 'site-sticky-header' );
                } else {
                    $( '.site-header' ).removeClass( 'site-sticky-header' );
                }
            },
            offset: sticky_header_offset
        });
        
    });
    
} )( jQuery );