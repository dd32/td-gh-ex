/**
 * Custom Functionality
 */
( function( $ ) {
    
    jQuery( document ).ready( function() {
        
        // Add button to sub-menu item to show nested pages / Only used on mobile
        $( '.main-navigation li.page_item_has_children > a, .main-navigation li.menu-item-has-children > a' ).after( '<button class="menu-dropdown-btn"><i class="fa fa-angle-down"></i></button>' );
        // Insert up arrow for navigation
        $( '.main-navigation ul li a' ).wrapInner( '<span class="nav-span"></span>' );
        $( '.main-navigation ul ul' ).prepend( '<span class="nav-arrow"></span>' );

        $( '.main-navigation' ).find( 'a' ).on( 'focus blur', function() {
            $( this ).parents( 'li' ).toggleClass( 'focus' );
        } );
        
        // Mobile nav button functionality
        $( '.menu-dropdown-btn' ).bind( 'click', function() {
            $(this).parent().toggleClass( 'open-page-item' );
        });
        // The menu button
        $( '.header-menu-button' ).click( function(e) {
            $( 'body' ).toggleClass( 'show-main-menu' );
            var element = $( '#main-menu' );
            trapFocus( element );
        });
        $( '.main-menu-close' ).click( function(e){
            $( '.header-menu-button' ).click();
            $( '.header-menu-button' ).focus();
        });
        $( document ).on( 'keyup',function(evt) {
            if ( $( 'body' ).hasClass( 'show-main-menu' ) && evt.keyCode == 27 ) {
                $( '.header-menu-button' ).click();
                $( '.header-menu-button' ).focus();
            }
        });
        
        // Search Show / Hide
        $( '.search-button' ).click( function(e) {
            $( 'body' ).toggleClass( 'show-site-search' );
            $( '.search-block .search-field' ).focus();
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
        
        $( '.home-slider-block-inner').height( $( '.home-slider-block-bg' ).outerHeight() );
        
    }).resize();
    
    $(window).load(function() {
        
        $( '.side-aligned-social' ).removeClass( 'hide-side-social' );
        
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
                $( '.home-slider-block-inner').height( $( '.home-slider-block-bg' ).outerHeight() );
            },
            scroll: {
                fx: 'uncover-fade',
                duration: 450
            },
            auto: 5000,
            pagination: '.home-slider-pager',
            prev: '.home-slider-prev',
            next: '.home-slider-next'
        });
    }
    
} )( jQuery );

function trapFocus( element, namespace ) {
    var focusableEls = element.find( 'a, button' );
    var firstFocusableEl = focusableEls[0];
    var lastFocusableEl = focusableEls[focusableEls.length - 1];
    var KEYCODE_TAB = 9;

    firstFocusableEl.focus();

    element.keydown( function(e) {
        var isTabPressed = ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB );

        if ( !isTabPressed ) { 
            return;
        }

        if ( e.shiftKey ) /* shift + tab */ {
            if ( document.activeElement === firstFocusableEl ) {
                lastFocusableEl.focus();
                e.preventDefault();
            }
        } else /* tab */ {
            if ( document.activeElement === lastFocusableEl ) {
                firstFocusableEl.focus();
                e.preventDefault();
            }
        }

    });
}
