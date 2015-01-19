/**
 * Admin Metabox 
 * Metabox custom jquery functions
 */
 
jQuery(document).ready(function() {
    var active = 0;
    if (jQuery.cookie('#gridalicious-ui-tabs')) {
        active = jQuery.cookie('#gridalicious-ui-tabs');
        jQuery.cookie('#gridalicious-ui-tabs', null);
    }

    var tabs = jQuery('#gridalicious-ui-tabs').tabs({
        active: active
    });

});