jQuery(function($){
  "use strict";
  jQuery('.main-menu-navigation > ul').superfish({
    delay:       0,                            
    animation:   {opacity:'show',height:'show'},  
    speed:       'fast'                        
  });
});

/**** Hidden search box ***/
function advance_education_search_open() {
  jQuery(".serach_outer").slideDown(100);
}
function advance_education_search_close() {
  jQuery(".serach_outer").slideUp(100);
}

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

  advance_education_MobileMenuInit();
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

function advance_education_MobileMenuInit() {

  /* First and last elements in the menu */
  var advance_education_firstTab = jQuery('.main-menu-navigation ul:first li:first a');
  var advance_education_lastTab  = jQuery('a.closebtn'); /* Cancel button will always be last */

  jQuery(".mobiletoggle").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery(".sidebar").show().animate({width: "100%", opacity: 1}, 200);
    jQuery('body').addClass("noscroll");
    advance_education_firstTab.focus();
  });

  jQuery("a.closebtn").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery(".sidebar").hide().animate({width: "0%", opacity: 0},200);
    jQuery('body').removeClass("noscroll");
    jQuery(".mobiletoggle").focus();
  });

  /* Redirect last tab to first input */
  advance_education_lastTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('noscroll'))
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      advance_education_firstTab.focus();
    }
  });

  /* Redirect first shift+tab to last input*/
  advance_education_firstTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('noscroll'))
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      advance_education_lastTab.focus();
    }
  });

  /* Allow escape key to close menu */
  jQuery('.sidebar').on('keyup', function(e){
    if (jQuery('body').hasClass('noscroll'))
    if (e.keyCode === 27 ) {
      jQuery('body').removeClass('noscroll');
      advance_education_lastTab.focus();
    };
  });
}