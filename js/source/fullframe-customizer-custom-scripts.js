/**
 * Theme Customizer custom scripts
 * Control of show/hide events on feature slider type selection
 */
(function($) {

    //Add Upgrade Button,Theme instruction, Support Forum, Changelog, Donate link, Review, Facebook, Twitter, Google+, Pinterest links
    $('.preview-notice').prepend('<span id="fullframe_upgrade"><a target="_blank" class="button btn-upgrade" href="' + fullframe_data.upgrade_link + '">' + fullframe_data.upgrade_text + '</a></span>');
    jQuery('#customize-info .btn-upgrade, .misc_links').click(function(event) {
        event.stopPropagation();
    });

})(jQuery);

( function( api ) {
    wp.customize( 'fullframe_theme_options[reset_all_settings]', function( setting ) {
        setting.bind( function( value ) {
            var code = 'needs_refresh';
            if ( value ) {
                setting.notifications.add( code, new wp.customize.Notification(
                    code,
                    {
                        type: 'info',
                        message: fullframe_data.reset_message
                    }
                ) );
            } else {
                setting.notifications.remove( code );
            }
        } );
    } );
} )( wp.customize );