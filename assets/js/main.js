(function($) {
  "use strict"; // Start of use strict
  // Show the navbar when the page is scrolled up
  var MQL = 992;

  //primary navigation slide-in effect

  jQuery(window).on('scroll', function() {
        if ($(this).scrollTop() > 55) {
            $('#mainNav').addClass("is-visible is-fixed");
        } else {
            $('#mainNav').removeClass("is-visible is-fixed");
        }
    });
  /*======================================
  //  Our Team
  ======================================*/ 
  $('.team-slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    autoplaySpeed: 2500,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  /*======================================
  // Testimonials
  ========================================*/
   $('.testimonial-slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2500,
  });
  /*======================================
  //  Onepage Nav
  ======================================*/ 
  if ($.fn.onePageNav) {
        $('.navbar-nav').onePageNav({
            currentClass: 'active',
            scrollSpeed: 600,
        });
    }
  $('.contact-us-btn').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $("#contact").offset().top }, 600);
  });

    /*================================
    // Isotope
    ===============================*/
   
    // init Isotope
    var $tabContent = $('.tab-content').isotope({
      itemSelector: '.work-item',
      layoutMode: 'fitRows',
      getSortData: {
        name: '.name',
        symbol: '.symbol',
        number: '.number parseInt',
        category: '[data-category]',
        weight: function( itemElem ) {
          var weight = $( itemElem ).find('.weight').text();
          return parseFloat( weight.replace( /[\(\)]/g, '') );
        }
      }
    });

    // filter functions
    var filterFns = {
      // show if number is greater than 50
      numberGreaterThan50: function() {
        var number = $(this).find('.number').text();
        return parseInt( number, 10 ) > 50;
      },
      // show if name ends with -ium
      ium: function() {
        var name = $(this).find('.name').text();
        return name.match( /ium$/ );
      }
    };

    // bind filter nav click
    $('#filters').on( 'click', '.nav-item', function() {
      var filterValue = $( this ).attr('data-filter');
      // use filterFn if matches value
      filterValue = filterFns[ filterValue ] || filterValue;
      $tabContent.isotope({ filter: filterValue });
    });


    // change active class on buttons
    $('.nav-tabs').each( function( i, navtabs ) {
      var $navtabs = $( navtabs );
      $navtabs.on( 'click', '.nav-link', function() {
        $navtabs.find('.active').removeClass('active');
        $( this ).addClass('active');
      });
    });
    
    /*=========================
      Match height Javascript
    ===========================*/

    //Apply matchHeight to each work item
    $(function() {
        $('.work-item').each(function() {
          $('.work-caption').matchHeight({
            byRow: true
            });

           $('.work-link').matchHeight({
            byRow: true
            });
        });
    });

    //Apply matchHeight to each Team item
    $(function() {
        $('.team').each(function() {
          $('p').matchHeight({
            byRow: true
            });

           $('.team-content').matchHeight({
            byRow: true
            });
        });
    });

    //Apply matchHeight to each Blog item
    $(function() {
        $('.blog').each(function() {
          $('.blog-head').matchHeight({
            byRow: true
            });

           $('.blog-content').matchHeight({
            byRow: true
            });
        });
    });

    $(".full-content").hide();
})(jQuery); // End of use strict

 // Google Map
 function initMap() {
    var uluru = {lat: -27.7172, lng:85.3240};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 1,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }


