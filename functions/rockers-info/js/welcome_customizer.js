jQuery(document).ready(function() {
    var rockers_aboutpage = rockersLiteWelcomeScreenCustomizerObject.aboutpage;
    var rockers_nr_actions_required = rockersLiteWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof rockers_aboutpage !== 'undefined') && (typeof rockers_nr_actions_required !== 'undefined') && (rockers_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + rockers_aboutpage + '"><span class="rockers-actions-count">' + rockers_nr_actions_required + '</span></a>');
    }

    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".rockers-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section rockers-upsells">');
    }
    if (typeof rockers_aboutpage !== 'undefined') {
        jQuery('.rockers-upsells').append('<a style="width: 80%; margin: 5px auto 15px auto; display: block; text-align: center;" href="' + rockers_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', rockersLiteWelcomeScreenCustomizerObject.themeinfo));
    }
    if ( !jQuery( ".rockers-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});