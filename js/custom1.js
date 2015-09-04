jQuery(document).ready(function($){
   // for scroll top
   setTimeout( "$('html,body').animate({scrollTop:$('.lightbox-wrap').offset().top-80},800);",5000);
   // for scroll top
   $(function() {
       $(window).scroll(function() {
           if ($(this).scrollTop() > 200) {
               $('#go-top').fadeIn();
           } else {
               $('#go-top').fadeOut();
           }
       });
   
       // scroll body to 0px on click
       $('#go-top').click(function() {
           $('body,html').animate({
               scrollTop: 0
           }, 800);
           return false;
       });
   });
   
   
   $('.ap_toggle_title').click(function(){
       if($(this).parent().hasClass('open')){
           $(this).next().slideUp();
           $(this).parent().removeClass('open');
           $(this).parent().addClass('close');
       }else{        
      $('.ap_toggle_content').slideUp();
      $('.ap_toggle').removeClass('open');
      $('.ap_toggle').addClass('close');
      $(this).next().slideDown();
      $(this).parent().removeClass('close');
      $(this).parent().addClass('open');
      }
   });


$('.fa-search').toggle(function(){
   if ($(window).width()<540){
     $('.aglee-search').css({'right': '14%', 'opacity': '100', 'z-index': '9999'});
     $('.boxed-layout .aglee-search').css({'right': '80px', 'opacity': '100', 'z-index': '9999'});
   }
   else if( ($(window).width() >= 540) && ($(window).width() <= 640) ){ // bteween 540 - 640
      $('.aglee-search').css({'right': '8%', 'opacity': '100', 'z-index': '9999'});
     $('.boxed-layout .aglee-search').css({'right': '80px', 'opacity': '100', 'z-index': '9999'});
   }
   
   else if( ($(window).width() >= 641) && ($(window).width() <= 768) ){ // between 641 - 768
       $('.aglee-search').css({'right': '14%', 'opacity': '100', 'z-index': '9999'});
     $('.boxed-layout .aglee-search').css({'right': '80px', 'opacity': '100', 'z-index': '9999'});
   }
   else if( ($(window).width() >= 769) && ($(window).width() <= 1024) ){ // between 769 - 1024
       $('.aglee-search').css({'right': '14%', 'opacity': '100', 'z-index': '9999'});
     $('.boxed-layout .aglee-search').css({'right': '80px', 'opacity': '100', 'z-index': '9999'});
   }
   else if( ($(window).width() >= 1025) && ($(window).width() <= 1280) ){ // between 1025 - 1280
jQuery(document).ready(function($){
   // for scroll top
   setTimeout( "$('html,body').animate({scrollTop:$('.lightbox-wrap').offset().top-80},800);",5000);
   // for scroll top
   $(function() {
       $(window).scroll(function() {
           if ($(this).scrollTop() > 200) {
               $('#go-top').fadeIn();
           } else {
               $('#go-top').fadeOut();
           }
       });
   
       // scroll body to 0px on click
       $('#go-top').click(function() {
           $('body,html').animate({
               scrollTop: 0
           }, 800);
           return false;
       });
   });
   
   
   $('.ap_toggle_title').click(function(){
       if($(this).parent().hasClass('open')){
           $(this).next().slideUp();
           $(this).parent().removeClass('open');
           $(this).parent().addClass('close');
       }else{        
      $('.ap_toggle_content').slideUp();
      $('.ap_toggle').removeClass('open');
      $('.ap_toggle').addClass('close');
      $(this).next().slideDown();
      $(this).parent().removeClass('close');
      $(this).parent().addClass('open');
      }
   });


$('.fa-search').toggle(function(){
   if ($(window).width()<540){
     $('.aglee-search').css({'right': '14%', 'opacity': '100', 'z-index': '9999'});
     $('.boxed-layout .aglee-search').css({'right': '80px', 'opacity': '100', 'z-index': '9999'});
   }
   else if( ($(window).width() >= 540) && ($(window).width() <= 640) ){ // bteween 540 - 640
      $('.aglee-search').css({'right': '8%', 'opacity': '100', 'z-index': '9999'});
     $('.boxed-layout .aglee-search').css({'right': '80px', 'opacity': '100', 'z-index': '9999'});
   }
   
   else if( ($(window).width() >= 641) && ($(window).width() <= 768) ){ // between 641 - 768
       $('.aglee-search').css({'right': '14%', 'opacity': '100', 'z-index': '9999'});
     $('.boxed-layout .aglee-search').css({'right': '80px', 'opacity': '100', 'z-index': '9999'});
   }
   else if( ($(window).width() >= 769) && ($(window).width() <= 1024) ){ // between 769 - 1024
       $('.aglee-search').css({'right': '14%', 'opacity': '100', 'z-index': '9999'});
     $('.boxed-layout .aglee-search').css({'right': '80px', 'opacity': '100', 'z-index': '9999'});
   }
   else if( ($(window).width() >= 1025) && ($(window).width() <= 1280) ){ // between 1025 - 1280
jQuery(document).ready(function($){
   // for scroll top
   setTimeout( "$('html,body').animate({scrollTop:$('.lightbox-wrap').offset().top-80},800);",5000);
   // for scroll top
   $(function() {
       $(window).scroll(function() {
           if ($(this).scrollTop() > 200) {
               $('#go-top').fadeIn();
           } else {
               $('#go-top').fadeOut();
           }
       });
   
       // scroll body to 0px on click
       $('#go-top').click(function() {
           $('body,html').animate({
               scrollTop: 0
           }, 800);
           return false;
       });
   });
   
   
   $('.ap_toggle_title').click(function(){
       if($(this).parent().hasClass('open')){
           $(this).next().slideUp();
           $(this).parent().removeClass('open');
           $(this).parent().addClass('close');
       }else{        
      $('.ap_toggle_content').slideUp();
      $('.ap_toggle').removeClass('open');
      $('.ap_toggle').addClass('close');
      $(this).next().slideDown();
      $(this).parent().removeClass('close');
      $(this).parent().addClass('open');
      }
   });


$('.fa-search').toggle(function(){
   if ($(window).width()<540){
     $('.aglee-search').css({'right': '14%', 'opacity': '100', 'z-index': '9999'});
     $('.boxed-layout .aglee-search').css({'right': '80px', 'opacity': '100', 'z-index': '9999'});
   }
   else if( ($(window).width() >= 540) && ($(window).width() <= 640) ){ // bteween 540 - 640
      $('.aglee-search').css({'right': '8%', 'opacity': '100', 'z-index': '9999'});
     $('.boxed-layout .aglee-search').css({'right': '80px', 'opacity': '100', 'z-index': '9999'});
   }
   
   else if( ($(window).width() >= 641) && ($(window).width() <= 768) ){ // between 641 - 768
       $('.aglee-search').css({'right': '14%', 'opacity': '100', 'z-index': '9999'});
     $('.boxed-layout .aglee-search').css({'right': '80px', 'opacity': '100', 'z-index': '9999'});
   }
   else if( ($(window).width() >= 769) && ($(window).width() <= 1024) ){ // between 769 - 1024
       $('.aglee-search').css({'right': '14%', 'opacity': '100', 'z-index': '9999'});
     $('.boxed-layout .aglee-search').css({'right': '80px', 'opacity': '100', 'z-index': '9999'});
   }
   else if( ($(window).width() >= 1025) && ($(window).width() <= 1280) ){ // between 1025 - 1280