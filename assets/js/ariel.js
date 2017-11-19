
(function( $ ) {

    fluidBox();

    $(".slick-carousel").slick({
        speed: 1000,
        dots: true,
        arrows: false,
        slidesToShow: 1,
        autoplay: false,
        infinite: true
    });
    $("#slick-carousel-control li").click(function(){
        $index = $(this).attr('data-slick-go-to');
        $('.slick-carousel').slick('slickGoTo', $index);
        return false;
    });
    $(".slick-carousel-fade").slick({
        speed: 3000,
        dots: true,
        arrows: false,
        slidesToShow: 1,
        fade: true,
        autoplay: false,
        infinite: true
    });
    $(".product_carousal").slick({
        speed: 1000,
        dots: false,
        arrows: true,
        slidesToShow: 4,
        autoplay: false,
        infinite: true,
        prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class="fa fa-long-arrow-left"></i></button>',
        nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="fa fa-long-arrow-right"></i></button>',
        variableWidth:true,
        responsive:[
            {
              breakpoint: 768,
              settings: {slidesToShow: 3,variableWidth:false}
            },
            {
              breakpoint: 480,
              settings: {slidesToShow: 2,variableWidth:false}
            },
            {
              breakpoint: 320,
              settings: {slidesToShow: 1,variableWidth:false}
            }
          ]
    });

    $("#header nav ul.navbar-nav").tinyNav({
        indent: ' - ',
        active: 'current-menu-item',
    });

})( jQuery );

function fluidBox(){
    if(jQuery('[data-fluid]').length>0){
        jQuery('[data-fluid]').each(function(){
            var data = jQuery(this).attr('data-fluid');
            var dataFloat = jQuery(this).attr('data-float');
            var dataFixed = jQuery(this).attr('data-fluid-fixed');
            var _container = jQuery(this);
            var dataSplit = data.split(',');
            if(_container.hasClass('carousel')){
                _container.find('.item').addClass('show');
            }
            for(i=0;i<dataSplit.length;i++){
                if(dataSplit[i]!=''){
                    if(jQuery(dataSplit[i],_container).length>0){
                        if(dataFixed=='true')
                            jQuery(dataSplit[i],_container).css('height','auto');
                        else
                            jQuery(dataSplit[i],_container).css('min-height','inherit');
                        if( dataFloat=='true' && jQuery(dataSplit[i],_container).parent().css('float')!='none' ){
                            var newH = 0;
                            if(jQuery(dataSplit[i],_container).length>0){
                                jQuery(dataSplit[i],_container).each(function(){
                                    var thisH = jQuery(this).innerHeight();
                                    if( newH<thisH ) newH = thisH;
                                });
                                if(dataFixed=='true')
                                    jQuery(dataSplit[i],_container).css('height',newH);
                                else
                                    jQuery(dataSplit[i],_container).css('min-height',newH);
                            }
                        }else if(dataFloat!='true'){
                            var newH = 0;
                            if(jQuery(dataSplit[i],_container).length>0){
                                jQuery(dataSplit[i],_container).each(function(){
                                    var thisH = jQuery(this).innerHeight();
                                    if( newH<thisH ) newH = thisH;
                                });
                                if(dataFixed=='true')
                                    jQuery(dataSplit[i],_container).css('height',newH);
                                else
                                    jQuery(dataSplit[i],_container).css('min-height',newH);
                            }
                        }
                    }
                }
            }
            if(_container.hasClass('carousel')){
                _container.find('.item').removeClass('show');
            }
        });
    }
}