jQuery.noConflict()(function($) {
  $(document).ready(function() {

    jQuery('#back_top').click(function(){
      jQuery('html, body').animate({scrollTop:0}, 'normal');return false;
    }); 
    jQuery(window).scroll(function(){
      if(jQuery(window).scrollTop() !== 0){jQuery('#back_top').css('display','block');}else{jQuery('#back_top').css('display','none');}
    });
    if(jQuery(window).scrollTop() !== 0){jQuery('#back_top').css('display','block');}else{jQuery('#back_top').css('display','none');}
    
    jQuery("#main").fitVids();

    $('.slider-cycle').owlCarousel({
      singleItem: true,
      slideSpeed : 600,
      paginationSpeed: 600,
      rewindSpeed: 1000,
      autoPlay: false,
      stopOnHover: true,
      navigation : true,
      navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      pagination: true,
    });
  });
});