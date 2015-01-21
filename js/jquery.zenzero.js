(function($) {
	"use strict";
	
	$(document).ready(function() {
	
		/*-----------------------------------------------------------------------------------*/
		/*  If the Tagcloud widget exist or Edit Comments Link exist
		/*-----------------------------------------------------------------------------------*/ 
			if ( $( '.comment-metadata' ).length ) {
				$('.comment-metadata').addClass('smallPart');
			}
			if ( $( '.reply' ).length ) {
				$('.reply').addClass('smallPart');
			}
			
		/*-----------------------------------------------------------------------------------*/
		/*  Search button
		/*-----------------------------------------------------------------------------------*/ 
			if ( $( '.showSearch' ).length ) {
				$('.showTop').addClass('withS');
			}
		
			$('#open-search').click(function() {
				$('#search-full').fadeIn(400);
				if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
				} else {
					$("#search-full #search-field").focus();
				}
			});

			$('#close-search').click(function() {
				$('#search-full').fadeOut(400);
			});
	
		/*-----------------------------------------------------------------------------------*/
		/*  Overlay Effect for Featured Image
		/*-----------------------------------------------------------------------------------*/ 	
			$(".overlay-img").hover(function () {
				$(this).stop().animate({
					opacity: .5
				}, 300);
			},
			function () {
				$(this).stop().animate({
					opacity: 0
				}, 300);
			});
			
		/*-----------------------------------------------------------------------------------*/
		/*  Sidebar Push
		/*-----------------------------------------------------------------------------------*/ 		
			$('.widget-area').addClass('loaded');
			$('.showSide').click(function() {
				if ($(this).hasClass('close')) {
					$(this).removeClass('close');
					$('body').toggleClass( "menu-opened");
				} else {
					$(this).addClass('close');
					$('body').toggleClass( "menu-opened");
				}
			});
			
		/*-----------------------------------------------------------------------------------*/
		/*  Detect Mobile Browser
		/*-----------------------------------------------------------------------------------*/ 
		if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		} else {
		
			/*-----------------------------------------------------------------------------------*/
			/*  If menu has submenu
			/*-----------------------------------------------------------------------------------*/ 
				$('.main-navigation').find("li").each(function(){
					if($(this).children("ul").length > 0){
						$(this).append("<span class='indicator'></span>");
					}
				});
			
			/*-----------------------------------------------------------------------------------*/
			/*  Scroll To Top
			/*-----------------------------------------------------------------------------------*/ 
				$(window).scroll(function(){
					if ($(this).scrollTop() > 700) {
						$('#toTop').fadeIn();
					} 
					else {
						$('#toTop').fadeOut();
					}
				}); 
				$('#toTop').click(function(){
					$("html, body").animate({ scrollTop: 0 }, 1000);
					return false;
				});
		
		}
		
	
	});
	
})(jQuery);