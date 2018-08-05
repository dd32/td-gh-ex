jQuery(document).ready( function() {
    //Mobile Menu
    jQuery('.menu-link').bigSlide({
        menu: '#menu',
        easyClose: true,
        side: 'right',
        menuWidth: '25em',
    });
    
/*
	var	menuToggle	=	jQuery('.menu-link');
	jQuery('.menu-link').on('click', function() {
		if (jQuery(this).hasClass('active') ) {
			
		}
	});
*/

    /*
Carousel Post Offers
 */

/*
    jQuery('#owl-product').owlCarousel({
        items: 4,
        margin: 1,
        loop: true,
        nav: true,
        navClass: ['prev mdl-button mdl-js-button mdl-button--fab','next mdl-button mdl-js-button mdl-button--fab'],
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            400 : {
                items : 1,
            },
            // breakpoint from 768 up
            768 : {
                items: 2,
            },
            991 : {
                items: 4,
            }
        }
    });
*/

	jQuery(".owl-carousel").each(function(){
    jQuery(this).owlCarousel({
       items: 4,
        margin: 1,
        loop: true,
        dots: true,
        nav: true,
        navClass: ['prev mdl-button mdl-js-button mdl-button--fab','next mdl-button mdl-js-button mdl-button--fab'],
        navText: ["<button class='mdl-button mdl-js-button mdl-button--fab mdl-button--primary'><i class='fa fa-chevron-left'></i></button>", "<button class='mdl-button mdl-js-button mdl-button--fab mdl-button--primary'><i class='fa fa-chevron-right'></i></button>"],
        responsive: {
            400 : {
                items : 1,
            },
            // breakpoint from 768 up
            768 : {
                items: 2,
            },
            991 : {
                items: 4,
            }
        }
    });
  });
  
  jQuery('#search-icon').click(function(){
		jQuery('#jumbosearch').fadeIn();
	});
	
	jQuery('#jumbosearch .closeicon').click(function() {
		jQuery('#jumbosearch').fadeOut(function(){
			jQuery('.masthead-container').animate({
			'top': '0px'
			},300 );
		});
	});
	
	
	// Custom Dropdown Box
	
	
});


