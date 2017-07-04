jQuery(document).ready(function($){

	$("#header .btn-search").bind("click", function() {
        "none" == $(".header-search-slide").css("display") ? ($(this).removeClass("uicon-search2").addClass("uicon-cancel"), 
        $(".cd-cover-layer").addClass("search-form-visible"), $(".main-body").addClass("mh"), 
        $(".header-search-slide").slideDown(), $(".header-search-slide").children().children("input").focus()) : ($(this).removeClass("uicon-cancel").addClass("uicon-search2"), 
        closeSearchForm());
    });
	
	
	$(".cd-cover-layer").bind("click", function() {
        $("#header .btn-search").removeClass("uicon-cancel").addClass("uicon-search2"), 
        closeSearchForm();
    });
	
	function closeSearchForm() {
		$(".header-search-slide").slideUp(), $(".main-body").removeClass("mh"), $(".cd-cover-layer").removeClass("search-form-visible");
	}


	/*
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
	headerNav();
	*/
	
	function headerNavMobile(){
		//alert('ok');
		var header_nav = $(".header-nav");
		var header_nav_list = header_nav.children('ul');
		$("#header-nav-btn").click(function(){

			//alert('ok');
			$(this).toggleClass("active");//add and remove active class for #header-nav-btn
			$(this).parents("#header").toggleClass("headerbg");
			header_nav_list.toggleClass("show");
			
			//fix not fix
			if(header_nav_list.hasClass("show") ){
				$("#header").css("position","fixed");
				$(".blog-content").css("padding-top","100px");
			}else{
				
				$("#header").css("position","inherit");
				$(".blog-content").css("padding-top","30px");				
				
			}			
			
		});
	}
	headerNavMobile();
	
	
	//go top
    var toolitembar = $("#toolitembar");
    var gotop = $("#back-top");

    $(window).scroll(function () {
        var scroll_y = $(window).scrollTop();
        if (scroll_y > 500) {
            gotop.addClass('showa');
        } else {
            gotop.removeClass('showa');
        }
		
        if (scroll_y > 50) {
            $("#header").addClass('header-bg');
        } else {
            $("#header").removeClass('header-bg');
        }		
    });
    gotop.click(function (event) {
        $("body,html").animate({ scrollTop: 0 }, 600);
    });

	//check header
	


});


