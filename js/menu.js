jQuery(document).ready(function(){ jQuery("#spark-main-menu ul ul").css({display: "none"}); jQuery('#spark-main-menu ul li').hover( function() { jQuery(this).find('ul:first').slideDown(200).css('visibility', 'visible'); jQuery(this).addClass('selected'); }, function() { jQuery(this).find('ul:first').slideUp(200); jQuery(this).removeClass('selected'); }); 
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