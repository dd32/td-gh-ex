jQuery(document).ready( function(){

		jQuery("#subscribesform")
			.css("display", "none");
			
		antonine_aria("true");	

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
								}
							);
		
		var data = {
						'action': 'antonine_subscribe_process',
						'sub': antonine_subscribe_process.sub,
						'nonce': antonine_subscribe_process.nonce
					};
					
		jQuery.post(antonine_subscribe_process.ajaxURL, data, function(response) {
					data = JSON.parse(response);
					if(data['success']!=undefined){
						jQuery("#subscribeResponse")
							.html(data['success']);
					}else{
						jQuery("#subscribeResponse")
							.html(data['error']);
					}
					jQuery("#subscribeResponse")
						.fadeIn(200);
				}
			);
			
		
	}
	
);