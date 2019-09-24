(function($) {
    "use strict";
    jQuery(document).ready(function() {
			//Submenu Dropdown Toggle
		    if($('.main-menu  li.menu-item-has-children ul').length){
		        $('.main-menu  li.menu-item-has-children').append('<div class="dropdown-btn"><Span class="fa fa-angle-down"></span></div>');
		        //Dropdown Button
		        $('.main-menu li.menu-item-has-children .dropdown-btn').on('click', function() {
		            $(this).prev('ul').slideToggle(500);
		        });
		        //Disable dropdown parent link
		        $('.navigation  li.menu-item-has-children > a').on('click', function(e) {
		            e.preventDefault();
		        });
	    	}

    	  $(".menu-tigger").on("click", function() {
		    $(".offcanvas-menu,.offcanvas-overly").addClass("active");
		    return false;
		  });
		  $(".menu-close,.offcanvas-overly").on("click", function() {
		    $(".offcanvas-menu,.offcanvas-overly").removeClass("active");
		  });

		  // slider
  function mainSlider() {
    var BasicSlider = $(
      ".slider-active,.slider-two-active,.slider-four-active"
    );
    BasicSlider.on("init", function(e, slick) {
      var $firstAnimatingElements = $(".single-slider:first-child").find(
        "[data-animation]"
      );
      doAnimations($firstAnimatingElements);
    });
    BasicSlider.on("beforeChange", function(e, slick, currentSlide, nextSlide) {
      var $animatingElements = $(
        '.single-slider[data-slick-index="' + nextSlide + '"]'
      ).find("[data-animation]");
      doAnimations($animatingElements);
    });
    BasicSlider.slick({
      autoplay: false,
      autoplaySpeed: 5000,
      dots: true,
      fade: true,
      prevArrow:
        '<button type="button" class="slick-prev"><span class="fa fa-angle-left"></span></button>',
      nextArrow:
        '<button type="button" class="slick-next"><span class="fa fa-angle-right"></span></button>',
      arrows: true,
      dots: true,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            dots: false,
            arrows: false
          }
        },
        {
          breakpoint: 992,
          settings: {
            arrows: false
          }
        }
      ]
    });

    function doAnimations(elements) {
      var animationEndEvents =
        "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
      elements.each(function() {
        var $this = $(this);
        var $animationDelay = $this.data("delay");
        var $animationType = "animated " + $this.data("animation");
        $this.css({
          "animation-delay": $animationDelay,
          "-webkit-animation-delay": $animationDelay
        });
        $this.addClass($animationType).one(animationEndEvents, function() {
          $this.removeClass($animationType);
        });
      });
    }
  }
  mainSlider();

	    	
    	    //Click event to scroll to top
    		//Check to see if the window is top if not then display button

			jQuery(window).scroll(function($){
				if (jQuery(this).scrollTop() > 100) {
					jQuery('.scrolltop').addClass('activetop');
					jQuery('.scrolltop').fadeIn();
				} else {
					jQuery('.scrolltop').fadeOut();
				}
			});
		
			//Click event to scroll to top
      $(window).load(function(){
			jQuery('.scrolltop').click(function($){
				jQuery('html, body').animate({scrollTop : 0},800);
				return false;
			});
  });
			//fancybox
			jQuery('.fancybox').fancybox();			    
    });

  
  $(document).ready(function() {
       $(".navbar-nav").accessibleDropDown();
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

})(jQuery);