function adventure_travelling_menu_open() {
  jQuery(".sidenav").addClass('open');
}
function adventure_travelling_menu_close() {
  jQuery(".sidenav").removeClass('open');
}

jQuery(function($){
  "use strict";
  $('.menu-nav > ul').superfish({
    delay:       500,
    animation:   {opacity:'show',height:'show'},
    speed:       'fast'
  });
  $('.search-box span a').click(function(){
    $(".serach_outer").toggle();
  });
});

jQuery(function($){
  $(window).scroll(function(){
    var scrollTop = $(window).scrollTop();
    if( scrollTop > 100 ){
      $('.menubar').addClass('scrolled');
    }else{
      $('.menubar').removeClass('scrolled');
    }
      $('.main-header').css('background-position', 'center ' + (scrollTop / 2) + 'px');
  });
});

jQuery(function($){
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 500);
  });
});