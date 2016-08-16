jQuery(document).ready(function($){

	function headerNav() {
		var nav_li = $(".header-nav").find("li").has(".sub-menu");
		var header_nav = $(".header-nav");
		nav_li.hover(function() {
			$(this).toggleClass("hover")
			$(this).find(".sub-menu").toggleClass("show");
			header_nav.toggleClass("show-before");
		});
		$("#header").hover(function() {
			$(this).toggleClass("hover");
		})
	
		
	}
	
	//headerNav();
	
	function headerNavMobile(){
		var header_nav = $(".header-nav");
		var header_nav_list = header_nav.children('ul');
		$("#header-nav-btn").click(function(){
			$(this).toggleClass("active");
			header_nav_list.toggleClass("show");
		})
	}
	headerNavMobile();

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


});


