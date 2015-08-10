/*!
 Sticky Header
*/
jQuery(window).scroll(function($) {
	if (jQuery(this).scrollTop() > 1){  
		jQuery('.sticky-header').addClass("sticky-header-shrink");
	}
	else{
		jQuery('.sticky-header').removeClass("sticky-header-shrink");
	}
});

/*!
 Mobile Navigation && Sticky Header
*/
jQuery(document).ready(function($) {
	$('.mobile-nav-icons .fa-bars').click(function() {
		$('.mobile-nav-menu').slideToggle();
	});
});

/*!
 SuperFish
*/
jQuery(document).ready(function(){
	jQuery('.sticky-nav').superfish();
	jQuery('.top-nav-menu').superfish();
	jQuery('.nav-menu').superfish();
});

/*! 
 Call tooltips & Tabs
*/
jQuery(function ($) {
  $('[data-toggle="tooltip"]').tooltip();
  
  $('#tabs a:first').tab('show'); // Show first tab by default
  
  $('#tabs a').click(function (e) {
		e.preventDefault()
		$(this).tab('show');
  })
});

/*!
 Call Portfolio lightGallery
*/
jQuery(document).ready(function($) {
	$(".vision-portfolio").lightGallery({
		selector: '.portfolio-item',
		cssEasing: 'cubic-bezier(0.680, -0.550, 0.265, 1.550)',
		speed: 1500
	});
	jQuery("#toTop").scrollToTop(1000);
});

/*!
    jQuery scrollToTop v1.0 - 2013-03-15
    (c) 2013 Yang Zhao - geniuscarrier.com
    license: http://www.opensource.org/licenses/mit-license.php
*/
(function($) {
    $.fn.scrollToTop = function(options) {
        var config = {
            "speed" : 800
        };

        if (options) {
            $.extend(config, {
                "speed" : options
            });
        }

        return this.each(function() {

            var $this = $(this);

            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $this.fadeIn();
                } else {
                    $this.fadeOut();
                }
            });

            $this.click(function(e) {
                e.preventDefault();
                $("body, html").animate({
                    scrollTop : 0
                }, config.speed);
            });

        });
    };
})(jQuery);

/*!
 Call Back to Top
*/
jQuery(document).ready(function($) {
	$("#toTop").scrollToTop(1000);
});