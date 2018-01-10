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

// Main slider
  $('.slick-slider').slick({
    slidesToShow: 1,
    cssEase: 'linear',
    pauseOnHover: false,
    autoplaySpeed: 4000,
    adaptiveHeight: true,
    autoplay: true,
    speed: 400,
    prevArrow: '<div  class="bestblog-slider-nav bestblog-slider-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
    nextArrow: '<div  class="bestblog-slider-nav bestblog-slider-next "><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
  });
});
/* --------------------------------------------
JS END
-------------------------------------------- */
