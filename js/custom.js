(function($) {
 "use strict"
	$("body").fitVids();
// OWL Carousel

	$("#owl-testimonial-widget, #owl-blog").owlCarousel({
		items : 1,
		lazyLoad : true,
		navigation : true,
		pagination : false,
		autoPlay: false
    });
	
	$("#owl_blog_three_line, #owl_portfolio_two_line, #owl_blog_two_line").owlCarousel({
		items : 2,
		lazyLoad : true,
		navigation : true,
		pagination : false,
		autoPlay: true
    });

	$("#owl_shop_carousel, #owl_shop_carousel_1").owlCarousel({
		items : 3,
		lazyLoad : true,
		navigation : true,
		pagination : false,
		autoPlay: true
    });
	
	$("#services").owlCarousel({
		items : 3,
		lazyLoad : true,
		navigation : false,
		pagination : true,
		autoPlay: true
    });
	

	$('.buddy_tooltip').popover({
		container: '.buddy_carousel, .buddy_members'
	});
		
// Parallax
	$(window).bind('body', function() {
		parallaxInit();
	});
	function parallaxInit() {
		$('#one-parallax').parallax("30%", 0.1);
		$('#two-parallax').parallax("30%", 0.1);
		$('#three-parallax').parallax("30%", 0.1);
		$('#four-parallax').parallax("30%", 0.4);
		$('#five-parallax').parallax("30%", 0.4);
		$('#six-parallax').parallax("30%", 0.4);
		$('#seven-parallax').parallax("30%", 0.4);
	}
	
// WOW
	new WOW(
		{ offset: 300 }
	).init();
		
// DM Top
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 1) {
			jQuery('.dmtop').css({bottom:"25px"});
		} else {
			jQuery('.dmtop').css({bottom:"-100px"});
		}
	});
	jQuery('.dmtop').click(function(){
		jQuery('html, body').animate({scrollTop: '0px'}, 800);
		return false;
	});
	
// Rotate Text
	$(".rotate").textrotator({
		animation: "flipUp",
		speed: 2300
	});


	
// TOOLTIP
    $('.social-icons, .bs-example-tooltips').tooltip({
      selector: "[data-toggle=tooltip]",
      container: "body"
    })
	
// Accordion Toggle Items
   var iconOpen = 'fa fa-minus',
        iconClose = 'fa fa-plus';

    $(document).on('show.bs.collapse hide.bs.collapse', '.accordion', function (e) {
        var $target = $(e.target)
          $target.siblings('.accordion-heading')
          .find('em').toggleClass(iconOpen + ' ' + iconClose);
          if(e.type == 'show')
              $target.prev('.accordion-heading').find('.accordion-toggle').addClass('active');
          if(e.type == 'hide')
              $(this).find('.accordion-toggle').not($target).removeClass('active');
    });
// tp-banner
var revapi;
revapi = jQuery('.tp-banner').revolution(
{
	delay:9000,
	startwidth:1170,
	startheight:500,
	hideThumbs:10,
	fullWidth:"on",
	forceFullWidth:"on"
});
// 
var rsi = $('#slider-in-laptop').royalSlider({
	autoHeight: false,
	arrowsNav: false,
	fadeinLoadedSlide: false,
	controlNavigationSpacing: 0,
	controlNavigation: 'bullets',
	imageScaleMode: 'fill',
	imageAlignCenter: true,
	loop: false,
	loopRewind: false,
	numImagesToPreload: 6,
	keyboardNavEnabled: true,
	autoScaleSlider: true,  
	autoScaleSliderWidth: 486,     
	autoScaleSliderHeight: 315,
	/* size of all images */
	imgWidth: 792,
	imgHeight: 479

  }).data('royalSlider');
  $('#slider-next').click(function() {
	rsi.next();
  });
  $('#slider-prev').click(function() {
	rsi.prev();
  });
	// Pretty Photo for blog
	$('a[data-gal]').each(function() {
		$(this).attr('rel', $(this).data('gal'));
	});  	
	$("a[data-gal^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow:false,overlay_gallery: false,theme:'light_square',social_tools:false,deeplinking:false});
    // Post Slider
	$('.flexslider').flexslider({
		animation: "fade",
		controlNav: false,
		start: function(slider){
		  $('body').removeClass('loading');
		}
	});
})(jQuery);