jQuery(document).ready(function($){
//for slider
$('.carousel-main-slider').owlCarousel({
    loop:true,
    nav:false,
    autoplay:true,
    items:1
   
});

$('.agensy-service-slider').owlCarousel({
    loop:true,
    nav:false,
    items:1
   
});

$('.agensy-logo-container').owlCarousel({
    loop:true,
    nav:false,
    margin:50,
    items:5,
    responsive:{
        0:{
            items:1,
     
        },
        320:{
            items:2,
        },
        600:{
            items:3,
        },
         700:{
            items:4,
        },
        1000:{
            items:5,
        }
    }

   
});

//for making tab
/**
    * About Us section tabs
    */
    //hide all except first child    
    $('.tab-contents').not(":first").hide();
    //add class to first h3    
    $('.tab-title h3:first').addClass('enabled');
    $('.tab-title').click(function(){
    if($(this).find('h3').hasClass('enabled')){
        return false;
    }else{
        $(this).siblings('.tab-contents').slideUp();
        $(this).siblings('.tab-title').find('h3').removeClass('enabled');
        $(this).find('h3').addClass('enabled');
        $(this).next('.tab-contents').slideDown();
    }
    });
    

/**
*
*counter section
**/

var clasCheck = $("body").find(".agensy-counter-scroll").length;

//console.log(clasCheck);
if( clasCheck >0){
    var a = 0;
    $(window).scroll(function() {
      var oTop = $('.agensy-counter-scroll').offset().top - window.innerHeight;
      if (a == 0 && $(window).scrollTop() > oTop) {
        $('.agensy-counter-scroll-value').each(function() {
          var $this = $(this),
            countTo = $this.attr('data-count');
          $({
            countNum: $this.text()
          }).animate({
              countNum: countTo
            },

            {

              duration: 2000,
              easing: 'swing',
              step: function() {
                $this.text(Math.floor(this.countNum));
              },
              complete: function() {
                $this.text(this.countNum);
                //alert('finished');
              }

            });
        });
        a = 1;
      }

    });
}
/*agensy-service-page-wrap height equalizing*/
// var height = $('.agensy_featured-content').outerHeight();
// $('.agensy-featured-image').outerHeight(height);
/*agensy-service-page-wrap height equalizing end*/

//add class while onclick
    $('.agensy-team-logo-icon').on('mouseenter', function () {
     $(this).siblings('.team-desc-social-wrap').addClass("agensy-active");
     $(this).addClass("agensy-actived");
    });
    $('.member-image').on('mouseleave', function () {
     $(this).find('.agensy-active').removeClass("agensy-active");
     $(this).find('.agensy-actived').removeClass("agensy-actived");
    });
});
