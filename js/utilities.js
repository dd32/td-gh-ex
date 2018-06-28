(function($) {

	"use strict";

	$( document ).ready(function() {

		if ($('#wpadminbar').length > 0) {
		
			$('#header-main-fixed').css('top', $('#wpadminbar').height() + 'px');
			$('#wpadminbar').css('position', 'fixed');
		}

		$(window).scroll(function () {

			if ($(this).scrollTop() > 100) {

				$('.scrollup').fadeIn();

			} else {

				$('.scrollup').fadeOut();

			}
		});

		$('.scrollup').click(function () {
			
			$("html, body").animate({
				  scrollTop: 0
			  }, 600);

			return false;
		});

		ayawild_mainMenuInit();

		$("#slider").slippry({});

		$('#navmain > div').on('click', function(e) {

			e.stopPropagation();

			// toggle main menu
			if ( $(window).width() < 800 ) {

				var parentOffset = $(this).parent().offset(); 
				
				var relY = e.pageY - parentOffset.top;
			
				if (relY < 36) {
				
					$('ul:first-child', this).toggle(400);
				}
			}
		});

		// re-init main menu on screen resize
		$(window).resize(function () {
	       
	    	ayawild_mainMenuClear();
	    	ayawild_mainMenuInit();
		});
	});

	function ayawild_mainMenuClear() {

		if ( $(window).width() >= 800 ) {
		
			$('#navmain > div > ul > li:has("ul")').removeClass('level-one-sub-menu');
			$('#navmain > div > ul li ul li:has("ul")').removeClass('level-two-sub-menu');										
		}

		if ( $('ul:first-child', $('#navmain > div') ).is( ":visible" ) ) {

			$('ul:first-child', $('#navmain > div') ).css('display', '');
		}
	}

	function ayawild_mainMenuInit() {

		if ( $(window).width() >= 800 ) {
		
			$('#navmain > div > ul > li:has("ul")').addClass('level-one-sub-menu');
			$('#navmain > div > ul li ul li:has("ul")').addClass('level-two-sub-menu');										
		}
	}

	$(window).scroll(function() {
		if ($(this).scrollTop() > 1){  
			$('#header-main-fixed-container').addClass("header-sticky");
		}
		else{
			$('#header-main-fixed-container').removeClass("header-sticky");
		}
	});

	function ayawild_setCurrentSlide(slideIndex) {

	    var headerMain = $('#header-main-fixed');
	    var sliderImageContainer = $('#slider-image-container');

	    var slides = headerMain.data('slides');

	    if (!slides || slideIndex >= $(slides).length) {

	        return;
	    }

	    var slide = slides[slideIndex];
	    var slideImage = 'url("' + slide['slideImage'] + '")';

	    if ( slideImage != sliderImageContainer.css('background-image') ) {

	        headerMain.css("background-color", '#555555');
	        sliderImageContainer.animate({opacity: 0.6}, 400, function() {
	                        $(this)
	                            .css("background-image", slideImage)
	                            .animate({opacity: 1}, 400);
	                    });
	    }

	    $(".slider-dots > span").removeClass("slider-current-dot");

	    $(".slider-dots > span:nth-child(" + (slideIndex + 1) + ")").addClass("slider-current-dot");

	    headerMain.data('currentslide', slideIndex);
	}

	$( document ).ready(function() {

	    ayawild_setCurrentSlide(0);

	    window.sliderPrevNextClicked = false;

	    $('.slider-prev').click(function() {

	        var currentIndex = $('#header-main-fixed').data('currentslide');

	        window.sliderPrevNextClicked = true;

	        if (currentIndex > 0) {

	            --currentIndex;
	            ayawild_setCurrentSlide(currentIndex);

	        } else {

	            currentIndex = $('#header-main-fixed').data('slides').length - 1;

	            ayawild_setCurrentSlide(currentIndex);          
	        }
	    });

	    $('.slider-next').click(function() {

	        window.sliderPrevNextClicked = true;
	      
	        var currentIndex = $('#header-main-fixed').data('currentslide');

	        if (currentIndex < $('#header-main-fixed').data('slides').length - 1) {

	            ++currentIndex;
	            ayawild_setCurrentSlide(currentIndex);

	        } else {

	            ayawild_setCurrentSlide(0);          
	        }
	    });

	    $('.slider-dots > span').click(function() {

	        window.sliderPrevNextClicked = true;

	        var slideNum = $(this).data('slidenum');

	        ayawild_setCurrentSlide(slideNum);
	    });

	    window.setInterval(function(){

	      if (window.sliderPrevNextClicked) {

	        window.sliderPrevNextClicked = false;
	        return;
	      }
		
			  if ( !$(window).scrollTop() ) {

				  $('.slider-next').click();
			  
		      }
	    }, 5000);

	    $(document).keydown(function(e) {
	        switch(e.which) {
	            case 37: // left
	            window.sliderPrevNextClicked = true;
	            $('.slider-prev').click();
	            break;

	            case 39: // right
	            window.sliderPrevNextClicked = true;
	            $('.slider-next').click();
	            break;

	            default: return;
	        }
	        e.preventDefault();
	    });
	});

})(jQuery);