// scroll to top button
jQuery( document ).ready( function ( $ ) {
    // Menu fixes
    $( function () {
        if ( $( window ).width() > 767 ) {
            $( ".dropdown" ).hover(
                function () {
                    $( this ).addClass( 'open' )
                },
                function () {
                    $( this ).removeClass( 'open' )
                }
            );
        }
    } );
    $( '.navbar .dropdown-toggle' ).hover( function () {
        $( this ).addClass( 'disabled' );
    } );
    
    $('.open-panel').each(function(){
        var menu = $( this ).data( 'panel' );
        $( "#" +menu ).click( function () {
            $( "#blog" ).toggleClass( "openNav" );
            $( "#" +menu+ ".open-panel" ).toggleClass( "open" );
        } );
    });

} );
