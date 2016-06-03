function antonine_last_read_cookie(){
	Cookies.set("user_page_last_read_cookie", new Date().getTime());	
}

jQuery(document).ready( function(){
		setTimeout(antonine_last_read_cookie, 10000);
	}
);