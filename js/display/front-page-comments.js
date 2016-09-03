jQuery(document).ready( function(){

	jQuery("#commmentsShow")
		.on("click", function(){
		
				antonine_aria("true");
	
				jQuery("#commentsHolder")
					.slideDown(500, function(){
										jQuery("#page")
											.animate({opacity:"0.1"},100);
										jQuery("#commentsHolder")
											.animate({opacity:"1.0"},200);
										jQuery("#commentsClose")
											.fadeIn(200);
										jQuery("div#commentsBar")
											.fadeIn(200);
								}
							);
				
				var data = {
							'action': 'antonine_comments',
							'nonce': antonine_comments.nonce
						};
						
				jQuery.post(antonine_comments.ajaxURL, data, function(response) {
						jQuery("#commentsSpace")
							.html(response);
					}
				);

				jQuery("#page")
					.css("position","fixed")
					.css("overflow","hidden");
			
			}
		);
		
	jQuery("p#commentsClose")
		.on("click", function(){
				antonine_aria("false");

				jQuery("#page")
					.css("position","relative")
					.css("overflow","scroll");

				jQuery("#commentsBar")
					.fadeOut(250,
						function(){
							jQuery("#commentsClose")
								.fadeOut(200);
							jQuery("#commentsHolder")
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