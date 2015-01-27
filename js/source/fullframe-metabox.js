/**
 * Admin Metabox 
 * Metabox custom jquery functions
 */
 
jQuery(document).ready(function() {
    var active = 0;
    if (jQuery.cookie('#fullframe-ui-tabs')) {
        active = jQuery.cookie('#fullframe-ui-tabs');
        jQuery.cookie('#fullframe-ui-tabs', null);
    }

    var tabs = jQuery('#fullframe-ui-tabs').tabs({
        active: active
    });

});