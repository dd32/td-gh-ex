
jQuery(document).ready(function($){
    
    //$('p').html().replace(/\D\W+/g, '');
    
    $('p:empty').remove();
    
    //////////////////////////
    ////////Slick Carousel////////////
    
    var_autoplay = typeof slick_var_autoplay !== 'undefined' ? slick_var_autoplay : false;
    var_autoplaySpeed = typeof slick_var_autoplaySpeed !== 'undefined' ? slick_var_autoplaySpeed : '3000';
    
							$('.slick_carousel').slick({
								infinite: true,
								arrows: true,
                                autoplay: var_autoplay,
                                autoplaySpeed: var_autoplaySpeed,
								nextArrow: '<span class="slick-arrow slick-arrow-right"></span>',
								prevArrow: '<span class="slick-arrow slick-arrow-left"></span>',
								dots: false,
								slidesToShow: 2,
								slidesToScroll: 1,
                                responsive: [
								{
									breakpoint: 1199,
									settings: {
										slidesToShow: 1
									}
								}
							]
							});
    
    ///////Smooth scrolling
    
    var $root = $('html, body');
    
    $('#content a[href^="#"]').on('click', function(event){
        event.preventDefault();
        var addressValue = this.href.split('#')[1];
        if (addressValue != 'home_carousel'){
          $root.animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 150
          }, 700);
        }
    });
    
    ////////////////////////
    
  var resized = false;
  
  function bindNavbar() {
		if ($(window).width() > 100) {			
			$('.dropdown-toggle').click(function(e) {
                if($(e.target).is('.caret') && $(window).width() < 992){ 
                   $(this).parent().toggleClass('dropdown-menu-active');
                   e.stopPropagation();
                   e.preventDefault(); 
                }
                if($(window).width() >= 992){
                   e.stopPropagation();
                   e.preventDefault();
                }
                if (!$(e.target).is('.caret')){
				    window.location = $(this).attr('href');
				}
			});
		}
		else {
			$('.navbar-nav .dropdown').off('mouseover').off('mouseout');
		}
	}
    
	bindNavbar();
});

/////////////////////////

var batourslight_waitForFinalEvent = (function () {
  var timers = {};
  return function (callback, ms, uniqueId) {
    if (!uniqueId) {
      uniqueId = "Don't call this twice without a uniqueId";
    }
    if (timers[uniqueId]) {
      clearTimeout (timers[uniqueId]);
    }
    timers[uniqueId] = setTimeout(callback, ms);
  };
})();
