jQuery(document).ready( function(){

	jQuery("#subscribeButton")
		.on("click", function(ev){
		
			ev.preventDefault();
			var data = {
							'action': 'antonine_subscribe',
							'email': jQuery("#emailaddress").val(),
							'nonce': antonine_subscribe.nonce
						};
						
				jQuery.post(antonine_subscribe.ajaxURL, data, function(response) {
						jQuery("#subscribeResponse")
							.html(response);
					}
				);
			}
			
		);

	jQuery("div#subscribeShow")
		.on("click", function(){
				antonine_aria("true");
				jQuery("#subscribeResponse")
					.html("");
				jQuery("#subscribeHolder")
					.slideDown(500, function(){
										jQuery("#page")
											.animate({opacity:"0.1"},100);
										jQuery("#subscribeHolder")
											.animate({opacity:"0.7"},200);
										jQuery("div#subscribeBar")
											.fadeIn(200);
										jQuery("#subscribeClose")
											.fadeIn(200);
										jQuery("div#subscribesform")
											.fadeIn(200);
								}
							);
			}
		);
		
	jQuery("p#subscribeClose")
		.on("click", function(){
				antonine_aria("false");
				jQuery("#subscribeBar")
					.fadeOut(250,
						function(){
							jQuery("#subscribeClose")
								.fadeOut(200);
							jQuery("div#subscribesform")
								.fadeOut(200);
							jQuery("#subscribeHolder")
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