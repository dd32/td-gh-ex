jQuery(document).ready( function(){

	jQuery("div#accessShow")
		.on("click", function(){
				antonine_aria("true");
				jQuery("#accessHolder")
					.slideDown(500, function(){
										jQuery("#page")
											.animate({opacity:"0.1"},100);
										jQuery("#accessHolder")
											.animate({opacity:"0.7"},200);
										jQuery("div#accessBar")
											.fadeIn(200);
										jQuery("#accessClose")
											.fadeIn(200);
								}
							);
			}
		);
		
	jQuery("p#accessClose")
		.on("click", function(){
				antonine_aria("false");
				jQuery("#accessBar")
					.fadeOut(250,
						function(){
							jQuery("#accessClose")
								.fadeOut(200);
							jQuery("#accessHolder")
								.slideUp(300, function(){
												jQuery("#page")
													.animate({opacity:"1"},200);
											}
										);
						}
					);
				
			}
		);
			
	}
);