jQuery(document).ready(function() {
    var avis_aboutpage = avisLiteWelcomeScreenCustomizerObject.aboutpage;
    var avis_nr_actions_required = avisLiteWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof avis_aboutpage !== 'undefined') && (typeof avis_nr_actions_required !== 'undefined') && (avis_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + avis_aboutpage + '"><span class="avis-lite-actions-count">' + avis_nr_actions_required + '</span></a>');
    }

    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".avis-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section avis-upsells">');
    }
    if (typeof avis_aboutpage !== 'undefined') {
        jQuery('.avis-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="' + avis_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', avisLiteWelcomeScreenCustomizerObject.themeinfo));
    }
    if ( !jQuery( ".avis-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});