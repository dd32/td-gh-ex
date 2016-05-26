/**
 * Conica Theme Custom Functionality
 *
 */
( function( $ ) {
    
    jQuery( document ).ready( function() {
        
        // Insert up arrow for navigation
        $( '.navigation-main ul > li a' ).wrapInner( '<span class="nav-span"></span>' );
        $( '.navigation-main ul ul' ).prepend( '<span class="nav-arrow"></span>' );
        
        $( '.stick-header' ).waypoint( 'sticky', {
            handler: function(direction) {
                if ( direction=='down' ) {
                    $( '.sticky-wrapper' ).css( 'height', '75px' );
                } else {
                    $( '.sticky-wrapper' ).css( 'height', 'auto' );
                }
            },
            offset: 0
        });
        
		// Adding padding to the footer widgets
		$( '.footer-widgets .widget').wrapInner( '<div class="footer-widgets-pad" />' );
		// Add class to last footer widget
		$( '.footer-widgets .widget:last').addClass( 'footer-widget-last' );
		
        // Search Show / Hide
        $( '.search-button' ).toggle( function(){
            $( '.search-block' ).animate( { bottom: '-=55' }, 120 );
            $( '.search-block .search-field' ).focus();
        },function(){
            $( '.search-block' ).animate( { bottom: '+=55' }, 120 );
        });
        
        // Scroll To Top Button Functionality
        $( '.scroll-to-top' ).bind( 'click', function() {
            $( 'html, body' ).animate( { scrollTop: 0 }, 800 );
        });
        $( window ).scroll( function(){
            if ( $( this ).scrollTop() > 400 ) {
                $( '.scroll-to-top' ).fadeIn();
            } else {
                $( '.scroll-to-top' ).fadeOut();
            }
        });
		
    });
    
    $(window).resize(function () {
        
        
        
    }).resize();
    
    $(window).load(function() {
        
        conica_home_slider();
        
    });
    
    function conica_home_slider() {
        $( '.home-slider' ).carouFredSel({
            responsive: true,
            circular: true,
            infinite: false,
            width: 1200,
            height: 'variable',
            items: {
                visible: 1,
                width: 1200,
                height: 'variable'
            },
            onCreate: function(items) {
                $( '.home-slider-wrap' ).removeClass( 'home-slider-remove' );
            },
            scroll: {
                fx: 'uncover-fade',
                duration: 450
            },
            auto: 6500,
            pagination: '.home-slider-pager',
            prev: '.home-slider-prev',
            next: '.home-slider-next'
        });
    }
} )( jQuery );