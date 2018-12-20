jQuery(document).ready(function(e) { 
	jQuery("#from-theblog").owlCarousel({
   nav : true,
   navText: [
	  "<i class='fa fa-caret-left'></i>",
	  "<i class='fa fa-caret-right'></i>"
	],
	items : 3,
	itemsMobile : true,
	navigation : false,
	autoHeight : false,
	  responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        400:{
            items:1,
            nav:false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:false,
            loop:false
        }
    }
    });
});
