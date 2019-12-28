jQuery(document).ready(function($) {
    $('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').each(function(){
    
    if ($(this).parents('.gallery').length == 0) {
    $(this).magnificPopup({
    type:'image',
    closeOnContentClick: true, 
    mainClass: 'mfp-with-zoom', // this class is for CSS animation below
    
    image: {
    markup: '<div class="mfp-figure">'+
    '<div class="mfp-close"></div>'+
    '<div class="mfp-img"></div>'+
    '<div class="mfp-bottom-bar">'+
    '<div class="mfp-title"></div>'+
    '<div class="mfp-description" style="text-align: left;font-size: 12px;line-height: 16px;color: #f3f3f3;word-break: break-word;padding-right: 36px;"></div>'+
    '<div class="mfp-counter"></div>'+
    '</div>'+
    '</div>',
    titleSrc: function(item) {
    return '<strong>' + item.el.find('img').attr('alt') + '</strong>';
    }
    },
    
    zoom: {
    enabled: true, 
    duration: 300, 
    easing: 'ease-in-out', 
    // By default it looks for an image tag:
    opener: function(openerElement) {
    return openerElement.is('img') ? openerElement : openerElement.find('img');}
    }
    
    });
    }
    });
    
    // initialize magnific popup galleries with titles and descriptions
    $('.gallery').magnificPopup({
    callbacks: {
    open: function() {
    $('.mfp-description').append(this.currItem.el.attr('title'));
    },
    afterChange: function() {
    $('.mfp-description').empty().append(this.currItem.el.attr('title'));
    }
    },
    delegate: 'a',
    type: 'image',
    image: {
    markup: '<div class="mfp-figure">'+
    '<div class="mfp-close"></div>'+
    '<div class="mfp-img"></div>'+
    '<div class="mfp-bottom-bar">'+
    '<div class="mfp-title"></div>'+
    '<div class="mfp-description" style="text-align: left;font-size: 12px;line-height: 16px;color: #f3f3f3;word-break: break-word;padding-right: 36px;"></div>'+
    '<div class="mfp-counter"></div>'+
    '</div>'+
    '</div>',
    titleSrc: function(item) {
    return '<strong>' + item.el.find('img').attr('alt') + '</strong>';
    }
    },
    gallery: {
    enabled: true,
    navigateByImgClick: true
    }
    }); 
    });