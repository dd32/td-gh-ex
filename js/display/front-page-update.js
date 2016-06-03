function antonine_poll(){

	last_read = Cookies.get("user_page_last_read_cookie");
	
	var data = {
		'action': 'antonine_update_poll',
		'last_read' : last_read,
		'nonce': antonine_update.nonce
	};

	jQuery.post(antonine_update.ajaxURL, data, function(response) {
			postData = JSON.parse(response);
			if(postData.updates=="true"){
				antonine_toggle();
			}else{
				antonine_toggle_off();
			}
		}
	);
	
	setTimeout(antonine_poll, 10000);
}

function antonine_toggle_off(){
	jQuery( "#updatesShow" ).animate({
						backgroundColor: "#000",
						color: "#fff"
					}, 1000);
}

function antonine_toggle(){
	jQuery( "#updatesShow" ).animate({
						backgroundColor: "#000",
						color: "#f55"
					}, 1000);
}

jQuery(document).ready( function(){

	setTimeout(antonine_poll, 1);

	jQuery("div#updatesShow")
		.on("click", function(){
				antonine_aria("true");
				jQuery("#updatesHolder")
					.slideDown(500, function(){
										jQuery("#page")
											.animate({opacity:"0.1"},100);
										jQuery("#updatesHolder")
											.animate({opacity:"0.7"},200);
										jQuery("div#updatesBar")
											.fadeIn(200);
										jQuery("#updatesClose")
											.fadeIn(200);
								}
							);
							
				read = Array();
				
				pages_read = Cookies.get('user_page_read_cookie');
					
				if(pages_read!=undefined){
					pages_read = pages_read.split("-");
					for(x in pages_read){
						if(pages_read[x]!=""){
							read.push(pages_read[x]);
						}
					}
				}

				last_read = Cookies.get("user_page_last_read_cookie");
				
				var data = {
							'action': 'antonine_update',
							'read' : read,
							'last_read' : last_read,
							'nonce': antonine_update.nonce
						};
						
				jQuery.post(antonine_update.ajaxURL, data, function(response) {
						postData = JSON.parse(response);
						
						if(postData['new_posts']==1){
							post = "post";
						}else{
							post = "posts";
						}
						
						jQuery("#newPosts")
							.html("<h2>" + postData['new_posts_count'] + " new " + post + "</h2>" + postData['new_posts']);
							
						if(postData['new_comments_count']==1){
							post = "comment";
						}else{
							post = "comments";
						}
						
						jQuery("#newComments")
							.html("<h2>" + postData['new_comments_count'] + " new " + post + "</h2>" + postData['new_comments']);	
						
						if(postData['posts_not_read']==1){
							post = "post";
						}else{
							post = "posts";
						}
	
						jQuery("#unreadPosts")
							.html("<h2>" + postData['posts_count'] + " unread " + post + "</h2>" + postData['posts_not_read']);	
					}
				);			
					
				
			}
		);
		
	jQuery("p#updatesClose")
		.on("click", function(){
				antonine_aria("false");
				jQuery("#updatesBar")
					.fadeOut(250,
						function(){
							jQuery("#updatesClose")
								.fadeOut(200);
							jQuery("#updatesHolder")
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