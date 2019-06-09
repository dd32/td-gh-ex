jQuery(document).ready(function ($) {
    "use strict";

    $('.arrival-parallax').jarallax({
        speed: 0.2
    });

    /**
    * Back to top button
    */
    $('.scroll-top-top').hide();
    var offset = 250;
    var duration = 300;
    $(window).scroll(function () {
        if ($(this).scrollTop() > offset) {
            $('.scroll-top-top').fadeIn(duration);
        } else {
            $('.scroll-top-top').fadeOut(duration);
        }
    });
    $('body').on('click', '.scroll-top-top', function (event) {
        event.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, duration);
        return false;
    });

    /**
    * One page navigation
    *
    */
    var enableOnepageMenu = arrival_loc_script.onepagenav;

    if( 'yes' == enableOnepageMenu ){
        $(".site-header .main-navigation,.plx-nav").onePageNav({
            currentClass: 'current',
            changeHash: false,
            scrollSpeed: 850,
            scrollThreshold: 0.5,
            
        });
    }
    

    

    /*
    * Toggle search
    */
    $('body').on('click', '.header-last-item.search-wrap', function () {
        $('.arrival-search-form-wrapp').addClass('active');
    });

    $(document).on('click', '.arrival-search-form-wrapp .close', function () {
        $('.arrival-search-form-wrapp').removeClass('active');
    });

/**
* Mobile navigation scripts
*
*/   
 $('body').on('click','.toggle-wrapp', function(){

    $('.site-header').toggleClass('toggled-on');
 });

//close sidemenu on click outside it's container
var menuWraper = $('.mob-nav-wrapp');
    $(document).on('click', function(event){
        var menuToggle = $('.toggle-wrapp');
        if (!menuWraper.is(event.target) &&            // If the target of the click isn't the container...
            menuWraper.has(event.target).length === 0) // ... nor a descendant of the container
        {
             if (!menuToggle.is(event.target) &&            
                menuToggle.has(event.target).length === 0) {
                // Do whatever you want to do when click is outside the element
                $('.site-header').removeClass('toggled-on');
            }
            
        }
    });


$('.mob-nav-wrapp ul li ul').slideUp();

$('<div class="sub-toggle"></div>').insertBefore('.mob-nav-wrapp .menu-item-has-children ul');
$('<div class="sub-toggle-children"></div>').insertBefore('.mob-nav-wrapp .page_item_has_children ul');



$('body').on('click touchstart','.mob-nav-wrapp .sub-toggle', function()  {
  
  $(this).next('ul.sub-menu').slideToggle(400);
  $(this).parent('li').toggleClass('mob-menu-toggle');
});

$('body').on('click touchstart','.mob-nav-wrapp .sub-toggle-children',function() {
  $(this).next('ul.sub-menu').slideToggle(400);
    
});


$(".post-thumb").fitVids({
     customSelector: "iframe[src^='https://w.soundcloud.com']"
});
$(".list-layout .fluid-width-video-wrapper").css("padding-top", "101%");

//gallery post slider
$('.gallery-post-format').slick({
    arrows: true
});




});