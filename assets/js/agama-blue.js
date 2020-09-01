(function($){

    $( document ).ready(function() {
        
        if ( $('body').hasClass( 'blog', 'home' ) ) {
            if ( $('#primary').hasClass( 'tv-order-1' ) ) {
                $('#primary').removeClass( 'tv-col-md-9 tv-order-1').addClass( 'tv-col-md-12' );
            } else if ( $('#primary').hasClass( 'tv-order-2' ) ) {
                $('#primary').removeClass( 'tv-col-md-9 tv-order-2').addClass( 'tv-col-md-12' );
            }
        }
        
    } );
    
})(jQuery);
