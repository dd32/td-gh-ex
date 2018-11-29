// JavaScript Document
jQuery(document).ready(function(e) {
	jQuery('.dropdown').hover(function(e) {
        jQuery('.dropdown-toggle').trigger('click');
    });
	jQuery( ".footer-tertiary-menu ul" ).addClass( "pull-right" );
});
jQuery(function () {
     // start the ticker 
	jQuery('#js-news').ticker();
	
	// hide the release history when the page loads
	jQuery('#release-wrapper').css('margin-top', '-' + (jQuery('#release-wrapper').height() + 20) + 'px');

	// show/hide the release history on click
	jQuery('a[href="#release-history"]').toggle(function () {	
		jQuery('#release-wrapper').animate({
			marginTop: '0px'
		}, 600, 'linear');
	}, function () {
		jQuery('#release-wrapper').animate({
			marginTop: '-' + (jQuery('#release-wrapper').height() + 20) + 'px'
		}, 600, 'linear');
	});	
	
	jQuery(".slider-image-content").owlCarousel({
		
		/*items : 1,
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [979,1]*/
		loop : true,
          items : 1,
          autoplay:true,
		});

	jQuery("#home-banner").owlCarousel({
		autoplay: false, //Set AutoPlay to 3 seconds
		/*items : 1,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,1]*/
		loop : true,
		margin:10,
        autoplay:true,
        responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
		});

	 // Custom Navigation Events
	 jQuery(".next1").click(function(){
	 jQuery("#home-banner").trigger('owl.next');
	 })
	 jQuery(".prev1").click(function(){
	 jQuery("#home-banner").trigger('owl.prev');
	 })
});
