(function(jQuery) {
'use strict';
jQuery(document).ready(function($) {
	
  // Caching Selectors
  var $body = $('body');
  var $window = $(window);
  var $document = $(document);
  var $navBar = $('#navbar');
  var $asideNav = $('#aside-nav');
  var $homeSlider = $('#home-slider');
  var $searchModal = $('#search-modal');
  var $worksGrid = $('#works-grid');
  var $firstSection = $('section:first');
  
  if( $('.owlGallery').length ){
		$(".owlGallery").owlCarousel({
			
			stagePadding: 0,
			loop: true,
			autoplay: true,
			autoplayTimeout: 2000,
			margin: 10,
			nav: false,
			dots: false,
			smartSpeed: 1000,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				1000: {
					items: 1
				}
			}
		});
	}
	
	
   $('.menu-toggle, .toggle-nav').on('click', function(event) {
      event.preventDefault();
      if ($window.width() < 992) {
        $(this).find('.hamburger').toggleClass('is-active');

        $('#navigation').slideToggle(400);
        $navBar.find('.cart-open').removeClass('opened');
      }
    });
	
	$('#navigation .navigation-menu a[data-scroll="true"]').on('click', function() {
      if ($window.width() < 992) {
        $('.menu-toggle').trigger('click');
      }
    });
	
	$window
	.on('resize', function() {
		$('.footer-spacer').css('height', $('#footer').height());
	})
	.trigger('resize');
	 $($navBar).find('li.menu-item-has-children').append('<i class="fa fa-angle-down toggle-sub-menu" aria-hidden="true"></i>');
	 $.merge($navBar, $asideNav).on('click', '.navigation-menu li.menu-item-has-children .toggle-sub-menu', function(e) {
      if ($window.width() < 992) {
        e.preventDefault();
		$(this).toggleClass('fa-angle-down').toggleClass('fa-angle-up');
        $(this).parent('li').toggleClass('opened').find('.sub-menu:first').slideToggle();
      }
    });
	
	$navBar.find('.navigation-menu>li').slice(-2).addClass('last-elements');
	$window.on('scroll', function() {
       
		  if ($window.width() > 991) {
			if ($window.scrollTop() >= 150) {
			  $navBar.addClass('stick');
			} else {
			  $navBar.removeClass('stick');
			}
	
			if ($firstSection.hasClass('section-bordered')) {
			  if ($window.scrollTop() <= 20) {
				$body.addClass('top-spacing');
			  } else {
				$body.removeClass('top-spacing');
			  }
			}
		  }
		  
      }).trigger('scroll');
	  
	  function initParallax() {
		$('.parallax-bg img').each(function(index, el) {
		  var container = $(this).parent('.parallax-bg');
		  var image = $(this).attr('src');
	
		  $(container).css('background-image', 'url(' + image + ')');
	
		  $(this).remove();
		});
	
		$('.parallax-wrapper').each(function(index, el) {
		  var elOffset = $(el).parent().offset().top;
		  var winTop = $window.scrollTop();
		  var scrll = (winTop - elOffset) * 0.15;
	
		  if ($(el).isOnScreen()) {
			$(el).css('transform', 'translate3d(0, ' + scrll + 'px, 0)');
		  }
		});
	  }
	  initParallax();
	  
	  
});
})(jQuery);