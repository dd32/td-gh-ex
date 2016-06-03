jQuery(document).ready( function(){
	jQuery(window).scroll(function (event) {
	
			var scrollTop     = jQuery(window).scrollTop(),
			elementOffset = jQuery('#gradient').offset().top,
			distance      = (elementOffset - scrollTop);
			
			if(distance <= (jQuery(window).height() + 10)){
				pages_read = Cookies.get('user_page_read_cookie');
				id = jQuery("article.type-post").attr("id").split("post-").join("");
				if(pages_read!=undefined){
					if(pages_read.indexOf("-" + id + "-")==-1){
						Cookies.set("user_page_read_cookie", pages_read + "-" + id + "-");
					}
				}else{
					Cookies.set("user_page_read_cookie", "-" + id + "-");
				}
			}
			
		});
	}
);