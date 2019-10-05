( function ( $ ) {
    "use strict";

    /**
    * Loading bar
    */
    $( window ).on( 'load', function() {
        $( '#loading' ).fadeOut( 'slow' );
    } );

    $( '#menu-menu>li' ).on( 'keyup keydown', function( e ) {
        var keyCode = e.keyCode || e.which;
          if (keyCode == 9) {
            $( this ).toggleClass( 'is-focused' );
          }
    } );

    /**
    * Sticky Header
    */
    $( window ).on( 'load resize', function() {
        var header              = $( '.fixed-header' );
        var header_container    = $( '.header-container' );
        if( $( header )[0] ) {
            var header_height   = header[0].getBoundingClientRect().height;
            var header_c_height = header_container[0].getBoundingClientRect().height;
            var sticky          = 'sticky-header';
            var topbar          = $( '.top-bar' );
            var topbar_height   = topbar.height();
            var adjust_height   = $( '.fixed-spacing' );

            var logo_container  = $( '.logo-container' );
            var lc_height       = logo_container.height();

            var adminbar_height = 0;
            var fixed_boxed     = '';

            if( $( document ).find( '#wpadminbar' ) ) {
                adminbar_height = $( '#wpadminbar' ).height();
            }

            if ( $( 'body' ).hasClass( 'box-layout' ) ) {
                fixed_boxed = 'fixed-boxed';
            }

            if ( !$( '.top-bar' ).is( ':visible' ) && !$( document ).find( logo_container ) ) {
                header.addClass( sticky + ' ' + fixed_boxed );
                adjust_height.css( 'margin-bottom', header_height );
            }

            if ( $(window).width() < 768 ) {
                logo_container.removeClass( sticky + ' ' + fixed_boxed ).css( 'top', 'unset' );
            }

            $( window ).scroll( function() {
                // If centerd header
                if( $( logo_container )[0] ) {

                    if( $( this ).scrollTop() > ( topbar_height + lc_height ) ) {
                        header.addClass( sticky + ' ' + fixed_boxed ).css( 'top', adminbar_height );
                        //alert( header_height );
                        adjust_height.css( 'margin-bottom', header_height );
                    } else {
                        header.removeClass( sticky + ' ' + fixed_boxed ).css( 'top', 0 );
                        adjust_height.css( 'margin-bottom', 0 );
                    }

                    if ( $( window ).width() < 768 ) {
                        if ( $( '.menu-container' ).hasClass( 'fixed-header' ) ) {
                            logo_container.addClass( sticky + ' ' + fixed_boxed ).css( 'top', adminbar_height );
                            adjust_height.css( 'margin-bottom', header_c_height-1 );
                        } else {
                            logo_container.removeClass( sticky + ' ' + fixed_boxed ).css( 'top', 'unset' );
                            adjust_height.css( 'margin-bottom', 0 );
                        }
                    }
                } else {

                    if ( $( this ).scrollTop() > topbar_height ) {
                        header.addClass( sticky + ' ' + fixed_boxed ).css( 'top', adminbar_height );
                        adjust_height.css( 'margin-bottom', header_height );
                    } else {
                        header.removeClass( sticky + ' ' + fixed_boxed ).css( 'top', 'unset' );
                        adjust_height.css( 'margin-bottom', 0 );
                    }
                }
            } );
        }
    } );

    /**
     * Back to Top
     */

     $( '#back-to-top' ).on( 'click', function( e ){
        e.preventDefault();
        $( "html, body" ).animate( {scrollTop: 0}, 300 );
     } );

     $( window ).scroll( function() {
        if ( $( this ).scrollTop() > 800 ) {
            $( '#back-to-top' ).fadeIn();
        } else {
            $( '#back-to-top' ).fadeOut();
        }
    } );

    /**
     * Search Icon Switch
     */
    var $search_icon        =   $( '.search-icon' );
    var $search_dropdown    =   $( '.search-dropdown' );

    $search_icon.on( 'click', function( e ) {

        if ( $search_dropdown.hasClass( 'search-hidden' ) || $search_dropdown.hasClass( 'search-default' ) ) {

            $search_dropdown.attr( 'class', 'search-dropdown search-shown' );

        } else if( $search_dropdown.hasClass( 'search-shown' ) ) {

            $search_dropdown.attr( 'class', 'search-dropdown search-hidden' );

        }
    } );


    $('.share-icons a').on('click', function(e){
        e.preventDefault();
        window.open(this.href,'targetWindow','scrollbars=yes,resizable=yes,width=700,height=500')
    });

    /**
     * 3.0 - Masonry Layout
    */

    if ( jQuery().masonry ) {
        var $grid = $( '.grid' ).masonry( {
            // options
            itemSelector: '.grid-item'
        } );

        // layout Masonry after each image loads
        $grid.imagesLoaded().progress( function() {
            $grid.masonry( 'layout' );
        });
    }

    jQuery( document ).ready( function( $ ) {

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
    } );

    /**
    * Initiate Offscreen Plugin
    */

    $( '.menu-item-has-children' ).on( 'mouseover', function(){
        var dropdown = $( this ),
            menu = dropdown.find( 'ul' );

        // Adjust if it's off the screen
        if( menu.is( ':off-right' ) ) {
            menu.addClass( 'to-left' );
        }
    } );

} )( jQuery );
