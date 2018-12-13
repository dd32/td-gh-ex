jQuery(document).ready(function($){
   
   /** Variables from Customizer for Slider settings */
    if( benevolent_data.auto == '1' ){
        var slider_auto = true;
    }else{
        var slider_auto = false;
    }
    
    if( benevolent_data.loop == '1' ){
        var slider_loop = true;
    }else{
        var slider_loop = false;
    }
    
    if( benevolent_data.pager == '1' ){
        var slider_control = true;
    }else{
        var slider_control = false;
    }
    if( benevolent_data.rtl == '1' ){
        var rtl = true;
    }else{
        var rtl = false;
    }

    if( benevolent_data.animation == 'slide' ){
        var slider_animation = '';
    }else{
        var slider_animation = 'fadeOut';
    }
    
    /** Home Page Slider */
    $("#banner-slider").owlCarousel({
        items           : 1,
        margin          : 0,
        loop            : slider_loop,
        autoplay        : slider_auto,
        nav             : false,
        dots            : slider_control,
        animateOut      : slider_animation,
        autoplayTimeout : benevolent_data.speed,
        lazyLoad        : true,
        mouseDrag       : false,
        rtl             : rtl,
        autoplaySpeed   : benevolent_data.a_speed,
    });
   
   $('.number').counterUp({
        delay: 10,
        time: 1000
    });
   
   $( "#tabs" ).tabs();

   //Responsive navigation
   $('.main-navigation').prepend('<span class="close"></span>');
   $('#mobile-header').click(function(){
    $('body').addClass('menu-toggled');
   });

   $('.close').click(function(){
    $('body').removeClass('menu-toggled');
   });

   //secondary responsive menu
   $('.secondary-navigation').clone().insertBefore('.header-bottom');
   $('#secondary-mobile-header').click(function(){
    $(this).parents('.header-top').siblings('.secondary-navigation').slideToggle();
   });

   $('.main-navigation ul li.menu-item-has-children, .secondary-navigation ul li.menu-item-has-children').prepend('<span class="submenu-toggle"><i class="fas fa-chevron-down"></i></span>');
   
   $('.submenu-toggle').click(function(){
    $(this).toggleClass('active');
    $(this).siblings('ul').slideToggle();
   });

});