
	
	
	(function ($) {
		
			"use strict";
			
			
			$('[data-toggle="collapse"]').on('click',function () {
				if($(this).is("span"))
					$(this).toggleClass('has-sub');
			});
			
			//after window loaded - disable loader
			$(window).on('load',function() {
				$('body').addClass('loaded');
			});
			
			if ($(window).width() > 767){
			
				var containerWidth = $('.container').width();
				
				//hidden sidebar show
				$('.hidden-sidebar-icon').on('click',function () {
						
					//set container margin for more smooth animation
					var containerMarginCalc = ($( window ).width() - $('.container').width()) /2;
					$('.container').css('margin-right', containerMarginCalc + 'px');
					
					if($('.hidden-sidebar').css('display') == 'none'){
							
						//set hidden bar position if is opened from secondary navigation
						var bottomSidebarPosition = $(window).height() - $('.hidden-sidebar').outerHeight(true);
						if ( bottomSidebarPosition <0){
							bottomSidebarPosition = $('.hidden-sidebar').outerHeight(true) - $(window).height();
						}
							
						if ( $(window).scrollTop() > bottomSidebarPosition ) {
							$('.hidden-sidebar').css({'position':'fixed','top':'auto','bottom':'0'});
						}	
						else {	
							$('.hidden-sidebar').css({'position':'absolute','top':'0', 'bottom':'auto'});
						}
							
						//animate display hidden sidebar 
						$('.hidden-sidebar').show();
						$('.container').delay(150).animate({
										marginRight:'30%',
										width:'70%'},700,"linear");
						$('#primaryNav').animate({
										marginRight:'30%'
										},700,"linear");
						
						$(this).toggleClass('fa-bars').fadeOut(100);
						$(this).addClass('fa-close').fadeIn(100);
										
					}	
					else { //animate hide hidden sidebar
						$('.hidden-sidebar').fadeOut(200);
						$('.container').animate({
											width:containerWidth+'px',
											marginRight: ($( window ).width() - containerWidth )/2 + 'px'
											},500,"linear");
						$('#primaryNav').animate({
											marginRight:'0%'
											},700,"linear");

						$(this).removeClass('fa-close').fadeOut(100);
						$(this).toggleClass('fa-bars').fadeIn(100);											
					}
				});	
				
				//hide hidden sidebar
				$('#sidebar-close').on('click',function () {
					$('.hidden-sidebar').fadeOut(200);
					$('.container').animate({
										width:containerWidth+'px',
										marginRight: ($( window ).width() - containerWidth )/2 + 'px'},500,"linear");
					$('#primaryNav').animate({
											marginRight:'0%'
											},700,"linear");

					$('.hidden-sidebar-icon').removeClass('fa-close').fadeOut(100);
					$('.hidden-sidebar-icon').toggleClass('fa-bars').fadeIn(100);											
					
				});
					
				//hidden sidebar window fill	
				$(window).on('scroll', function() {
					
					//scroll to top
					if ($(this).scrollTop() >= 500) {
						$('.scroll-to-top').fadeIn(200);    
					}	
					else {
						$('.scroll-to-top').fadeOut(200);   
					}	
					
					if($('.hidden-sidebar').css('display') != 'none')
					{
						var bottomSidebarPosition = $(window).height() - $('.hidden-sidebar').outerHeight(true);
						if ( bottomSidebarPosition <0){
							bottomSidebarPosition = $('.hidden-sidebar').outerHeight(true) - $(window).height();
						}
							
						if ( $(window).scrollTop() > bottomSidebarPosition ) {
							$('.hidden-sidebar').css({'position':'fixed','top':'auto','bottom':'0'});
						}	
						else {	
							$('.hidden-sidebar').css({'position':'absolute','top':'0', 'bottom':'auto'});
						}	
					}
				});	
				
				if ($(window).width() > 991 ){
					
					$(window).scroll(function() {
						
						//sticky menu 
						if ($(this).scrollTop() >= 300){         
							$('#sticky-menu').show();   
						}	
						else {
							$('#sticky-menu').fadeOut(200);   
						}	
						
					});
				
				}
			}
			else
			{
				$('.navbar-toggle').on('click',function() {
				
					if($('.menu-toggle').hasClass('fa-bars')){
						$('.menu-toggle').toggleClass('fa-bars').delay(100).addClass('fa-close').fadeIn(200);
					}
					else{	
						$('.menu-toggle').removeClass('fa-close');
						$('.menu-toggle').toggleClass('fa-bars').delay(100).fadeIn(200);	
					}
				});				
			}		

			//show search form
			$('.hidden-search-icon').on('click',function () {
				
				if($('.search-form-container').css('display') == 'none'){
					$('.search-form-container').show();
				}	
				else {
					$('.search-form-container').fadeOut(200);   
				}	
			});
			
			//scroll to top click
			$('#return-to-top').on('click',function() { //link-icon click      
				$('body,html').animate({scrollTop : 0 }, 500);
			});
			
			$('.scroll-to-top').on('click',function() { //div container click      
				$('body,html').animate({scrollTop : 0 }, 500);
			});
			
	
	
	})(jQuery);	