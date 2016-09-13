jQuery(document).ready(function($){

	//headerNav();
	
	function headerNavMobile(){
		var header_nav = $(".header-nav");
		var header_nav_list = header_nav.children('ul');
		$("#header-nav-btn").click(function(){
			$(this).toggleClass("active");//add and remove active class for #header-nav-btn
			$(this).parents("#header").toggleClass("headerbg");
			header_nav_list.toggleClass("show");
		})
	}
	headerNavMobile();
	
	
	//go top
    var toolitembar = $("#toolitembar");
    var gotop = $("#back-top");

    $(window).scroll(function () {
        var scroll_y = $(window).scrollTop();
        if (scroll_y > 500) {
            gotop.addClass('show');
        } else {
            gotop.removeClass('show');
        }
    });
    gotop.click(function (event) {
        $("body,html").animate({ scrollTop: 0 }, 600);
    });

	//check header
});


