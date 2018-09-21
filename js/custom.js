jQuery(document).ready( function() {
    //Mobile Menu
    jQuery('.menu-link').bigSlide({
        menu: '#menu',
        easyClose: true,
        side: 'right',
        menuWidth: '25em',
    });


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
	            300 : {
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

	jQuery('#adviso-search #search-icon').click( function() {
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


