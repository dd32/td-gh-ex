/*
D5 Creation
https://d5creation.com
Copyright 2012-1018: D5 Creation (www.d5creation.com)
License: GNU GPL
*/

jQuery(document).ready(function(){ 'use strict'; 
	jQuery('#mobile-menu').click(function(){ jQuery('#main-menu-con').toggle(); jQuery(this).toggleClass('yesclick'); });			  
	jQuery(window).scroll(function() { if (jQuery(this).scrollTop() > 5 ) { jQuery('.go-top').fadeIn(150); } else { jQuery('.go-top').fadeOut(150); } });
	jQuery('.go-top').click(function(event) { event.preventDefault(); jQuery('html, body').animate({scrollTop: 0}, 500); });
	jQuery('#respond .comment-form-author, #respond .comment-form-email, #respond .comment-form-url').addClass('flexboxitem');		  
});

jQuery(window).on("load resize", function () { 	'use strict';
	if ( jQuery('#site-container')[0] ) {
		var docW = jQuery("#site-container").width();
		var t = jQuery("#site-container").offset().left;
		jQuery( ".menu-item-has-children, .page_item_has_children" ).each(function() {
			if (jQuery('ul', this).length) {
				var elm = jQuery('ul:first', this);
				var off = elm.offset();
				var l = off.left;
				var w = elm.width();            
				var isEntirelyVisible = (l + w <= docW + t);
				if (!isEntirelyVisible) {
					jQuery(this).addClass('smedge');
				} else {
					jQuery(this).removeClass('smedge');
				}
			}
		});
	}
});