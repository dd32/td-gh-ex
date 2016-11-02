/**
 * Customizer Custom Functionality
 *
 */
( function( $ ) {
    
    $( window ).load( function() {
        
        // Show / Hide Color selector for slider setting
        var conica_slider_select_value = $( '#customize-control-conica-slider-type select' ).val();
        conica_customizer_slider_check( conica_slider_select_value );
        
        $( '#customize-control-conica-slider-type select' ).on( 'change', function() {
            var slider_select_value = $( this ).val();
            conica_customizer_slider_check( slider_select_value );
        } );
        
        function conica_customizer_slider_check( slider_select_value ) {
            if ( slider_select_value == 'conica-slider-default' ) {
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-shortcode' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-cats' ).show();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-size' ).show();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-style' ).show();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-scroll-effect' ).show();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-linkto-post' ).show();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-direction' ).show();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-remove-title' ).show();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-auto-scroll' ).show();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-duration' ).show();
            } else if ( slider_select_value == 'conica-shortcode-slider' ) {
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-cats' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-size' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-style' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-scroll-effect' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-linkto-post' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-direction' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-remove-title' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-auto-scroll' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-duration' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-shortcode' ).show();
            } else {
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-cats' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-size' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-style' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-scroll-effect' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-linkto-post' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-direction' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-remove-title' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-auto-scroll' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-shortcode' ).hide();
                $( '#accordion-section-conica-panel-website-section-slider #customize-control-conica-slider-duration' ).hide();
            }
        }
        
    } );
    
} )( jQuery );