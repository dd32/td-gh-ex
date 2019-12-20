( function ( $ ) {
    "use strict";

    /**
    * Loading bar
    */
    $( window ).on( 'load', function() {
        $( '#loading' ).fadeOut( 'slow' );
    } );

    /**
     * Keyboard Navigation
     */

    $( '.main-nav>.menu-item-has-children, .main-nav>.menu-item-has-children>ul>.menu-item-has-children' ).on( {
        keyup: function( e ) {
            var keyCode = e.keyCode || e.which;
            if (keyCode == 9) {
                $( this ).children( 'ul' ).addClass( 'is-focused' );
            }
        }
    } );

    $( '.main-nav>li:not(.menu-item-has-children), .main-nav>.menu-item-has-children>ul>li:not(.menu-item-has-children)' ).on( {
        keyup: function( e ) {
            $( this ).prev().children( 'ul' ).removeClass( 'is-focused' );
            $( this ).next().children( 'ul' ).removeClass( 'is-focused' );
        }
    } );

    /**
     * Mobile menu
     */

    jQuery( document ).ready( function( $ ) {
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

        $( '.js-ct-menubar-right' ).on( 'keyup keydown', function( e ) {
            var keyCode = e.keyCode || e.which;
            if (keyCode == 32) {
                e.preventDefault();
                show_menu();
            }
        } );

        $( '.js-ct-menubar-close' ).on( 'keyup keydown', function( e ) {
            var keyCode = e.keyCode || e.which;
            if (keyCode == 32) {
                e.preventDefault();
                hide_menu();
            }
        } );

        $( '.js-ct-dropdown-toggle' ).on( 'keydown', function( e ) {
            var keyCode = e.keyCode || e.which;
            if (keyCode == 32) {
                e.preventDefault();
                $( this ).toggleClass( 'toggled' );
                $( this ).next().slideToggle();
            }
        } );

        $( '.menubar-right' ).on( 'click', show_menu );
        $( '.mobile-menu-overlay' ).on( 'click', hide_menu );
        $( '.menubar-close' ).on( 'click', hide_menu );
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
            var no_sticky       = 'no-stick';
            var topbar          = $( '.top-bar' );
            var topbar_height   = topbar.height();
            var adjust_height   = $( '.fixed-spacing' );

            var trans_header    = $( '.ct-transparent-logo>img' );
            var trans_logo      = trans_header.data('transparent-logo');
            var main_logo       = trans_header.data('main-logo');

            var logo_container  = $( '.logo-container' );
            var lc_height       = logo_container.height();

            var adminbar_height = 0;
            var fixed_boxed     = '';

            // If Logged In
            if( $( document ).find( '#wpadminbar' ) ) {
                adminbar_height = $( '#wpadminbar' ).height();
            }

            // If Boxed Layout
            if ( $( 'body' ).hasClass( 'box-layout' ) ) {
                fixed_boxed = 'fixed-boxed';
            }

            // If Topbar Enabled
            if ( !$( '.top-bar' ).is( ':visible' ) && !$( document ).find( logo_container ) ) {
                header.addClass( sticky + ' ' + fixed_boxed );
                adjust_height.css( 'margin-bottom', header_height );
            }

            // If Small device remove sticky and boxed layout
            if ( $(window).width() < 768 ) {
                logo_container.removeClass( sticky + ' ' + fixed_boxed ).css( 'top', 'unset' );
            }

            $( window ).scroll( function() {
                // If centerd header
                if( $( logo_container )[0] ) {

                    if( $( this ).scrollTop() > ( topbar_height + lc_height ) ) {
                        header.addClass( sticky + ' ' + fixed_boxed ).css( 'top', adminbar_height );
                        adjust_height.css( 'margin-bottom', header_height );
                        header.removeClass( no_sticky );

                        // Replace main logo with transparent logo
                        $( trans_header ).attr( 'src', main_logo );
                    } else {
                        header.removeClass( sticky + ' ' + fixed_boxed ).css( 'top', 0 );
                        adjust_height.css( 'margin-bottom', 0 );
                        header.addClass( no_sticky );

                        // Replace transparent logo with main logo
                        $( trans_header ).attr( 'src', trans_logo );
                    }

                    // If small device and in centered header
                    if ( $( window ).width() < 768 ) {
                        if ( $( '.menu-container' ).hasClass( 'fixed-header' ) ) {
                            logo_container.addClass( sticky + ' ' + fixed_boxed ).css( 'top', adminbar_height );
                            adjust_height.css( 'margin-bottom', header_c_height-1 );
                            header.removeClass( no_sticky );

                            // Replace main logo with transparent logo
                            $( trans_header ).attr( 'src', main_logo );
                        } else {
                            logo_container.removeClass( sticky + ' ' + fixed_boxed ).css( 'top', 'unset' );
                            adjust_height.css( 'margin-bottom', 0 );
                            header.addClass( no_sticky );

                            // Replace transparent logo with main logo
                            $( trans_header ).attr( 'src', trans_logo );
                        }
                    }
                } else {
                    // Normal Header not centered
                    if ( $( this ).scrollTop() > topbar_height ) {
                        header.addClass( sticky + ' ' + fixed_boxed ).css( 'top', adminbar_height );
                        adjust_height.css( 'margin-bottom', header_height );
                        header.removeClass( no_sticky );

                        // Replace main logo with transparent logo
                        $( trans_header ).attr( 'src', main_logo );
                    } else {
                        header.removeClass( sticky + ' ' + fixed_boxed ).css( 'top', 'unset' );
                        adjust_height.css( 'margin-bottom', 0 );
                        header.addClass( no_sticky );

                        // Replace transparent logo with main logo
                        $( trans_header ).attr( 'src', trans_logo );
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
