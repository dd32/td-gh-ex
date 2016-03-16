$(document).ready(function() {
        $("#slider").lightSlider({
        	item: 1,
                autoWidth: false,
                slideMove: 1, // slidemove will be 1 if loop is true
                slideMargin: 0,
         
                addClass: '',
                mode: "slide", //fade, slide//
                useCSS: true,
                cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
                easing: 'linear', //'for jquery animation',////
         
                speed: 600, //ms'
                auto: true,
                loop: true,
                slideEndAnimation: true,
                pause: 6000,
         
                keyPress: false,
                controls: false,
                prevHtml: '',
                nextHtml: '',
         
                rtl:false,
                adaptiveHeight:false,
         
                vertical:false,
                verticalHeight:500,
                vThumbWidth:100,
         
                thumbItem:10,
                pager: true,
                gallery: false,
                galleryMargin: 5,
                thumbMargin: 5,
                currentPagerPosition: 'middle',
         
                enableTouch:true,
                enableDrag:false,
                freeMove:true,
                swipeThreshold: 40,
         
                responsive : [
                    {
                        breakpoint:767,
                        settings: {
                            adaptiveHeight:true,
                            auto: true,
                        }
                    }
                ],
         
                onBeforeStart: function (el) {},
                onSliderLoad: function (el) {},
                onBeforeSlide: function (el) {},
                onAfterSlide: function (el) {},
                onBeforeNextSlide: function (el) {},
                onBeforePrevSlide: function (el) {}
	});


        $(".featured-slider").lightSlider({
                item: 4,
                autoWidth: false,
                slideMove: 1, // slidemove will be 1 if loop is true
                slideMargin: 0,
         
                addClass: '',
                mode: "slide", //fade, slide//
                useCSS: true,
                cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
                easing: 'linear', //'for jquery animation',////
         
                speed: 600, //ms'
                auto: false,
                loop: false,
                slideEndAnimation: true,
                pause: 6000,
         
                keyPress: false,
                controls: true,
                prevHtml: '',
                nextHtml: '',
         
                rtl:false,
                adaptiveHeight:false,
         
                vertical:false,
                verticalHeight:500,
                vThumbWidth:100,
         
                thumbItem:10,
                pager: false,
                gallery: false,
                galleryMargin: 5,
                thumbMargin: 5,
                currentPagerPosition: 'middle',
         
                enableTouch:true,
                enableDrag:false,
                freeMove:true,
                swipeThreshold: 40,
         
                responsive : [
                    {
                        breakpoint:991,
                        settings: {
                            item:3,
                            adaptiveHeight:true,
                        }
                    },
                    {
                        breakpoint:767,
                        settings: {
                            item:1,
                            adaptiveHeight:true,
                        }
                    }
                ],
         
                onBeforeStart: function (el) {},
                onSliderLoad: function (el) {},
                onBeforeSlide: function (el) {},
                onAfterSlide: function (el) {},
                onBeforeNextSlide: function (el) {},
                onBeforePrevSlide: function (el) {}
        });

        $(".tabset").lightSlider({
                        item: 5,
                        autoWidth: false,
                        slideMove: 1, // slidemove will be 1 if loop is true
                        slideMargin: 20,
                 
                        addClass: '',
                        mode: "slide", //fade, slide//
                        useCSS: true,
                        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
                        easing: 'linear', //'for jquery animation',////
                 
                        speed: 600, //ms'
                        auto: false,
                        loop: false,
                        slideEndAnimation: true,
                        pause: 6000,
                 
                        keyPress: false,
                        controls: true,
                        prevHtml: '',
                        nextHtml: '',
                 
                        rtl:false,
                        adaptiveHeight:true,
                 
                        vertical:false,
                        verticalHeight:500,
                        vThumbWidth:100,
                 
                        thumbItem:10,
                        pager: false,
                        gallery: false,
                        galleryMargin: 5,
                        thumbMargin: 5,
                        currentPagerPosition: 'middle',
                 
                        enableTouch:true,
                        enableDrag:true,
                        freeMove:true,
                        swipeThreshold: 40,
                 
                        responsive : [
                            {
                                breakpoint:768,
                                settings: {
                                    item:3,
                                    adaptiveHeight:true,
                                }
                            }
                        ],
                 
                        onBeforeStart: function (el) {},
                        onSliderLoad: function (el) {},
                        onBeforeSlide: function (el) {},
                        onAfterSlide: function (el) {},
                        onBeforeNextSlide: function (el) {},
                        onBeforePrevSlide: function (el) {}
                });

        });

// flexslider setting
$(window).load(function() {
  // The slider being synced must be initialized first
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: true,
    slideshow: false,
    itemWidth: 98,
    itemMargin: 15,
    asNavFor: '#staff-slider'
  });
 
  $('#staff-slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: true,
    slideshow: false,
    sync: "#carousel"
  });
});