jQuery(document).ready(function($){
    
    'use strict';

    $('.testimonials-posts-wrapper').lightSlider({
        item: 1,
        adaptiveHeight: false,
        pager: false,
        loop: true,
        pause: 3000,
        slideMove: 1,
        speed: 1200,
        prevHtml: '<i class="fas fa-chevron-left"></i>',
        nextHtml: '<i class="fas fa-chevron-right"></i>',
    });

});