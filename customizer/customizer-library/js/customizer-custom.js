/**
 * TopShop Customizer Custom Functionality
 *
 */
( function( $ ) {
    
    $( window ).load( function() {
        
        var topshop_upgrade_button = '<a href="' + upgrade_button.link + '" class="topshop-upgrade-btn" target="_blank">' + upgrade_button.text + '</a><div class="topshop-upgrade-txt">' + upgrade_button.sub_text + '</div>';    
        $( '.preview-notice' ).append( topshop_upgrade_button );
        
        var the_select_value = $( '#customize-control-topshop-slider-type select' ).val();
        topshop_customizer_slider_check( the_select_value );
        
        $( '#customize-control-topshop-slider-type select' ).on( 'change', function() {
            var select_value = $( this ).val();
            topshop_customizer_slider_check( select_value );
        } );
        
        function topshop_customizer_slider_check( select_value ) {
            if ( select_value == 'topshop-slider-default' ) {
                $( '#customize-control-topshop-meta-slider-shortcode' ).hide();
                $( '#customize-control-topshop-slider-cats' ).show();
                $( '#customize-control-topshop-upsell-two-one' ).show();
            } else if ( select_value == 'topshop-meta-slider' ) {
                $( '#customize-control-topshop-slider-cats' ).hide();
                $( '#customize-control-topshop-upsell-two-one' ).hide();
                $( '#customize-control-topshop-meta-slider-shortcode' ).show();
            } else {
                $( '#customize-control-topshop-slider-cats' ).hide();
                $( '#customize-control-topshop-upsell-two-one' ).hide();
                $( '#customize-control-topshop-meta-slider-shortcode' ).hide();
            }
        }
        
    } );
    
} )( jQuery );