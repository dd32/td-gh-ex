(function($) {
	"use strict";
	
	$(document).ready(function() {
	
		/*-----------------------------------------------------------------------------------*/
		/*  Top Search Button
		/*-----------------------------------------------------------------------------------*/ 
		$('.top-search').click(function() {
			$('.topSearchForm').slideToggle();
			$(this).toggleClass("active");
			return false;
		});
		
		/*-----------------------------------------------------------------------------------*/
		/*  If menu has submenu
		/*-----------------------------------------------------------------------------------*/ 
		$('.main-navigation').find("li").each(function(){
			if(jQuery(this).children("ul").length > 0){
				jQuery(this).append("<span class='indicator'></span>");
			}
		});
	
		/*-----------------------------------------------------------------------------------*/
		/*  Menu Effect
		/*-----------------------------------------------------------------------------------*/ 
		$('.main-navigation ul > li.menu-item-has-children').hover(function() {
			$(this).find('> ul.sub-menu').slideDown();
		}, function() {
			$(this).find('> ul.sub-menu').slideUp();
		});
		
		/*-----------------------------------------------------------------------------------*/
		/*  Sidebar for mobile
		/*-----------------------------------------------------------------------------------*/ 
		$('.sidebar-toggle').click(function() {
			$('#secondary aside').slideToggle();
			$(this).toggleClass("active");
			return false;
		});
		
		/*-----------------------------------------------------------------------------------*/
		/*  Detect Mobile Browser
		/*-----------------------------------------------------------------------------------*/ 
		if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		} else {
		
			/*-----------------------------------------------------------------------------------*/
			/*  Scroll To Top
			/*-----------------------------------------------------------------------------------*/ 
				$("#toTop").scrollToTop();
				
			/*-----------------------------------------------------------------------------------*/
			/*  Sticky Sidebar
			/*-----------------------------------------------------------------------------------*/ 
				$('.site-header, .site-content').theiaStickySidebar({
				  additionalMarginTop: 48
				});
			
		} // End detect mobile browser
	
	});
	
})(jQuery);