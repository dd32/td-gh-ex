/**
 * Theme Customizer custom scripts
 * Control of show/hide events on feature grid_content type selection
 */
(function($) {
    $('.preview-notice').prepend('<span id="gridalicious_upgrade"><a target="_blank" class="button btn-upgrade" href="' + gridalicious_misc_links.upgrade_link + '">' + gridalicious_misc_links.upgrade_text + '</a></span>');
    jQuery('#customize-info .btn-upgrade, .misc_links').click(function(event) {
        event.stopPropagation();
    });
    
    /* 
     * Color scheme change
     */
    $("#customize-control-gridalicious_theme_options-color_scheme").live( "change", function() {
        var value = $('#customize-control-gridalicious_theme_options-color_scheme input:checked').val();
        if ( 'dark' == value ){
            $('#customize-control-header_textcolor .color-picker-hex').iris('color', '#dddddd');
            $('#customize-control-background_color .color-picker-hex').iris('color', '#111111');
        
        }
        else {
            $('#customize-control-header_textcolor .color-picker-hex').iris('color', '#404040');
            $('#customize-control-background_color .color-picker-hex').iris('color', '#f2f2f2');
        }
    });
     
})(jQuery);