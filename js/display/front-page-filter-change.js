function antonine_filter_search(){
	var data = {
				'action': 'antonine_filter',
				'category': jQuery("#antonine_category").val(),
				'tag': jQuery("#antonine_tag").val(),
				'date': jQuery("#antonine_date").val(),
				'text': jQuery("#antonine_free_text").val(),
				'author': jQuery("#antonine_author").val(),
				'nonce': antonine_filter.nonce
			};
			
	jQuery.post(antonine_filter.ajaxURL, data, function(response) {

			response_data = JSON.parse(response);

			if(response_data['count']!=0){
				jQuery("#antonine_posts_count").fadeOut(200, function(){
																jQuery("#filterShowButton").fadeIn(100);
																jQuery("#antonine_posts_count").html(response_data['count'] + " " + response_data['text']);
																jQuery("#antonine_posts_count").fadeIn(300);
															}
														);
			}
			else
			{
				jQuery("#filterShowButton").fadeOut(100);
				jQuery("#antonine_posts_count").fadeOut(200, function(){
																jQuery("#antonine_posts_count").html(response_data['count'] + " " + response_data['text']);
																jQuery("#antonine_posts_count").fadeIn(300);
															}
														);
			}
		}
	);
}

jQuery(document).ready( function(){
	
	jQuery("#antonine_free_text")
		.on("keyup", function(){
				antonine_filter_search();
			}
		);

	jQuery("div#filterBar select")
		.on("change", function(){
				antonine_filter_search();
			}
		);
		
	jQuery("#filterShowButton")
		.on("click", function(){
				jQuery("#filterBar")
					.fadeOut(250,
						function(){
							jQuery("#filterClose")
								.fadeOut(200);
							jQuery("#filterHolder")
								.slideUp(300, function(){
												jQuery("#page")
													.animate({opacity:"1"},200,
														function(){
															jQuery("#main")
																.fadeOut(400, function(){
																		jQuery("#main")
																			.html("");
																	
																		var data = {
																			'action': 'antonine_show_posts',
																			'category': jQuery("#antonine_category").val(),
																			'tag': jQuery("#antonine_tag").val(),
																			'date': jQuery("#antonine_date").val(),
																			'author': jQuery("#antonine_author").val(),
																			'text': jQuery("#antonine_free_text").val(),
																			'nonce': antonine_filter.nonce
																		};
							
																		jQuery.post(antonine_filter.ajaxURL, data, function(response) {
																				response_data = JSON.parse(response);
																				
																				jQuery("#main")
																					.html(response_data.data);	
																					
																				scrolling = true;
																							
																				jQuery('#scroll_bottom').attr("scroll","off");
																																				antonine_preview_link();										
																				jQuery( "article")
																					.each(	
																						function(index,value){
																							jQuery(value)
																								.css("left","0px");
																							}
																						);		

																				header = jQuery("header#masthead").html();
																				
																				jQuery("header#masthead").html(header + "<p class='filter_reset'><a href='" + antonine_filter.siteURL + "'>" + antonine_filter.resetFilter + "</a></p>")
																		
																				jQuery("#main")
																					.fadeIn(200);
																						
				antonine_article_align();																			}
																		);
																	}
																);
														}
													);
											}
										);
						}
					);
			}
		);

	
	}

);