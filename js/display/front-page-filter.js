jQuery(document).ready( function(){

	jQuery("div#filterShow")
		.on("click", function(){
				antonine_aria("true");	
				jQuery("#filterHolder")
					.slideDown(500, function(){
										jQuery("#page")
											.animate({opacity:"0.1"},100);
										jQuery("#filterHolder")
											.animate({opacity:"1"},200);
										jQuery("#filterClose")
											.fadeIn(200);
										jQuery("div#filterBar")
											.fadeIn(200);
								}
							);
			}
		);
		
	jQuery("p#filterClose")
		.on("click", function(){
				antonine_aria("false");
				jQuery("#filterBar")
					.fadeOut(250,
						function(){
							jQuery("#filterClose")
								.fadeOut(200);
							jQuery("#filterHolder")
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