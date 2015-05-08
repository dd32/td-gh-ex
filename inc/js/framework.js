jQuery( document ).ready(function( $ ) {

	$(".post").fitVids(); 
	$(".wp-video").fitVids({ customSelector: "video"});

	// adding dropdown class for fallback wp_list_pages submenu
	$(".page_item_has_children").each(function() {
	$(this).addClass("dropdown");
		});

	$("li.page_item_has_children > a").each(function() {
	  $(this).addClass("dropdown-toggle");
	  $(this).attr( "data-toggle", "dropdown" );
	  $(this).next().addClass("dropdown-menu");
	});
			

	// BACK TO TOP
	$(window).scroll(function() {
		if ($(this).scrollTop()) {
			$('#toTop').fadeIn();
		} else {
			$('#toTop').fadeOut();
		}
	});

	$("#toTop").click(function() {
		$("html, body").animate({scrollTop: 0}, 800);
	});

});