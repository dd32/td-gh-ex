jQuery(function(){

  jQuery('#s').attr('placeholder','SEARCH...')


  jQuery('.testimonial-slider').bxSlider({
   controls:false,
   auto:true,
   mode:'fade',
   speed:1000
  });

  jQuery(window).resize(function(){
    jQuery('.slider-caption').each(function(){
    var cap_height = jQuery(this).actual( 'outerHeight' );
    jQuery(this).css('margin-top',-(cap_height/2));
    });
    }).resize();;
  

  jQuery('.commentmetadata').after('<div class="clear"></div>');

  jQuery('.menu-toggle').click(function(){
    jQuery('#site-navigation .menu').slideToggle('slow');
  });
    
    jQuery('.thumbnail-gallery .gallery-item a').each(function(){
        jQuery(this).addClass('fancybox-gallery').attr('data-lightbox-gallery','gallery');
    });
    
    jQuery(".fancybox-gallery").nivoLightbox();

    if(jQuery(window).width() > 940 ){
    var totalWidth = 0;
    var wrapperWidth = jQuery('#site-navigation .menu').width()-100;
    jQuery('#site-navigation .menu > li').each(function(){
    totalWidth = jQuery(this).outerWidth(true) + totalWidth;
    if(totalWidth > wrapperWidth){
      jQuery(this).addClass('more-item');
    }
    });
  jQuery('#site-navigation .menu .more-item').wrapAll('<li class="menu-item-has-children more-menu-item"><ul></ul></li>');
  jQuery('.more-menu-item').prepend('<a href=#>More</a>');
    }

 });
