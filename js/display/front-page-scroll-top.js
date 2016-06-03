jQuery(document).ready( function(){
	jQuery("#antoninetopscroll")
		.on("click", function(){
				jQuery('html, body').animate({scrollTop: jQuery("html").offset().top}, 400);
			}
		);
	jQuery(window).scroll(function (event) {
	
			var scrollTop = jQuery(window).scrollTop();
			
			if(scrollTop < 400){
			
				jQuery("#antoninetopscroll")
					.fadeOut(200);
				
			}else{
			
				jQuery("#antoninetopscroll")
					.fadeIn(200);
			
			}
		});
	}
);