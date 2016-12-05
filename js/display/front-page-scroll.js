scrolling = false;

jQuery(document).ready( function(){
	jQuery(window).scroll(function (event) {
	
			var scrollTop     = jQuery(window).scrollTop();
			elementOffset = jQuery('#scroll_bottom').offset().top;
			distance      = (elementOffset - scrollTop);
						
			console.log("antonine scroll position " + distance + " " + (jQuery(window).height() + 50));

			if(distance <= (jQuery(window).height() + 50)){

				console.log("antonine scrolling possible");
			
				scroll_on = jQuery('#scroll_bottom').attr("scroll");
				
				if(scroll_on=="on"){
				
					if(!scrolling){
				
						console.log("antonine scrolling request sent");
	
						scrolling = true;
					
						var data = {
							'action': 'antonine_scroll',
							'cat': jQuery('#scroll_bottom').attr("cat"),
							'author': jQuery('#scroll_bottom').attr("author"),
							'tag_id': jQuery('#scroll_bottom').attr("tag_id"),
							'offset': jQuery('#scroll_bottom').attr("page"),
							'posts': jQuery('#scroll_bottom').attr("posts_per_page"),
							'nonce': antonine_scroll.nonce
						};

						jQuery.post(antonine_scroll.ajaxURL, data, function(response) {
						
								response_data = JSON.parse(response);
								
								if(!response_data.end){
									
									jQuery("#main")
										.append(response_data['data']);
										
									jQuery('#scroll_bottom')
										.attr("page", parseInt(jQuery('#scroll_bottom').attr("posts_per_page")) + parseInt(jQuery('#scroll_bottom').attr("page")))	
									
									items = Array();
									
									antonine_article_align();
										
									antonine_preview_link();
										
									jQuery( ".infinite_scroll")
										.each(	
											function(index,value){
												items.push(value);
												jQuery(value)
													.removeClass("infinite_scroll");	
											}
										);
										
									antonine_menu_slide(items);
	
									
								}else{
									html = jQuery("#main")
												.html();
									jQuery("#main")
										.html(html + "<p class='nomoreposts'>" + response_data.data + "</p>");
										
									antonine_preview_link();	
								}

								console.log("antonine scroll complete");
								
							}
						);
									
					}
					
				}
			}
		});
	}
);