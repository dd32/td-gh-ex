/*
 *  jQuery All funtion
 *
 */
jQuery(document).ready(function() {
    jQuery('#list').click(function(event){event.preventDefault();jQuery('.products .product').addClass('list-group-item');});
    jQuery('#grid').click(function(event){event.preventDefault();jQuery('.products .product').removeClass('list-group-item');jQuery('.products .product').addClass('grid-group-item');});
});

/* Nav-hover Magic line
============================================= 
jQuery(function() {
/* Add Magic Line markup via JavaScript, because it ain't gonna work without 
jQuery(".menu").append("<li id='magic-line'></li>");
var jQuerymagicLine = jQuery("#magic-line");
jQuerymagicLine
    .width(jQuery(".active").width())
    .css("left", jQuery(".active a").position().left)
    .data("origLeft", jQuerymagicLine.position().left)
    .data("origWidth", jQuerymagicLine.width());
jQuery(".menu li").find("a").hover(function() {
    jQueryel = jQuery(this);
    leftPos = jQueryel.position().left;
    newWidth = jQueryel.parent().width();
    jQuerymagicLine.stop().animate({
        left: leftPos,
        width: newWidth
    });
}, function() {
    jQuerymagicLine.stop().animate({
        left: jQuerymagicLine.data("origLeft"),
        width: jQuerymagicLine.data("origWidth")
    }); 
	jQuery('.menu>li')
    .mouseenter(function() {
        jQuery(this).addClass('open');
    })
    .mouseleave(function() {
        jQuery(this).removeClass('open');
    });
});
}); 

------*/

/* product-item
============================================= */
jQuery(document).ready(function(e) {	
jQuery("ul.children").hide();
jQuery(".items li i").click(function(){
    jQuery(this).parent().children('ul').slideToggle();
})
jQuery(".items li i").click(function(){
    jQuery(this).toggleClass('fa-minus');
})
});

/* slider
============================================= */

jQuery(window).load(function(){
       jQuery('.flexslider').flexslider({
          animation: "fade",
          animationLoop: true,
          start: function(slider){
         }
       });
    });

/* Mobile-menu
============================================= */			
jQuery(document).ready(function(e){jQuery(".main_nav>ul").addClass("main-list"),jQuery("body").prepend('<div class="mobile-menu"></div>'),jQuery("body").append('<div class="site-overlay"></div>'),jQuery(".main-list").clone().appendTo(".mobile-menu"),jQuery("#logo").clone().appendTo(".mobile-menu"),jQuery(".mobile-menu #logo").insertBefore(".mobile-menu .main-list"),jQuery(".mobile-menu ul.main-list > li").find("ul").before('<span class="dropdown"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></div>'),jQuery("#nav").after('<div class="toggle-mobile"><span class="layer one">&nbsp;</span><span class="layer two">&nbsp;</span><span class="layer three">&nbsp;</span></div>'),jQuery(".dropdown").click(function(e){jQuery(this).toggleClass("open"),jQuery(this).next("ul").slideToggle()}),jQuery(document).ready(function(e){var n=!0;jQuery(".toggle-mobile").click(function(){jQuery(".mobile-menu").toggleClass("show"),jQuery(".site-overlay").addClass("overlay-show"),n=!1}),jQuery(".mobile-menu").click(function(){n=!1}),jQuery("html,.mobile-menu>ul li a,.site-overlay").click(function(){n&&(jQuery(".mobile-menu").removeClass("show"),jQuery(".site-overlay").removeClass("overlay-show")),n=!0})})}),jQuery(document).ready(function(e){jQuery("#menu_btn").click(function(){jQuery("#menu_btn").toggleClass("open"),jQuery(".nav").fadeToggle()})})      
