jQuery(function($){
    
  jQuery(window).resize(function(){
    jQuery('.slider-caption').each(function(){
    var cap_height = jQuery(this).actual( 'outerHeight' );
    jQuery(this).css('margin-top',-(cap_height/2));
    });
    }).resize();;
  
    jQuery('.testimonial-slider').bxSlider({
   controls:false,
   auto:true,
   mode:'fade',
   speed:1000
  });
  jQuery('.commentmetadata').after('<div class="clear"></div>');

  jQuery('body').on('click keypress','.menu-toggle',function(e){
    e.preventDefault();
    jQuery('#site-navigation .menu').slideToggle('slow');
  });
    
    jQuery('.thumbnail-gallery .gallery-item a').each(function(){
        jQuery(this).addClass('fancybox-gallery').attr('data-lightbox-gallery','gallery');
    });
    
    jQuery(".fancybox-gallery").nivoLightbox();
    jQuery(".image_feature_lightbox").nivoLightbox();
    
    jQuery('.search_one').click(function(){
         jQuery('.searchform').show();
         jQuery('.search_one').hide();
         
    });
    $('#secondary-right, #primary').theiaStickySidebar({additionalMarginTop: 35});
    $('#secondary-left, #primary').theiaStickySidebar({additionalMarginTop: 35});



/**
* Slider scripts
*
*/

jQuery('.bx-slider').bxSlider({
  adaptiveHeight: true,
  pager: accesspresslite_loc_script.pager,
  controls: accesspresslite_loc_script.controls,
  mode: accesspresslite_loc_script.mode,
  auto : accesspresslite_loc_script.auto,
  pause: accesspresslite_loc_script.pause,
  speed: accesspresslite_loc_script.speed
  
});



 });
