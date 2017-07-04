jQuery(document).ready(function($){


    $('.center').slick({
        centerMode: true,
        infinite: true,
        centerPadding: '60px',
        slidesToShow: 3,
        speed: 500,
        responsive: [{
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3
            }
        }, {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }]
    });
	
	$('.autoplay').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000
    });




    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 500,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true,
        slide: 'div'
    });

    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 166) {
            $('.fixed-header').show();
        } else {
            $('.fixed-header').hide();
        }
    });

    $('ul.nav a').on('click', function(event) {
      if ($(this).attr('href')[0] === "#") { 
        event.preventDefault();
          var targetID = $(this).attr('href');
          var targetST = $(targetID).offset().top - 48;
          $('body, html').animate({
              scrollTop: targetST + 'px'
          }, 300);
      }
    });
	

	// adjust hight
	$('#features .content .slider div h3 img').each(function() {
		var width = $(this).width();   
		var height = $(this).height();  
		var needheight = width* 0.66;
		$(this).css("height", needheight);  
		//$(this).css("width", width); 
	});

});
