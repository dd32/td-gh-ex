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

	
	
	// video resize
	var height = jQuery(window).height();
	jQuery(".ascreen_video_background").css("height",height);
	var height_content_video = jQuery(".section_content_video").height();
	var top = (height-height_content_video)/2-70;
	
	if(top<0)
	{
		jQuery(".section_content_video").css("padding-top",0); 
	}else{
		jQuery(".section_content_video").css("padding-top",top); 
	}
	
	$(window).resize(function() {
		var height = jQuery(window).height();
		jQuery(".ascreen_video_background").css("height",height);
		var height_content_video = jQuery(".section_content_video").height();
		var top = (height-height_content_video)/2;
		
		if(top<0)
		{
			jQuery(".section_content_video").css("padding-top",0); 
		}else{
			jQuery(".section_content_video").css("padding-top",top); 
		}
	
	});
	
	//hide video buuton
	window.onscroll=function(){ 
		if ($(document).scrollTop() > height ) 
		{ 
			$("#video_button_wrapper .goto").css({display:"none"});
		}else{
			
			$("#video_button_wrapper .goto").css({display:"block"});
		}
	}
	// video resize end	
	
	
	
});

//video
var myPlayer;
jQuery(function () {
	myPlayer = jQuery(".ascreen_video_background").YTPlayer({align:"center,left"});
});

// @param state
function changeLabel(state){
	jQuery("#togglePlay").html(state != 1 ? "&raquo;" : "&times;");

	jQuery("#togglePlay").removeClass(state != 1 ? "play" : "pause");
	jQuery("#togglePlay").addClass(state != 1 ? "pause" : "play");
}
//video end
