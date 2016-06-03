jQuery(document).ready( function(){

	jQuery("div#filesShow")
		.on("click", function(){
				antonine_aria("true");
				jQuery("#filesHolder")
					.slideDown(500, function(){
										jQuery("#page")
											.animate({opacity:"0.1"},100);
										jQuery("#filesHolder")
											.animate({opacity:"0.7"},200);
										jQuery("div#filesBar")
											.fadeIn(200);
										jQuery("#filesClose")
											.fadeIn(200);
								}
							);
							
				var data = {
							'action': 'antonine_files',
							'nonce': antonine_files.nonce
						};
						
				jQuery.post(antonine_files.ajaxURL, data, function(response) {
						jQuery("#filesSpace")
							.html(response);
					}
				);			
							
			}
		);
		
	jQuery("p#filesClose")
		.on("click", function(){
				antonine_aria("false");
				jQuery("#filesBar")
					.fadeOut(250,
						function(){
							jQuery("#filesClose")
								.fadeOut(200);
							jQuery("#filesHolder")
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