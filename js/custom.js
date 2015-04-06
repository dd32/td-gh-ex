jQuery(document).ready(function ($){
    $('.ap_toggle_title').click(function(){
      $(this).next('.ap_toggle_content').slideToggle();
      $(this).toggleClass('active');
      
      if($(this).parent('.ap_toggle').hasClass('open')){
        $(this).parent('.ap_toggle').removeClass('open');
        $(this).parent('.ap_toggle').addClass('close');
      }else if($(this).parent('.ap_toggle').hasClass('close')){
        $(this).parent('.ap_toggle').removeClass('close');
        $(this).parent('.ap_toggle').addClass('open');
      }
  });

    $('.search-icon i.fa-search').click(function() {
    $('.search-icon .ak-search').toggleClass('active');
});

$('.ak-search .close').click(function() {
    $('.search-icon .ak-search').removeClass('active');
});

$('.overlay-search').click(function() {
    $('.search-icon .ak-search').removeClass('active');
});

/*Super Fish Menu*/
    $('#site-navigation .menu').superfish({
      animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
      animationOut:{opacity:'hide',height:'hide'},  // fade-in and slide-down animation
      speed:       'fast',                          // faster animation speed
    });

// fade in #back-top
$(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#go-top').fadeIn();
        } else {
            $('#go-top').fadeOut();
        }
    });

    // scroll body to 0px on click
    $('#go-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});

});