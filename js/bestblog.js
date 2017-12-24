(function($) {
    'use strict';

    function PagePreloader() {
      jQuery('body').removeClass('no-js');
    }
    jQuery(window).load(function($) {
      PagePreloader();
    });
  }

)(window.jQuery);
/* --------------------------------------------
JS Start
-------------------------------------------- */

jQuery(document).ready(function($) {
  /* call foundation */
  $(document).foundation();



  $('.sticky').addClass('fixed');

  /* search */
  $('.navbar-search-bar-container .search-submit').after('<i class=" fa fa-search" aria-hidden="true"></i>')
  // scrollup
  jQuery(window).bind("scroll", function() {
    if (jQuery(this).scrollTop() > 800) {
      jQuery(".scroll_to_top").fadeIn('slow');
    } else {
      jQuery(".scroll_to_top").fadeOut('fast');
    }
  });
  jQuery(".scroll_to_top").click(function() {
    jQuery("html, body").animate({
      scrollTop: 0
    }, "slow");
    return false;
  });

  $('.slick-slider').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow:1,
    fade: true,
    cssEase: 'linear',
    prevArrow: '<div  class="bestblog-slider-nav bestblog-slider-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
	nextArrow: '<div  class="bestblog-slider-nav bestblog-slider-next "><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
  });
});
/* --------------------------------------------
JS END
-------------------------------------------- */
