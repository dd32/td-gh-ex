var distance = jQuery('#stickyMenu').offset().top; 

    jQuery(window).scroll(function () {

         if (jQuery(window).scrollTop() >= distance) {
             jQuery('#stickyMenu').addClass("fixed-top");
         } else {
             jQuery('#stickyMenu').removeClass("fixed-top");
         }
     });