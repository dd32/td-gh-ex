/**
 * Customizer Custom Functionality
 *
 */
( function( $ ) {
    
    $( window ).load( function() {
        
        // Show / Hide Center Navigation
        var conica_center_nav_value = $( '#customize-control-conica-set-header-layout select' ).val();
        conica_center_nav_check( conica_center_nav_value );
        
        $( '#customize-control-conica-set-header-layout select' ).on( 'change', function() {
            var conica_center_nav_select_value = $( this ).val();
            conica_center_nav_check( conica_center_nav_select_value );
        });
        
        function conica_center_nav_check( conica_center_nav_select_value ) {
            if ( conica_center_nav_select_value == 'conica-header-layout-three' ) {
                $( '#sub-accordion-section-conica-panel-website-section-header #customize-control-conica-set-header-nav-center-align' ).show();
            } else {
                $( '#sub-accordion-section-conica-panel-website-section-header #customize-control-conica-set-header-nav-center-align' ).hide();
            }
        }
        
        // Show / Hide Slider Settings
        var conica_slider_select_value = $( '#customize-control-conica-slider-type select' ).val();
        conica_customizer_slider_check( conica_slider_select_value );
        
        $( '#customize-control-conica-slider-type select' ).on( 'change', function() {
            var slider_select_value = $( this ).val();
            conica_customizer_slider_check( slider_select_value );
        } );
        
        function conica_customizer_slider_check( slider_select_value ) {
            if ( slider_select_value == 'conica-slider-default' ) {
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-shortcode' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-cats' ).show();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-size' ).show();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-style' ).show();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-scroll-effect' ).show();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-linkto-post' ).show();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-direction' ).show();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-remove-title' ).show();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-auto-scroll' ).show();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-duration' ).show();
            } else if ( slider_select_value == 'conica-shortcode-slider' ) {
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-cats' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-size' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-style' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-scroll-effect' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-linkto-post' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-direction' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-remove-title' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-auto-scroll' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-duration' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-shortcode' ).show();
            } else {
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-cats' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-size' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-style' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-scroll-effect' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-linkto-post' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-direction' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-remove-title' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-auto-scroll' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-shortcode' ).hide();
                $( '#sub-accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-duration' ).hide();
            }
        }
        
        // Show / Hide footer layout settings
        var conica_foot_select_value = $( '#customize-control-conica-footer-layout select' ).val();
        conica_foot_value_check( conica_foot_select_value );
        
        $( '#customize-control-conica-footer-layout select' ).on( 'change', function() {
            var foot_select_value = $( this ).val();
            conica_foot_value_check( foot_select_value );
        } );
        
        function conica_foot_value_check( foot_select_value ) {
            if ( foot_select_value == 'conica-footer-layout-social' ) {
                $( '#accordion-section-conica-panel-text-section-footer' ).removeClass( 'conica-remove-section' );
            } else {
                $( '#accordion-section-conica-panel-text-section-footer' ).addClass( 'conica-remove-section' );
            }
        }
        
    } );
    
} )( jQuery );