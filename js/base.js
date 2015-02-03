(function($){
	jQuery(document).ready(function($){		
		jQuery("#nav .menu-toggle").click(function(){					   
			var term = jQuery("#nav .menu").css("display");
			if(term == "none"){jQuery("#nav .menu").css("display","block");}else{jQuery("#nav .menu").css("display","none");}		   
		});
		
		jQuery('#back_top').click(function(){
			jQuery('html, body').animate({scrollTop:0}, 'normal');return false;
		});	
		jQuery(window).scroll(function(){
			if(jQuery(this).scrollTop() !== 0){jQuery('#back_top').fadeIn();}else{jQuery('#back_top').fadeOut();}
		});
		if(jQuery(window).scrollTop() !== 0){jQuery('#back_top').show();}else{jQuery('#back_top').hide();}
		
		jQuery("#main").fitVids();
	});
})(jQuery);