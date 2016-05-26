/**
 * Conica Customizer Custom Functionality
 *
 */
( function( $ ) {
    
    $( window ).load( function() {
        
        //Show / Hide Color selector for slider setting
        var conica_slider_select_value = $( '#customize-control-conica-slider-type select' ).val();
        conica_customizer_slider_check( conica_slider_select_value );
        
        $( '#customize-control-conica-slider-type select' ).on( 'change', function() {
            var conica_select_value = $( this ).val();
            conica_customizer_slider_check( slider_select_value );
        } );
        
        function conica_customizer_slider_check( conica_select_value ) {
            if ( conica_select_value == 'conica-slider-default' ) {
                $( '#accordion-section-conica-slider-section #customize-control-conica-meta-slider-shortcode' ).hide();
                $( '#accordion-section-conica-slider-section #customize-control-conica-slider-cats' ).show();
            } else if ( conica_select_value == 'conica-meta-slider' ) {
                $( '#accordion-section-conica-slider-section #customize-control-conica-slider-cats' ).hide();
                $( '#accordion-section-conica-slider-section #customize-control-conica-meta-slider-shortcode' ).show();
            } else {
                $( '#accordion-section-conica-slider-section #customize-control-conica-slider-cats' ).hide();
                $( '#accordion-section-conica-slider-section #customize-control-conica-meta-slider-shortcode' ).hide();
            }
        }
        
    } );
    
} )( jQuery );