$(document).ready(function() {

  $(window).scroll(function(){
    $('.header').addClass('small');
    switchHeader();
  });
   
});

function switchHeader(){
  if (document.documentElement.clientWidth <= 400){
    if ($(window).scrollTop() <= 65){
      $('.header').removeClass('small');
    }
  }
  else if (document.documentElement.clientWidth <= 600){
    if ($(window).scrollTop() <= 90){
      $('.header').removeClass('small');
    }
  }
  else if (document.documentElement.clientWidth <= 900){
    if ($(window).scrollTop() <= 118){
      $('.header').removeClass('small');
    }
  }
  else {
    if ($(window).scrollTop() <= 140){
      $('.header').removeClass('small');
    }
  }

}