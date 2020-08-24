/**
 * TopShop Theme Custom Functionality
 *
 */
( function( $ ) {
    
    jQuery( document ).ready( function() {
        
        // $('.header-stick').waypoint('sticky', {
        //     offset: 0
        // });
        var sticky = new Waypoint.Sticky({
            element: $( '.header-stick' )[0],
            offset: 0
        });
		
    });
    
} )( jQuery );