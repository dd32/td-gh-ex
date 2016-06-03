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
						'action': 'antonine_unsubscribe_process',
						'unsub': antonine_unsubscribe_process.unsub,
						'nonce': antonine_unsubscribe_process.nonce
					};
					
		jQuery.post(antonine_unsubscribe_process.ajaxURL, data, function(response) {
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