jQuery(function($){

  $("body .sub-menu").perfectScrollbar();

  $('.search-icon a').click(function() {
    $('.search-box').addClass('active');
  });

  $('.search-box .close').click(function() {
    $('.search-box').removeClass('active');
  });

  $('.new-prod-slide').slick({
    infinite: false,
    centerMode:false,
    useCss:false,
    easing:'linear',
    edgeFriction:'0.15',
    lazyLoad:'ondemand',
    speed: 500,
    slidesToShow: 4,
    slidesToScroll: 1,
    cssEase:'ease',
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });

  $('.feature-cat-product').slick({
    infinite: false,
    centerMode:false,
    useCss:false,
    easing:'linear',
    edgeFriction:'0.15',
    lazyLoad:'ondemand',
    speed: 500,
    slidesToShow: 2,
    slidesToScroll: 1,
    cssEase:'ease',
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });

  new WOW().init();

  $('#ak-top').css('right',-65);
  $(window).scroll(function(){
    if($(this).scrollTop() > 300){
      $('#ak-top').css('right',20);
    }else{
      $('#ak-top').css('right',-65);
    }
  });

  $("#ak-top").click(function(){
    $('html,body').animate({scrollTop:0},600);
  });

  $('.ticker-wrapper').show();

  

});//doc close
