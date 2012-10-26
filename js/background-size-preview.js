( function( $ ){
    wp.customize( 'backgroundsize_setting', function( value ) {
        value.bind( function( to ) {
            $('#customize-preview > iframe').contents().find('body').css('background-size',to);
        } );
    } );
} )( jQuery );
