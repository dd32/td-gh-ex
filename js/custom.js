jQuery(function($){
  "use strict";
  jQuery('.main-menu-navigation > ul').superfish({
    delay:       0,                            
    animation:   {opacity:'show',height:'show'},  
    speed:       'fast'                        
  });
});

function bb_wedding_bliss_resmenu_open() {
  window.bb_wedding_bliss_mobileMenu=true;
  jQuery(".sidebar").addClass('display');
}
function bb_wedding_bliss_resmenu_close() {
  window.bb_wedding_bliss_mobileMenu=false;
  jQuery(".sidebar").removeClass('display');
}

jQuery(document).ready(function () {

  window.bb_wedding_bliss_currentfocus=null;
  bb_wedding_bliss_checkfocusdElement();
  var bb_wedding_bliss_body = document.querySelector('body');
  bb_wedding_bliss_body.addEventListener('keyup', bb_wedding_bliss_check_tab_press);
  var bb_wedding_bliss_gotoHome = false;
  var bb_wedding_bliss_gotoClose = false;
  window.bb_wedding_bliss_mobileMenu=false;
  function bb_wedding_bliss_checkfocusdElement(){
    if(window.bb_wedding_bliss_currentfocus=document.activeElement.className){
      window.bb_wedding_bliss_currentfocus=document.activeElement.className;
    }
  }
  function bb_wedding_bliss_check_tab_press(e) {
    "use strict";
    // pick passed event or global event object if passed one is empty
    e = e || event;
    var activeElement;

    if(window.innerWidth < 999){
      if (e.keyCode == 9) {
        if(window.bb_wedding_bliss_mobileMenu){
          if (!e.shiftKey) {
            if(bb_wedding_bliss_gotoHome) {
              jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).focus();
            }
          }
          if (jQuery("a.closebtn.responsive-menu").is(":focus")) {
            bb_wedding_bliss_gotoHome = true;
          } else {
            bb_wedding_bliss_gotoHome = false;
          }

        }else{

          if(window.bb_wedding_bliss_currentfocus=="mobiletoggle"){
            jQuery( "" ).focus();
          }
        }
      }
    }
    if (e.shiftKey && e.keyCode == 9) {
      if(window.innerWidth < 999){
        if(window.bb_wedding_bliss_currentfocus=="header-search"){
          jQuery(".mobiletoggle").focus();
        }else{
          if(window.bb_wedding_bliss_mobileMenu){
            if(bb_wedding_bliss_gotoClose){
              jQuery("a.closebtn.responsive-menu").focus();
            }
            if (jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).is(":focus")) {
              bb_wedding_bliss_gotoClose = true;
            } else {
              bb_wedding_bliss_gotoClose = false;
            }
        
          }else{

            if(window.bb_wedding_bliss_mobileMenu){
            }
          }

        }
      }
    }
    bb_wedding_bliss_checkfocusdElement();
  }

});

// scroll
jQuery(document).ready(function () {
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 0) {
      jQuery('#scroll-top').fadeIn();
    } else {
      jQuery('#scroll-top').fadeOut();
    }
  });
  jQuery(window).on("scroll", function () {
    document.getElementById("scroll-top").style.display = "block";
  });
  jQuery('#scroll-top').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
  });
});

(function( $ ) {

$(window).scroll(function(){
  var sticky = $('.sticky-header'),
  scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed-header');
  else sticky.removeClass('fixed-header');
});

})( jQuery );

jQuery(function($){
  $(window).load(function() {
    $("#loader-wrapper").delay(1000).fadeOut("slow");
    $("#loader").delay(1000).fadeOut("slow");
  })
});
