/*    ==================================
 *           js content
 *    ==================================
 *
 *   1. PRELOADER
 *   2. scroll to top
 *   3. scroll-to-section
 *   4. top-mobile carousel
 *   5. number counter
 *   6. testimonial slider
 *   7. swiper slider
 *   8. wow js
 *   9. Accordion js
 *	================================== */


(function ($) {
	"use strict";
    
	/*=======================================
			PRELOADER
		======================================= */
    var main_window = $(window);
    
        main_window.on('load',function(){
			$('#preloader').fadeOut('slow');
		});
        /*====================================
            scroll to top
        ======================================*/
        main_window.on('scroll', function () {
            if ($(this).scrollTop() > 250) {
                $('.scrollBtn').fadeIn(200);
            } else {
                $('.scrollBtn').fadeOut(200);
            }
        });
        $(".scrollBtn").on('click', function () {
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
            return false;
        });


	   /*=======================================
		scroll-to-section
		======================================= */
        $('a.appin-scroll').on('click', function () {
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 800);
            return false;
        });

       /*=======================================
		mobile carousel
		======================================= */
		$(window).load(function(){
        if ($(".mobile").length > 0) {
            $(".mobile").owlCarousel({
				margin: 0,
				autoplayHoverPause:true,
                loop: true,
                autoplay:2000,
				nav: true,
				smartSpeed:600,
                items: 1,
                navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
            });
	}
});
	/*=======================================
    swiper slider
    ======================================= */
     $(window).load(function(){
    if ($(".appin-screenshot").length > 0) {
        var swiper = new Swiper('.appin-screenshot', {
            pagination: false,
            effect: 'coverflow',
            loop: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            autoplay: 2000,
            nextButton: '.next',
            prevButton: '.prev',
            autoplayDisableOnInteraction: true,
            coverflow: {
                rotate: 15,
                stretch: 70,
                modifier: 0.9,
                slideShadows: false
            }
        });

        $(".appin-screenshot").hover(function () {
            swiper.stopAutoplay();
        }, function () {
            swiper.startAutoplay();
        });
    }
  });   
    
	/*=======================================
	testimonial slider
	======================================= */
	 $(window).load(function(){
	var testi_slider=$("#testi");
	if (testi_slider) {
		testi_slider.owlCarousel({
			items: 2,
			autoplayHoverPause:true,
			loop: true,
			dots:false,
			nav: true,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			autoplay: true,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
				},
				1000: {
					items: 2,
				}
			}
		});
	}
});


$(document).ready(function() {
      $(".navigation").accessibleDropDown();
  });

  $.fn.accessibleDropDown = function () {
      var el = $(this);

      /* Make dropdown menus keyboard accessible */

      $("a", el).focus(function() {
          $(this).parents("li").addClass("force-show");
      }).blur(function() {
          $(this).parents("li").removeClass("force-show");
      });
  }


$(window).load(function(){
   var logo_path = jQuery('.navbar-logo').html();
  $('#menu').slicknav({
      appendTo:'header',
      removeClasses:true,
      brand: logo_path
  });
  });

	 
	/*=======================================
	 mouse move animation
	======================================= */

    var lFollowX = 0,
	lFollowY = 0,
	x = 0,
	y = 0,
	friction = 1 / 30;

	function moveBackground() {
	x += (lFollowX - x) * friction;
	y += (lFollowY - y) * friction;
	
	var translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.1)';

	$('.move').css({
		'-webit-transform': translate,
		'-moz-transform': translate,
		'transform': translate
	});

	window.requestAnimationFrame(moveBackground);
	}

    $(".how , .stores").on('mousemove click', function(e) {

        var lMouseX = Math.max(-100, Math.min(100, main_window.width() / 2 - e.clientX));
        var lMouseY = Math.max(-100, Math.min(100, main_window.height() / 2 - e.clientY));
	lFollowX = (30 * lMouseY) / 100; // 100 : 12 = lMouxeX : lFollow
	lFollowY = (20 * lMouseX) / 100;

	});

moveBackground();
	
})(jQuery);


function initMap() {
	var map = new google.maps.Map(document.getElementById("map"), {
		zoom: 7,
		center: {
			lat: 25.10,
			lng: 75.432617
		}
    });
    var markerposition = { lat: 24.10, lng: 80.044 };
	var goldStar = '';
	var marker = new google.maps.Marker({
        position: markerposition,
		icon: goldStar,
		map: map
	});
}