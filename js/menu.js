jQuery(document).ready(function(){ 'use strict'; 
	jQuery('#main-menu-con ul li').hover( function() { jQuery(this).find('ul:first').stop(true, true).slideDown(200).css('visibility', 'visible'); jQuery(this).addClass('selected'); }, function() { jQuery(this).find('ul:first').stop(true, true).slideUp(200); jQuery(this).removeClass('selected'); });

	jQuery('#topdirection').click(function(event) { event.preventDefault(); jQuery('html, body').animate({scrollTop: 0}, 500); });
	jQuery('.mobile-menu').click(function(){ jQuery(this).toggleClass('mmgoup'); jQuery('#main-menu-con').toggle(); });
								   
	jQuery('#respond .comment-form-author, #respond .comment-form-email, #respond .comment-form-url').addClass('flexboxitem');
								  
	jQuery('.heightzero').removeClass('heightzero');							  
	if(jQuery('#slide-container')[0]){							   
		jQuery('.slider').fractionSlider({ 'fullWidth': true, 'controls': true, 'pager': true, 'responsive': true, 'dimensions': "1000,400", 'increase': false, 'pauseOnHover': true, 'slideEndAnimation': true 	});
	}
	
	jQuery('.main-menu-items > li').addClass('top-level-menu');							  
	jQuery('.page_item_has_children').addClass('menu-item-has-children');
	jQuery('.children').addClass('sub-menu');							  
	jQuery('#main-menu-con .menu-item-home').removeClass('current-menu-item current_page_item');
		 
	jQuery( "#main-menu-con a" ).focusin(function() { 
		jQuery(this).closest('.top-level-menu').siblings().find('.sub-menu').stop(true, true).slideUp(200);		
		jQuery(this).next('.sub-menu').stop(true, true).slideToggle(200).parent().siblings().find('.sub-menu').stop(true, true).slideUp(200); 
	});									  
								  
								  
});

jQuery(window).on('load resize', function () { 	'use strict';
    jQuery(".menu-item-has-children, .page_item_has_children").on('mouseenter mouseleave', function () { 
        if (jQuery('ul', this).length) {
            var elm = jQuery('ul:first', this);
            var off = elm.offset();
            var l = off.left;
            var w = elm.width();
            var docW = jQuery("#header").width();
			var t = jQuery("#header").offset().left;
            var isEntirelyVisible = (l + w <= docW + t);
            if (!isEntirelyVisible) {
                jQuery(this).addClass('smedge');
            } else {
                jQuery(this).removeClass('smedge');
            }
        }
    });
});