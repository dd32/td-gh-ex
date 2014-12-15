(function($){
	jQuery(document).ready(function($) {		
		$("#nav .menu-toggle").click(function(){					   
			var term = $("#nav .menu").css("display");
			if(term == "none"){
				$("#nav .menu").css("display","block");
			}else{
				$("#nav .menu").css("display","none");
			}		   
		});
		
		var $toTop = $("#gotop");
		$toTop.click(function(){$("html,body").animate({scrollTop: "0px"},500); return false;});
		$(window).scroll(function($){
			var sd = jQuery(window).scrollTop();
			if (sd>200){$toTop.fadeIn(600);}else{$toTop.stop().fadeOut(400);}
		});
	});
})(jQuery);