jQuery(document).ready( function(){

	jQuery("div#widgetsShow")
		.on("click", function(){
				antonine_aria("true");
				jQuery("#widgetsHolder")
					.slideDown(500, function(){
										jQuery("#page")
											.animate({opacity:"0.1"},100);
										jQuery("#widgetsHolder")
											.animate({opacity:"0.7"},200);
										jQuery("div#widgetsBar")
											.fadeIn(200);
										jQuery("#widgetsClose")
											.fadeIn(200);
								}
							);
			}
		);
		
	jQuery("p#widgetsClose")
		.on("click", function(){
				antonine_aria("false");
				jQuery("#widgetsBar")
					.fadeOut(250,
						function(){
							jQuery("#widgetsClose")
								.fadeOut(200);
							jQuery("#widgetsHolder")
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