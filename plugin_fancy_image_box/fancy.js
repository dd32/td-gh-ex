jQuery(function(){
  // group gallery items
  jQuery('div.gallery a').each(function(){
    jQuery(this).attr('rel', jQuery(this).parent().attr('id'));
  });
    
  // Add Fancy Classes to single items:
  jQuery('a').each(function(){
    // filter items
    if ( this.href.toLowerCase().substr(-4).indexOf('.jpg') < 0 &&
         this.href.toLowerCase().substr(-5).indexOf('.jpeg') < 0 &&
         this.href.toLowerCase().substr(-4).indexOf('.png') < 0 &&
         this.href.toLowerCase().substr(-4).indexOf('.gif') < 0 )
    return;

    jQuery(this).addClass('fancybox');    
  });
  
  jQuery('a.fancybox').fancybox({ 'zoomSpeedIn':  600,
                                  'zoomSpeedOut': 600,
                                  'easingIn':     'easeOutBack',
                                  'easingOut':    'easeInBack',
                                  'zoomOpacity':  true });

});