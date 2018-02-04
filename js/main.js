jQuery(document).ready(function($) {
	$(".home_feature_post_wrap").lightSlider({
	    item:4,
        loop:true,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        responsive : [
        {
                breakpoint:1025,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:769,
                settings: {
                    item:2,
                    slideMove:1,
                    slideMargin:6,
                  }
            },



            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove:1
                  }
            }
        ]
	});

    $(function(){
         var shrinkHeader = 300;
          $(window).scroll(function() {
            var scroll = getCurrentScroll();
              if ( scroll >= shrinkHeader ) {
                   $('.headermain').addClass('shrink');
                }
                else {
                    $('.headermain').removeClass('shrink');
                }
          });
        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
            }
        });

    $('.menu-toggle').click(function(){
        $('body').toggleClass('wdnoscroll');
    });



    $('.fa-chevron-circle-down').click(function() {
        $('html, body').animate({
            scrollTop: $("#bcorporate_home_about_wrap").offset().top-150
        }, 500);
    });

    $('.bcorp_section li').click(function(){
        var swap_class = $(this).attr('class');
        var act_swap_class = swap_class.split(' ');
        $('html, body').animate({
            scrollTop: $('#'+act_swap_class[0]
                +'').offset().top-100
        }, 500);
        return false;
    });


    AOS.init({
      disable: 'mobile'
    });
    
});