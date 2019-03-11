(function($) {
	'use strict';
	$(document).ready(function() {
		/*-----------------------------------------------------------------------------------*/
		/*  Page Loader
		/*-----------------------------------------------------------------------------------*/ 
			if ( $( '.ansiaLoader' ).length ) {
				$('.ansiaLoader').delay(600).fadeOut(1000);
			}
		/*-----------------------------------------------------------------------------------*/
		/*  Detect Mobile Browser
		/*-----------------------------------------------------------------------------------*/
			var mobileDetect = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
		/*-----------------------------------------------------------------------------------*/
		/*  Home icon in main menu
		/*-----------------------------------------------------------------------------------*/ 
			$('.main-navigation .menu-item-home:first-child > a').prepend('<i class="fa fa-home spaceRight"></i>');
		/*-----------------------------------------------------------------------------------*/
		/*  Set nanoscroller
		/*-----------------------------------------------------------------------------------*/ 
			function setNano() {
				if ( $( '#tertiary.widget-area' ).length ) {
					$('.nano').nanoScroller({ preventPageScrolling: true });
				}
			}
			setNano();
		/*-----------------------------------------------------------------------------------*/
		/*  Sidebar Push Button
		/*-----------------------------------------------------------------------------------*/ 
			$('.hamburger, .opacityBox').click(function(){
				$('body, .ansia-sidebar-button, .ansia-bar, .ansia-subbar').toggleClass('yesOpen');
				$('.hamburger--spin').toggleClass('is-active');
				if (mobileDetect) {
					$('.opacityBox').toggleClass('yesOpen');
				}
			});
		/*-----------------------------------------------------------------------------------*/
		/*  Search Button
		/*-----------------------------------------------------------------------------------*/ 
			$('.ansia-search-button .asbutton').click(function(){
				if ($('.ansia-search-button').hasClass('searchOpen')) {
					$('.ansia-search-button, .ansia-subbar').removeClass('searchOpen');
				} else {
					$('.ansia-search-button, .ansia-subbar').addClass('searchOpen');
					if (!mobileDetect) {
						$('.ansia-search-button .search-container .search-field').focus();
					}
				}
			});
		/*-----------------------------------------------------------------------------------*/
		/*  Menu Widget
		/*-----------------------------------------------------------------------------------*/
			if ( $( 'aside ul.menu, aside ul.product-categories' ).length ) {
				$('aside ul.menu, aside ul.product-categories').find('li').each(function(){
					if($(this).children('ul').length > 0){
						$(this).append('<span class="indicatorBar"></span>');
					}
				});
				$('aside ul.menu > li.menu-item-has-children .indicatorBar, .aside ul.menu > li.page_item_has_children .indicatorBar, aside ul.product-categories > li.cat-parent .indicatorBar').click(function() {
					$(this).parent().find('> ul.sub-menu, > ul.children').toggleClass('yesOpenBar');
					$(this).toggleClass('yesOpenBar');
					var $self = $(this).parent();
					if($self.find('> ul.sub-menu, > ul.children').hasClass('yesOpenBar')) {
						$self.find('> ul.sub-menu, > ul.children').slideDown(300);
					} else {
						$self.find('> ul.sub-menu, > ul.children').slideUp(200);
					}
				});
			}
		/*-----------------------------------------------------------------------------------*/
		/*  Mobile Menu
		/*-----------------------------------------------------------------------------------*/ 
			if ($( window ).width() <= 1025) {
				$('.main-navigation').find('li').each(function(){
					if($(this).children('ul').length > 0){
						$(this).append('<span class="indicator"></span>');
					}
				});
				$('.main-navigation ul > li.menu-item-has-children .indicator, .main-navigation ul > li.page_item_has_children .indicator').click(function() {
					$(this).parent().find('> ul.sub-menu, > ul.children').toggleClass('yesOpen');
					$(this).toggleClass('yesOpen');
					var $self = $(this).parent();
					if($self.find('> ul.sub-menu, > ul.children').hasClass('yesOpen')) {
						$self.find('> ul.sub-menu, > ul.children').slideDown(300);
					} else {
						$self.find('> ul.sub-menu, > ul.children').slideUp(200);
					}
				});
			}
			$(window).resize(function() {
				if ($( window ).width() > 1025) {
					$('.main-navigation ul > li.menu-item-has-children, .main-navigation ul > li.page_item_has_children').find('> ul.sub-menu, > ul.children').slideDown(300);
				}
			});
		/*-----------------------------------------------------------------------------------*/
		/*  Scroll To Top
		/*-----------------------------------------------------------------------------------*/ 
			if (!mobileDetect || $('#toTop').hasClass('scrolltop_on') ) {
				$(window).scroll(function(){
					if ($(this).scrollTop() > 700) {
						$('#toTop').addClass('visible');
					} 
					else {
						$('#toTop').removeClass('visible');
					}
				}); 
				$('#toTop').click(function(){
					$('html, body').animate({ scrollTop: 0 }, 1000);
					return false;
				});
			}
		/*-----------------------------------------------------------------------------------*/
		/*  Detect Mobile Browser
		/*-----------------------------------------------------------------------------------*/ 
			if (!mobileDetect) {
				/*-----------------------------------------------------------------------------------*/
				/*  Effect for site branding
				/*-----------------------------------------------------------------------------------*/ 
				$( '.ansiaLogo' ).data( 'height', $( '.ansiaLogo' ).outerHeight() );
				$( window ).scroll( function() {
					var position = window.scrollY,
						bottom   = window.innerHeight - document.getElementById( 'colophon' ).offsetHeight,
						height   = $( '.ansiaLogo' ).data( 'height' ),
						content  = $( '#content' ).offset().top,
						footer   = $( '#colophon' ).offset().top - position;

					if ( position > 0 && content > position && footer > bottom ) {
						if ( position < height ) {
							$('.ansiaLogo').css({
								'opacity' : ( 1 - position / height / 1.5  )
							});
						}
					} else if ( position <= 0 ) {
						$('.ansiaLogo').css({
							'opacity' : 1
						});
					}
				});
			}
	});
})(jQuery);