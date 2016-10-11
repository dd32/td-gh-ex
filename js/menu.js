jQuery(document).ready(function(){ jQuery("#main-menu-con ul ul").css({display: "none"}); jQuery('#main-menu-con ul li').hover( function() { jQuery(this).find('ul:first').slideDown(200).css('visibility', 'visible'); jQuery(this).addClass('selected'); }, function() { jQuery(this).find('ul:first').slideUp(200); jQuery(this).removeClass('selected'); }); });  
		
jQuery(document).ready(function(){
jQuery('.mobile-menu').click(function(){ jQuery('#main-menu-con').toggle(); });
jQuery('.go-top').click(function(event) { event.preventDefault(); jQuery('html, body').animate({scrollTop: 0}, 500); }); 
jQuery(window).scroll(function() { if (jQuery(this).scrollTop() > jQuery('#header').outerHeight(true)) { jQuery('.go-top').fadeIn(150); } else { jQuery('.go-top').fadeOut(150); } });
jQuery('#header').css('width', jQuery('body').outerWidth(true) );
jQuery(window).resize(function(){ jQuery('#header').css('width', jQuery('body').outerWidth(true) ); });

});	
