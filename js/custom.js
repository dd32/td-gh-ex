jQuery(document).ready(function($){
   
   /** Variables from Customizer for Slider settings */
    if( benevolent_data.auto == '1' ){
        var slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( benevolent_data.loop == '1' ){
        var slider_loop = true;
    }else{
        var slider_loop = false;
    }
    
    if( benevolent_data.pager == '1' ){
        var slider_control = true;
    }else{
        slider_control = false;
    }
    if( benevolent_data.rtl == '1' ){
        var rtl = true;
    }else{
        var rtl = false;
    }
    
    /** Home Page Slider */
    $('#banner-slider').lightSlider({
        item        : 1,
        slideMargin : 0,
        mode        : benevolent_data.animation,
        speed       : benevolent_data.a_speed, //ms'
        auto        : slider_auto,
        loop        : slider_loop,
        pause       : benevolent_data.speed,
        controls    : false,
        pager       : slider_control,
        enableDrag  : false,
        rtl         : rtl,
    });
   
   $('.number').counterUp({
        delay: 10,
        time: 1000
    });
   
   $( "#tabs" ).tabs();
   
   $('#responsive-menu-button').sidr({
      name: 'sidr-main',
      source: '#site-navigation',
      side: 'right'
    });

   $('#responsive-secondary-menu-button').sidr({
      name: 'sidr-main2',
      source: '#top-navigation',
      side: 'left'
    });
   
});