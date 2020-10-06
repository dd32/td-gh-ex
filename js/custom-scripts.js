/**
* Custom js for Accesspress Mag
* 
*/

jQuery(document).ready(function($){
        
$('.main-navigation .search-icon i.fa-search').click(function() {
    $(this).next('.ak-search').toggleClass('active');
});

$('.ak-search .close').click(function() {
    $('.search-icon .ak-search').removeClass('active');
});

$('.overlay-search').click(function() {
    $('.search-icon .ak-search').removeClass('active');
});

$('.nav-toggle').click(function() {
    $('.nav-wrapper .menu').slideToggle('slow');
    $(this).parent('.nav-wrapper').toggleClass('active');
});

jQuery('#site-navigation .nav-wrapper .menu-item-has-children > a').wrap('<div class="sub-wrap"></div>');


$('.nav-wrapper .menu-item-has-children .sub-wrap').append('<button type="button" class="sub-toggle"> <i class="fa fa-angle-right"></i> </button>');


$('.nav-wrapper .sub-toggle').click(function() {
    $(this).parents('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
    $(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
});

new WOW().init();
 
// hide #back-top first
$("#back-top").hide();

// fade in #back-top
$(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });

    // scroll body to 0px on click
    $('#back-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});



$("#homeslider").bxSlider({
    mode: 'horizontal',
    controls: apmag_loc_script.controls,
    pager: apmag_loc_script.pager,
    pause: apmag_loc_script.pause,
    speed: 1500,
    auto: apmag_loc_script.auto
                          
});

$("#homeslider-mobile").bxSlider({
    mode: 'horizontal',
    controls: apmag_loc_script.controls,
    pager: apmag_loc_script.pager,
    pause: apmag_loc_script.pause,
    speed: 1000,
    auto: apmag_loc_script.auto
                            
});


 $('#apmag-news').ticker({
    speed: 0.10,
    feedType: 'xml',
    displayType: 'reveal',
    htmlFeed: true,
    debugMode: true,
    fadeInSpeed: 600,
    pauseOnItems: 4000,
    direction: apmag_loc_script.direction,
    titleText: '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+apmag_loc_script.caption+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
});

 
});