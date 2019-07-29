( function($) {

    /**
     * Slick Slider
     */
    $( '.ct-testimonials-apex' ).slick();

    /**
     * Transparent Menu
     */

    if ( $( 'div.ct-featured-transparent' ).length || $( 'body.home' ).length ) {
        $ct_height  =   $( '.ct-transparent-header' ).height();
        $( '.ct-content' ).css( 'margin-top', -$ct_height-1 );
    } else {
        $( '.ct-static-blog-bg' ).removeClass( 'ct-static-width-blog' );
        $( '.ct-header' ).addClass( 'ct-dark-menu' );
    }

    /**
     * Mobile menu
     */

    $( '.dropdown-toggle' ).on( 'click', function(){
        $( this ).toggleClass( 'toggled' );
        $( this ).next().slideToggle();
    } );

    // Function to show the menu
    function show_menu() {
        $( '.nav-parent' ).addClass( 'mobile-menu-open' );
        $( '.mobile-menu-overlay' ).addClass( 'mobile-menu-active' );
    }

    // Function to hide the menu
    function hide_menu(){
        $( '.nav-parent' ).removeClass( 'mobile-menu-open' );
        $( '.mobile-menu-overlay' ).removeClass( 'mobile-menu-active' );
    }

    $( '.menubar-right' ).on( 'click', show_menu );
    $( '.mobile-menu-overlay' ).on( 'click', hide_menu );
    $( '.menubar-close' ).on( 'click', hide_menu );

} )( jQuery );

(function($) {

  // Open Lightbox
  $( '.open-lightbox' ).on( 'click', function( e ) {
    e.preventDefault();
    var image = $( this ).data( 'href' );
    $( 'html' ).addClass( 'no-scroll' );
    $( 'body' ).append( '<div class="lightbox-opened"><div class="lightbox-show"></div></div>' );

    $( '.lightbox-show' ).html( '<img src="' + image + '">' ).hide().fadeIn('slow');
});

  // Close Lightbox
  $( 'body' ).on( 'click', '.lightbox-opened', function() {
    $( 'html' ).removeClass( 'no-scroll' );
    $( '.lightbox-opened' ).remove();
  });

})(jQuery);
