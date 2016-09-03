jQuery(document).ready( function(){

	jQuery("div#infoShow")
		.on("click", function(){
				antonine_aria("true");
				jQuery("#infoHolder")
					.slideDown(500, function(){
										jQuery("#page")
											.animate({opacity:"0.1"},100);
										jQuery("#infoHolder")
											.animate({opacity:"1"},200);
										jQuery("div#infoBar")
											.fadeIn(200);
										jQuery("#infoClose")
											.fadeIn(200);
								}
							);
				jQuery("#page")
					.css("position","fixed")
					.css("overflow","hidden");
			}
		);
		
	jQuery("p#infoClose")
		.on("click", function(){
				antonine_aria("false");
				jQuery("#infoBar")
					.fadeOut(250,
						function(){
							jQuery("#infoClose")
								.fadeOut(200);
							jQuery("#infoHolder")
								.slideUp(300, function(){
												jQuery("#page")
													.animate({opacity:"1"},200);
											}
										);
							jQuery("#page")
								.css("position","relative")
								.css("overflow","scroll");
						}
					);
				
			}
		);
			
	}
);