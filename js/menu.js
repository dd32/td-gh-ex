jQuery(document).ready(function(){ jQuery("#main-menu-con ul ul").css({display: "none"}); jQuery('#main-menu-con ul li').hover( function() { jQuery(this).find('ul:first').slideDown(200).css('visibility', 'visible'); jQuery(this).addClass('selected'); }, function() { jQuery(this).find('ul:first').slideUp(200); jQuery(this).removeClass('selected'); }); 
jQuery('.tcontainer1').css('border-right-width', jQuery('body').outerWidth(true)/2 +'px' );
jQuery('.tcontainer2').css('border-left-width', jQuery('body').outerWidth(true)/2 +'px' );
jQuery('.header-back-abs').css('width', jQuery('body').outerWidth(true) );
jQuery('.header-back-abs').css('position', 'absolute' );

});

jQuery(window).resize(function(){  
jQuery('.tcontainer1').css('border-right-width', jQuery('body').outerWidth(true)/2 +'px' );
jQuery('.tcontainer2').css('border-left-width', jQuery('body').outerWidth(true)/2 +'px' );
jQuery('.header-back-abs').css('width', jQuery('body').outerWidth(true) );
jQuery('.header-back-abs').css('position', 'absolute' );

});