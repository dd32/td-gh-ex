jQuery(document).ready( function(){

	jQuery("#previewClose")
		.on("click", function(){
				antonine_aria("false");
				jQuery("#previewHolder")
					.css("z-index",10000);
				jQuery("#previewClose")
					.fadeOut(100);
				jQuery("#previewHolder")
										.animate(
													{opacity:"0",height:"0",width:"0", left:"50%", top:"50%"},
													500,
													function(){	
														jQuery("#page")
															.animate(
																		{opacity:"1"},
																		500
																	);
														jQuery("#previewTitle")
															.html("");
														jQuery("#previewContent")
															.html("");
													}
												);
			}
		);
		
		antonine_preview_link();
		
	}
	
);

function antonine_preview_link(){

	jQuery( "article .preview_link" )
		.each(
			function(index,value){
				jQuery(value)
					.on("click", function(event){
							
							antonine_aria("true");
							
							var data = {
								'action': 'antonine_preview',
								'post': jQuery(event.currentTarget).attr("target"),
								'nonce': antonine_preview.nonce
							};
							
							jQuery.post(antonine_preview.ajaxURL, data, function(response) {
							
									response_data = JSON.parse(response);
									
									jQuery("#previewContent")
										.css("height", (parseInt(jQuery(window).height()) - 275) + "px")
										.css("display", "none");
									
									jQuery("#page")
										.animate(
													{opacity:"0.05"},
													500
												);
								
									jQuery("#previewHolder")
										.css("z-index",10000);
								
									jQuery("#previewHolder")
										.animate(
													{opacity:"1",left:"12%",top:"10%",height:"+" + (parseInt(jQuery(window).height()) - 200) + "px",width:"+76%"},
													500,
													function(){														
														jQuery("#previewTitle")
															.html(response_data['title']);
														jQuery("#previewTitle")
															.fadeIn(1000);
														jQuery("#previewClose")
															.fadeIn(1000);
														jQuery("#previewContent")
															.html(response_data['data']);
														jQuery("#previewContent")
															.fadeIn(1000);
													}
												);
									
								}
							);
						}
					);
			}
		);
			
}
