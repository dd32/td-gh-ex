jQuery(document).ready(function(){ jQuery('#header').css('width', jQuery('body').outerWidth(true) ); jQuery("#awesome-main-menu ul ul").css({display: "none"}); jQuery('#awesome-main-menu ul li').hover( function() { jQuery(this).find('ul:first').slideDown(200).css('visibility', 'visible'); jQuery(this).addClass('selected'); }, function() { jQuery(this).find('ul:first').slideUp(200); jQuery(this).removeClass('selected'); });  jQuery('.mobile-menu').click(function(){ jQuery('#awesome-main-menu').toggle(); });  });

jQuery(window).resize(function(){ jQuery('#header').css('width', jQuery('body').outerWidth(true) ); });

		jQuery(window).load(function() {
			jQuery('.headerheight').css('marginTop', jQuery('#header').outerHeight(true) );
		
			jQuery(window).scroll(function() {
				jQuery('#header').css('left','-'+jQuery(window).scrollLeft()+'px');
				if (jQuery(this).scrollTop() > jQuery('#header').outerHeight(true)) {
					jQuery(".awesome-top-menu-container").hide();
					jQuery('.go-top').fadeIn(150);
					jQuery('#header-content').addClass('smallheader'); 

				} else {
					jQuery(".awesome-top-menu-container").show();;
					jQuery('.go-top').fadeOut(150);
					jQuery('#header-content').removeClass('smallheader'); 
				}
			});
				// Animate the scroll to top
			jQuery('.go-top').click(function(event) { event.preventDefault(); jQuery('html, body').animate({scrollTop: 0}, 500); })
  			var owl = jQuery("#mslider");
  			owl.owlCarousel({
    			navigation : true,
				autoPlay : true,
				paginationSpeed : 1000,
				singleItem: true,
				rewindSpeed: 1000,
				stopOnHover: true,
				navigationText: ['<span class="fa-angle-double-left"></span>','<span class="fa-angle-double-right"></span>'],
				addClassActive: true,
				theme : "owl-theme1",
				goToFirstSpeed : 1000,
				slideSpeed : 1000,
				autoHeight: true,
				transitionStyle : 'fadeUp'
  			});
		});	
		
	
	
	
