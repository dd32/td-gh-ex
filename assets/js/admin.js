jQuery(document).ready(function($) {
    "use strict";
    //FontAwesome Icon Control JS
    jQuery('body').on('click', '.best-classifieds-icon-list li', function(){
        var icon_class = jQuery(this).find('i').attr('class');
        jQuery(this).addClass('icon-active').siblings().removeClass('icon-active');
        jQuery(this).parent('.best-classifieds-icon-list').prev('.best-classifieds-selected-icon').children('i').attr('class','').addClass(icon_class);
        jQuery(this).parent('.best-classifieds-icon-list').next('input').val(icon_class).trigger('change');
    });
    jQuery('body').on('click', '.best-classifieds-selected-icon', function(){
        jQuery(this).next().slideToggle();
    });
});
